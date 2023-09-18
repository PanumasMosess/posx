
function openModalGroupProduct() {
    $(".bd-add-group-product").modal("show");
}

function closeModalAddGroupProduct() {
    $(".bd-add-group-product").modal("hide");
    $("#addGroupProduct")[0].reset();
    $("#addGroupProduct").parsley().reset();
    $("#addGroupProduct .parsley-required").hide();
}

$(document).ready(function () {
    loadTableGroupProduct();
});
// ModalAddGroupProduct
let $ModalAddGroupProduct = $(".bd-add-group-product")
let $formAddGroupProduct = $ModalAddGroupProduct.find('form')

$formAddGroupProduct
    // บันทึกข้อมูล
    .on('click', '.btnSaveGroupProduct', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formAddGroupProduct.find('input[name=category_name]').val() == '') {
            alert('กรุณาระบุชื่อหมวดหมู่สินค้า')
            return false;
        } else if ($formAddGroupProduct.find('input[name=productunit]').val() == '') {
            alert('กรุณาระบุชื่อหน่วยสินค้า')
            return false;
        }
        // ผ่าน
        else {

            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formAddGroupProduct[0])

            formData.append('content', $formAddGroupProduct.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: `${serverUrl}/manager/addGroupProduct`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                //กรณี: บันทึกสำเร็จ
                if (res.success = 1) {

                    Swal.fire({
                        text: "เพิ่ม GroupProduct สำเร็จ",
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
                    $(".bd-add-group-product").modal("hide");
                    $("#addGroupProduct")[0].reset();
                    $("#addGroupProduct").parsley().reset();
                    $("#addGroupProduct .parsley-required").hide();
                    loadTableGroupProduct();
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

//When click edit GroupProduct
$('body').on('click', '.btnEditGroupProduct', function () {
    var GroupProduct_Id = $(this).attr('data-id');
    //    alert(employee_id);
    //    exit();
    $.ajax({
        url: '/manager/editGroupProduct/' + GroupProduct_Id,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            // let $data = res.data
            $('.bd-edit-group-product').modal('show');
            $('#editGroupProduct #GroupProductId').val(res.data.id);
            $('#editGroupProduct #category_name').val(res.data.name);
            $('#editGroupProduct #productunit').val(res.data.unit);
            // console.log(res.data.GroupProduct_name)
        },
        error: function (data) { }
    });
});

//modalUpdateGroupProduct
let $modalEditGroupProduct = $(".bd-edit-group-product")
let $formEditGroupProduct = $modalEditGroupProduct.find('form')

$formEditGroupProduct
    // บันทึกข้อมูล
    .on('click', '.btnSaveEditGroupProduct', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formEditGroupProduct.find('input[name=category_name]').val() == '') {
            alert('กรุณาระบุชื่อหมวดหมู่สินค้า')
            return false;
        } else if ($formEditGroupProduct.find('input[name=productunit]').val() == '') {
            alert('กรุณาระบุชื่อหน่วยสินค้า')
            return false;
        }
        // ผ่าน
        else {
            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formEditGroupProduct[0])

            formData.append('content', $formEditGroupProduct.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: '/manager/updateGroupProduct',
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                if (res.success = 1) {

                    Swal.fire({
                        text: "แก้ไข GroupProduct สำเร็จ",
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
                    $(".bd-edit-group-product").modal("hide");
                    $("#editGroupProduct")[0].reset();
                    $("#editGroupProduct").parsley().reset();
                    $("#editGroupProduct .parsley-required").hide();
                    loadTableGroupProduct();
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

//btnDeleteGroupProduct alert
$('body').on('click', '.btnDeleteGroupProduct', function () {
    var GroupProduct_id = $(this).attr('data-id');

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
                url: '/manager/deleteGroupProduct/' + GroupProduct_id,
                method: 'get',
                success: function (response) {
                    Swal.fire(
                        'ลบสำเร็จ',
                        response.message,
                        'success'

                    )
                    loadTableGroupProduct();
                }
            });
        }
    })
});
function loadTableGroupProduct() {
    $("#tableGroupProduct").DataTable().clear().destroy();
    $("#tableGroupProduct").DataTable({
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
                'className': 'text-left',
                "targets": [2],
            },
            {
                'className': 'text-center',
                "targets": [3],
            },
            {
                'className': 'text-center',
                "targets": [4],
            },
            {
                'className': 'text-center',
                "targets": [5],
            }
        ],
        "processing": true,
        "serverSide": true,
        "order": [], //init datatable not ordering
        "ajax": {
            'type': 'POST',
            'url': "/manager/ajax-datatableGroupProduct",
        },
        "columns": [{
            data: null,
            "sortable": false,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: "name"
        },
        {
            data: "unit"
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
                    '<div class="action_btns d-flex" style="justify-content: center;"><a href="#" class="action_btn btnEditGroupProduct mr_10" data-id="' + data["id"] + '"> <i class="far fa-edit"></i> </a><a href="#" class="action_btn btnDeleteGroupProduct" data-id="' + data["id"] + '"> <i class="fas fa-trash"></i> </a></div>'
                );
            },
        }
        ],
        "bFilter": true, // to display datatable search
    });
}


