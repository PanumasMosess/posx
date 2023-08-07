// var itemsArray = [];
// var itemsArrayOffline = [];
// var isOnline;
// (function ($) {
//     isOnline = window.navigator.onLine;

//     if (isOnline) {
//         itemsArray = localStorage.getItem("groupProductsOld")
//             ? JSON.parse(localStorage.getItem("groupProductsOld"))
//             : [];
//     } else {
//         itemsArrayOffline = localStorage.getItem("groupProductsNew")
//             ? JSON.parse(localStorage.getItem("groupProductsNew"))
//             : [];
//     }
// })(jQuery);

function openModalGroupProduct() {
    $(".bd-add-group-product").modal("show");
}

function closeModalAddGroupProduct() {
    $(".bd-add-group-product").modal("hide");
    $("#addGroupProduct")[0].reset();
    $("#addGroupProduct").parsley().reset();
    $("#addGroupProduct .parsley-required").hide();
}

// $("#addGroupProduct").submit(function (e) {
//     e.preventDefault();
//     let product;
//     var productunit = $("#productunit").parsley();
//     var category_name = $("#category_name").parsley();

//     if (
//         productunit.isValid() &&
//         category_name.isValid()
//     ) {
//         isOnline = window.navigator.onLine;

//         arr_product = [
//             {
//                 productunit: $("#productunit").val(),
//                 category_name: $("#category_name").val(),
//             },
//         ];

//         if (isOnline) {
//             console.log("Online");
//             //old from table
//             itemsArray.push(arr_product);
//             localStorage.setItem("groupProductsOld", JSON.stringify(itemsArray));

//             // new
//             itemsArrayOffline.push(arr_product);
//             localStorage.setItem("groupProductsNew", JSON.stringify(itemsArrayOffline));

//             productNew = JSON.parse(localStorage.groupProductsNew);

//             $.ajax({
//                 url: serverUrl + "setting/insertGroupProduct",
//                 method: "post",
//                 data: {
//                     data: productNew,
//                 },
//                 cache: false,
//                 success: function (response) {
//                     if (response.message = 'เพิ่มรายการสำเร็จ') {
//                         localStorage.removeItem("groupProductsNew");
//                         productNew = [];
//                         itemsArrayOffline = [];
//                         notif({
//                             type: "success",
//                             msg: "เพิ่มรายการสำเร็จ!",
//                             position: "right",
//                             fade: true,
//                             time: 300,
//                         });
//                         $(".bd-add-product").modal("hide");
//                         $("#addGroupProduct")[0].reset();
//                         $("#addGroupProduct").parsley().reset();
//                         $("#addGroupProduct .parsley-required").hide();
//                     }
//                     else {

//                     }

//                 },
//             });

//         } else {
//             console.log("Offline");
//             //old from table
//             itemsArray.push(arr_product);
//             localStorage.setItem("groupProductsOld", JSON.stringify(itemsArray));

//             // new
//             itemsArrayOffline.push(arr_product);
//             localStorage.setItem("groupProductsNew", JSON.stringify(itemsArrayOffline));
//         }

//         //   var fields__product = $(this).serialize();
//     } else {
//         productunit.validate();
//         category_name.validate();
//     }
// });
$(document).ready(function () {

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

                $me.attr('disabled', true)

                let formData = new FormData($formAddGroupProduct[0])

                formData.append('content', $formAddGroupProduct.find('.ql-editor').html())

                $.ajax({
                    type: "POST",
                    url: `${serverUrl}/setting/addGroupProduct`,
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
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {

                                setTimeout(function () {
                                    window.location = '/setting/group_product'
                                }, 1 * 1500)

                            }
                        })
                        setTimeout(function () {
                            window.location = '/setting/group_product'
                        }, 1 * 1500)
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
            url: '/setting/editGroupProduct/' + GroupProduct_Id,
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

                $me.attr('disabled', true)

                let formData = new FormData($formEditGroupProduct[0])

                formData.append('content', $formEditGroupProduct.find('.ql-editor').html())

                $.ajax({
                    type: "POST",
                    url: '/setting/updateGroupProduct',
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
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                setTimeout(function () {
                                    window.location = '/setting/group_product'
                                }, 1 * 1500)
                            }
                        })

                        setTimeout(function () {
                            window.location = '/setting/group_product'
                        }, 1 * 1500)
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
                    url: '/setting/deleteGroupProduct/' + GroupProduct_id,
                    method: 'get',
                    success: function (response) {
                        Swal.fire(
                            'ลบสำเร็จ',
                            response.message,
                            'success'

                        )
                        setTimeout(function () {
                            window.location = '/setting/group_product'
                        }, 1 * 1500)
                    }
                });
            }
        })
    });

    $(".tableGroupProduct").DataTable({
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
        "order": [],
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
        ]
    });
});
