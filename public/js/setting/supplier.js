

function openModalAddSupplier() {
    $(".bd-add-supplier").modal("show");
}

function closeModalAddSupplier() {
    $(".bd-add-supplier").modal("hide");
    $("#addSupplier")[0].reset();
    $("#addSupplier").parsley().reset();
    $("#addSupplier .parsley-required").hide();
}

$(document).ready(function () {
    loadTableSupplier();
});

// ModalAddSupplier
let $ModalAddSupplier = $(".bd-add-supplier")
let $formAddSupplier = $ModalAddSupplier.find('form')

$formAddSupplier
    // บันทึกข้อมูล
    .on('click', '.btnSave', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formAddSupplier.find('input[name=supplier_name]').val() == '') {
            alert('กรุณาระบุชื่อSupplier')
            return false;
        }
        // ผ่าน
        else {

            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formAddSupplier[0])

            formData.append('content', $formAddSupplier.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: `${serverUrl}/setting/addSupplier`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                //กรณี: บันทึกสำเร็จ
                if (res.success = 1) {

                    Swal.fire({
                        text: "เพิ่ม Supplier สำเร็จ",
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
                    $(".bd-add-supplier").modal("hide");
                    $("#addSupplier")[0].reset();
                    $("#addSupplier").parsley().reset();
                    $("#addSupplier .parsley-required").hide();
                    loadTableSupplier();
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

//When click edit Supplier
$('body').on('click', '.btnEditSupplier', function () {
    var Supplier_id = $(this).attr('data-id');
    //    alert(employee_id);
    //    exit();
    $.ajax({
        url: '/setting/editSupplier/' + Supplier_id,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            // let $data = res.data
            $('.bd-edit-supplier').modal('show');
            $('#editSupplier #SupplierId').val(res.data.id);
            $('#editSupplier #supplier_name').val(res.data.supplier_name);
            // console.log(res.data.supplier_name)
        },
        error: function (data) { }
    });
});

//modalUpdateSupplier
let $modalEditSupplier = $(".bd-edit-supplier")
let $formEditSupplier = $modalEditSupplier.find('form')

$formEditSupplier
    // บันทึกข้อมูล
    .on('click', '.btnEditSave', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formEditSupplier.find('input[name=supplier_name]').val() == '') {
            alert('กรุณาระบุชื่อSupplier')
            return false;
        }
        // ผ่าน
        else {
            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formEditSupplier[0])

            formData.append('content', $formEditSupplier.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: '/setting/updateSupplier',
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                if (res.success = 1) {

                    Swal.fire({
                        text: "แก้ไข Supplier สำเร็จ",
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
                    $(".bd-edit-supplier").modal("hide");
                    $("#editSupplier")[0].reset();
                    $("#editSupplier").parsley().reset();
                    $("#editSupplier .parsley-required").hide();
                    loadTableSupplier();
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

//btnDeleteSupplier alert
$('body').on('click', '.btnDeleteSupplier', function () {
    var Supplier_id = $(this).attr('data-id');

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
                url: '/setting/deleteSupplier/' + Supplier_id,
                method: 'get',
                success: function (response) {
                    Swal.fire(
                        'ลบสำเร็จ',
                        response.message,
                        'success'

                    )
                    loadTableSupplier();
                }
            });
        }
    })
});
function loadTableSupplier() {
    $("#tableSupplier").DataTable().clear().destroy();
    $("#tableSupplier").DataTable({
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
                'className':'text-center',
                "targets": [0],
            },
            {
                'className':'text-left',
                "targets": [1],
            },
            {
                'className':'text-center',
                "targets": [2],
            },
            {
                'className':'text-center',
                "targets": [3],
            },
            {
                'className':'text-center',
                "targets": [4],
            }
        ],
        "processing": true,
        "serverSide": true,
        "order": [], //init datatable not ordering
        "ajax": {
            'type': 'POST',
            'url': "/setting/ajax-datatableSupplier",
        },
        "columns": [{
            data: null,
            "sortable": false,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: "supplier_name"
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
                    '<div class="action_btns d-flex" style="justify-content: center;"><a href="#" class="action_btn btnEditSupplier mr_10" data-id="' + data["id"] + '"> <i class="far fa-edit"></i> </a><a href="#" class="action_btn btnDeleteSupplier" data-id="' + data["id"] + '"> <i class="fas fa-trash"></i> </a></div>'
                );
            },
        }
        ],
        "bFilter": true, // to display datatable search
    });
}

