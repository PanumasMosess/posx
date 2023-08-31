

function openModalAddPosition() {
    $(".bd-add-position").modal("show");
}

function closeModalAddPosition() {
    $(".bd-add-position").modal("hide");
    $("#addPosition")[0].reset();
    $("#addPosition").parsley().reset();
    $("#addPosition .parsley-required").hide();
}

$(document).ready(function () {
    loadTablePosition();
});

// ModalAddPosition
let $ModalAddPosition = $(".bd-add-position")
let $formAddPosition = $ModalAddPosition.find('form')

$formAddPosition
    // บันทึกข้อมูล
    .on('click', '.btnSavePosition', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formAddPosition.find('input[name=position_name]').val() == '') {
            alert('กรุณาระบุชื่อตำแหน่ง')
            return false;
        }
        // ผ่าน
        else {

            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formAddPosition[0])

            formData.append('content', $formAddPosition.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: `${serverUrl}/setting/addPosition`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                //กรณี: บันทึกสำเร็จ
                if (res.success = 1) {

                    Swal.fire({
                        text: "เพิ่ม ตำแหน่ง สำเร็จ",
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
                    $(".bd-add-position").modal("hide");
                    $("#addPosition")[0].reset();
                    $("#addPosition").parsley().reset();
                    $("#addPosition .parsley-required").hide();
                    loadTablePosition();
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

//When click edit Position
$('body').on('click', '.btnEditPosition', function () {
    var Position_id = $(this).attr('data-id');
    //    alert(employee_id);
    //    exit();
    $.ajax({
        url: '/setting/editPosition/' + Position_id,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            // let $data = res.data
            $('.bd-edit-position').modal('show');
            $('#editPosition #PositionId').val(res.data.id);
            $('#editPosition #position_name').val(res.data.position_name);
            // console.log(res.data.position_name)
        },
        error: function (data) { }
    });
});

//modalUpdatePosition
let $modalEditPosition = $(".bd-edit-position")
let $formEditPosition = $modalEditPosition.find('form')

$formEditPosition
    // บันทึกข้อมูล
    .on('click', '.btnEditSavePosition', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formEditPosition.find('input[name=position_name]').val() == '') {
            alert('กรุณาระบุชื่อตำแหน่ง')
            return false;
        }
        // ผ่าน
        else {
            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formEditPosition[0])

            formData.append('content', $formEditPosition.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: '/setting/updatePosition',
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                if (res.success = 1) {

                    Swal.fire({
                        text: "แก้ไข ตำแหน่ง สำเร็จ",
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
                    $(".bd-edit-position").modal("hide");
                    $("#editPosition")[0].reset();
                    $("#editPosition").parsley().reset();
                    $("#editPosition .parsley-required").hide();
                    loadTablePosition();
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

//btnDeletePosition alert
$('body').on('click', '.btnDeletePosition', function () {
    var Position_id = $(this).attr('data-id');

    // let $me = $(this)
    // let $url = $me.data('url')
    // alert ($me);
    // exit();
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
                url: '/setting/deletePosition/' + Position_id,
                method: 'get',
                success: function (response) {
                    Swal.fire(
                        'ลบสำเร็จ',
                        response.message,
                        'success'

                    )
                    loadTablePosition();
                }
            });
        }
    })
});
function loadTablePosition() {
    $("#tablePosition").DataTable().clear().destroy();
    $("#tablePosition").DataTable({
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
                'className': 'text-left',
                "targets": [1],
            },
            {
                'className': 'text-center',
                "targets": [2],
            },
            {
                'className': 'text-center',
                "targets": [3],
            },
            {
                'className': 'text-center',
                "targets": [4],
            }
        ],
        "processing": true,
        "serverSide": true,
        "order": [], //init datatable not ordering
        "ajax": {
            'type': 'POST',
            'url': "/setting/ajax-datatablePosition",
        },
        "columns": [{
            data: null,
            "sortable": false,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: "position_name"
        },
        {
            data: "date_created"
        },
        {
            data: "date_updated"
        },
        {
            data: null,
            render: function (data, type, row, meta) {
                return (
                    '<div class="action_btns d-flex" style="justify-content: center;"><a href="#" class="action_btn btnEditPosition mr_10" data-id="' + data["id"] + '"> <i class="far fa-edit"></i> </a><a href="#" class="action_btn btnDeletePosition" data-id="' + data["id"] + '"> <i class="fas fa-trash"></i> </a></div>'
                );
            },
        }
        ],
        "bFilter": true, // to display datatable search
    });
}
