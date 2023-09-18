$(document).ready(function () {
    loadTableMobile();
});

function openModalAddMobile() {
    $(".add-mobile").modal("show");
}

function closeModalAddMobile() {
    $(".add-mobile").modal("hide");
    $("#addMobile")[0].reset();
    $("#addMobile").parsley().reset();
    $("#addMobile .parsley-required").hide();
}

// AddMobileModal
let $ModalAddMobile = $(".add-mobile")
let $formAddMobile = $ModalAddMobile.find('form')

$formAddMobile
    // บันทึกข้อมูล
    .on('click', '.btnAddMobile', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formAddMobile.find('input[name=device_id]').val() == '') {
            alert('กรุณาระบุDevice Id')
            return false;
        }
        // ผ่าน
        else {

            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formAddMobile[0])

            formData.append('content', $formAddMobile.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: `${serverUrl}/setting/addMobile`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                //กรณี: บันทึกสำเร็จ
                if (res.success = 1) {

                    Swal.fire({
                        text: "เพิ่ม Mobile สำเร็จ",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "ตกลง",
                        timer: "1000",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {

                        }
                    })
                    $(".add-mobile").modal("hide");
                    $("#addMobile")[0].reset();
                    $("#addMobile").parsley().reset();
                    $("#addMobile .parsley-required").hide();
                    loadTableMobile();
                }

                // กรณี: Server มีการตอบกลับ แต่ไม่สำเร็จ
                else {
                    // Show error message.
                    Swal.fire({
                        text: res.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "ตกลง",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            // LANDING_PROMOTION.reloadPage()
                        }
                    })

                    $me.attr('disabled', false)
                }

            }).fail(function (context) {
                let messages = context.responseJSON?.messages || 'ไม่สามารถบันทึกได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ'
                // Show error message.
                Swal.fire({
                    text: messages,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "ตกลง",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })

                $me.attr('disabled', false)
            })
        }
    });

//btnDeleteMobile alert
$('body').on('click', '.btnDeleteMobile', function () {
    var Mobile_ID = $(this).attr('data-id');
    Swal.fire({
        text: `คุณต้องการลบ`,
        icon: "warning",
        buttonsStyling: false,
        confirmButtonText: "ตกลง",
        showCloseButton: true,
        customClass: {
            confirmButton: "btn btn-primary",
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/setting/deleteMobile/' + Mobile_ID,
                method: 'get',
                success: function (response) {
                    Swal.fire(
                        'ลบสำเร็จ',
                        response.message,
                        'success'
                    )
                    loadTableMobile();
                }
            });
        }
    })
});

function loadTableMobile() {
    $("#tableMobile").DataTable().clear().destroy();
    $("#tableMobile").DataTable({
        "oLanguage": {
            "sInfo": "กำลังแสดง _START_ ถึง _END_ จาก _TOTAL_ แถว หน้า _PAGE_ ใน _PAGES_",
            "sLengthMenu": "แสดง _MENU_ แถว",
            "sSearch": '',
            "sSearchPlaceholder": "ค้นหา...",
            "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
            "oPaginate": {
                "sFirst": "เิริ่มต้น",
                "sPrevious": "ก่อนหน้า",
                "sNext": "ถัดไป",
                "sLast": "สุดท้าย"
            },
        },
        "stripeClasses": [],
        "pageLength": 5,
        "lengthMenu": [[5, 15, 25, -1], [5, 15, 25, "ทั้งหมด"]],
        "columnDefs": [
            {
                'className': 'text-center',
                "targets": [0],
            },
            {
                'className': 'text-center',
                "targets": [1],
            },
            {
                'className': 'text-center',
                "targets": [2],
            },
            {
                'className': 'text-center',
                "targets": [3],
            }
        ],
        "processing": true,
        "serverSide": true,
        "order": [], //init datatable not ordering
        "ajax": {
            'type': 'POST',
            'url': "/setting/ajax-datatableMobile",
        },
        // "createdRow": function (row, data, dataIndex) {
        //     // กำหนด id ให้กับแต่ละ <tr> โดยใช้ dataIndex แทน
        //     $(row).attr('data-type-id', data["id"]);
        // },
        "columns": [{
            data: null,
            "sortable": false,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: "device_id"
        },
        {
            data: null,
            render: function (data, type, row, meta) {
                return (
                    '<i class="fa fa-mobile"></i>'
                );
            },
        },
        {
            data: null,
            render: function (data, type, row, meta) {
                return (
                    '<div class="action_btns d-flex" style="justify-content: center;"><button type="button" class="btn btn-danger f_s_14 btnDeleteMobile" data-id="' + data["id"] + '"><i class="fas fa-trash f_s_13 me-2"></i>Remove</button></div>'
                );
            },
        }
        ],
        "bFilter": true, // to display datatable search
    });
}