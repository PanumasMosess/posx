$(document).ready(function () {
    loadTableEmployeePinStock();

    // $('#tableEmployeePinStock').on('change', '#checkbox_All', function () {
    //     var isChecked = $(this).prop('checked');
    //     var $currentRow = $(this).closest('tr');
    //     var rowId = $currentRow.data('row-id'); // รหัสแถวปัจจุบัน
    //     console.log(rowId);
    //     var checkboxesToToggle = $('[data-row-id ="' + rowId + '"] .custom-control:not(.custom-control-All)');

    //     if (isChecked) {
    //         // ถ้า checkbox "All" ถูกติ๊กให้ซ่อน checkbox อื่น ๆ ในแถวนี้
    //         checkboxesToToggle.hide();
    //         $('.custom-control-All').show(); // แสดงเฉพาะ checkbox "All"
    //     } else {
    //         // ถ้า checkbox "All" ถูกยกเลิกให้แสดง checkbox ทั้งหมดในแถวนี้
    //         checkboxesToToggle.show();
    //     }
    // });
});

function openModalAddEmployeePinStock() {
    $(".add-employee-pin-stock").modal("show");
}

function closeModalAddEmployeePinStock() {
    $(".add-employee-pin-stock").modal("hide");
    $("#addEmployeePinStock")[0].reset();
    $("#addEmployeePinStock").parsley().reset();
    $("#addEmployeePinStock .parsley-required").hide();
}

// ModalAddEmployeePinStock
let $ModalAddEmployeePinStock = $(".add-employee-pin-stock")
let $formAddEmployeePinStock = $ModalAddEmployeePinStock.find('form')

$formAddEmployeePinStock
    // บันทึกข้อมูล
    .on('click', '.btnAddEmployeePinStock', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formAddEmployeePinStock.find('input[name=username_employee_stock]').val() == '') {
            alert('กรุณาระบุชื่อ')
            return false;
        }
        else if ($formAddEmployeePinStock.find('input[name=new_password_employee_stock]').val() == '') {
            alert('กรุณากรอกรหัสผ่าน')
            return false;
        }
        else if ($formAddEmployeePinStock.find('input[name=confirm_password_employee_stock]').val() == '') {
            alert('กรุณากรอกยืนยันรหัสผ่าน')
            return false;
        }
        else if ($formAddEmployeePinStock.find('input[name=new_password_employee_stock]').val() != $formAddEmployeePinStock.find('input[name=confirm_password_employee_stock]').val()) {
            alert('รหัสผ่านไม่ตรงกัน กรุณากรอกยืนยันรหัสผ่านใหม่')
            return false;
        }
        // ผ่าน
        else {

            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formAddEmployeePinStock[0])

            formData.append('content', $formAddEmployeePinStock.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: `${serverUrl}/setting/addEmployeePinStock`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                //กรณี: บันทึกสำเร็จ
                if (res.success = 1) {

                    Swal.fire({
                        text: "เพิ่ม พนักงาน Stock สำเร็จ",
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
                    $(".add-employee-pin-stock").modal("hide");
                    $("#addEmployeePinStock")[0].reset();
                    $("#addEmployeePinStock").parsley().reset();
                    $("#addEmployeePinStock .parsley-required").hide();
                    loadTableEmployeePinStock();
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

// //When click saveEditEmployeePinStock
// $('body').on('click', '.saveEditEmployeePinStock', function () {
//     var editUserID = $(this).attr('data-id');

//     var $row = $('tr[data-row-id="' + editUserID + '"]'); // ใช้ data-row-id เพื่อหาแถวที่ต้องการแก้ไข

//     var All = $row.find("#checkbox_All").prop('checked');
//     var Move = $row.find("#checkbox_Move").prop('checked');
//     var Discount = $row.find("#checkbox_Discount").prop('checked');
//     var Set_Price = $row.find("#checkbox_Set_Price").prop('checked');
//     var Void = $row.find("#checkbox_Void").prop('checked');
//     var Hide_Cahsier = $row.find("#checkbox_Hide_Cahsier").prop('checked');

//     console.log(Move);

//     $.ajax({
//         type: "POST",
//         url: "/setting/updateEmployeePinStock", // Replace with the actual URL
//         data: {
//             editUserID: editUserID, All: All, Move: Move, Discount: Discount,
//             Set_Price: Set_Price, Void: Void, Hide_Cahsier: Hide_Cahsier
//         },
//     }).done(function (res) {
//         //กรณี: บันทึกสำเร็จ
//         if (res.success = 1) {

//             Swal.fire({
//                 text: "แก้ไข พนักงาน Stock สำเร็จ",
//                 icon: "success",
//                 buttonsStyling: false,
//                 confirmButtonText: "ตกลง",
//                 timer: "1000",
//                 customClass: {
//                     confirmButton: "btn btn-primary"
//                 }
//             }).then(function (result) {
//                 if (result.isConfirmed) {

//                 }
//             })
//         }
//         // กรณี: Server มีการตอบกลับ แต่ไม่สำเร็จ
//         else {
//             // Show error message.
//             Swal.fire({
//                 text: res.message,
//                 icon: "error",
//                 buttonsStyling: false,
//                 confirmButtonText: "ตกลง",
//                 customClass: {
//                     confirmButton: "btn btn-primary"
//                 }
//             }).then(function (result) {
//                 if (result.isConfirmed) {
//                     // LANDING_PROMOTION.reloadPage()
//                 }
//             })
//             $me.attr('disabled', false)
//         }
//     }).fail(function (context) {
//         let messages = context.responseJSON?.messages || 'ไม่สามารถบันทึกได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ'
//         // Show error message.
//         Swal.fire({
//             text: messages,
//             icon: "error",
//             buttonsStyling: false,
//             confirmButtonText: "ตกลง",
//             customClass: {
//                 confirmButton: "btn btn-primary"
//             }
//         })
//         $me.attr('disabled', false)
//     })
// });

// //btnDeleteEmployeePinStock alert
// $('body').on('click', '.btnDeleteEmployeePinStock', function () {
//     var Employee_Pin_Stock_ID = $(this).attr('data-id');

//     // let $me = $(this)
//     // let $url = $me.data('url')
//     // alert ($me);
//     // exit();
//     Swal.fire({
//         text: `คุณต้องการลบ`,
//         icon: "warning",
//         buttonsStyling: false,
//         confirmButtonText: "ตกลง",
//         showCloseButton: true,
//         customClass: {
//             confirmButton: "btn btn-primary",
//         }
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 url: '/setting/deleteEmployeePinStock/' + Employee_Pin_Stock_ID,
//                 method: 'get',
//                 success: function (response) {
//                     Swal.fire(
//                         'ลบสำเร็จ',
//                         response.message,
//                         'success'
//                     )
//                     loadTableEmployeePinStock();
//                 }
//             });
//         }
//     })
// });

function loadTableEmployeePinStock() {
    $("#tableEmployeePinStock").DataTable().clear().destroy();
    $("#tableEmployeePinStock").DataTable({
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
                'className': 'text-left',
                "targets": [3],
            },
            {
                'className': 'text-center',
                "targets": [4],
            },
        ],
        // "processing": true,
        // "serverSide": true,
        // "order": [], //init datatable not ordering
        // "ajax": {
        //     'type': 'POST',
        //     'url': "/setting/ajax-datatableEmployeePinStock",
        // },
        // "createdRow": function (row, data, dataIndex) {
        //     // กำหนด id ให้กับแต่ละ <tr> โดยใช้ dataIndex แทน
        //     $(row).attr('data-row-id', data["id"]);
        // },
        // "columns": [{
        //     data: null,
        //     "sortable": false,
        //     render: function (data, type, row, meta) {
        //         return meta.row + meta.settings._iDisplayStart + 1;
        //     }
        // },
        // {
        //     data: "username"
        // },
        // {
        //     data: null,
        //     render: function (data, type, row, meta) {
        //         return (
        //             '******'
        //         );
        //     },
        // },
        // {
        //     data: null,
        //     render: function (data, type, row, meta) {
        //         var all = data["setting_all"] == 1 ? 'checked' : '';
        //         var move = data["setting_move"] == 1 ? 'checked' : '';
        //         var discount = data["setting_discount"] == 1 ? 'checked' : '';
        //         var set_price = data["setting_set_price"] == 1 ? 'checked' : '';
        //         var setting_void = data["setting_void"] == 1 ? 'checked' : '';

        //         if (all === 'checked') {
        //             return ('<label class="custom-control-All custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input checkbox_All" name="checkbox_All" id="checkbox_All" ' + all + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">All</span></label>' +
        //                 '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;display: none;"><input type="checkbox" class="custom-control-input" name="checkbox_Move" id="checkbox_Move" ' + move + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Move</span></label>' +
        //                 '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;display: none;"><input type="checkbox" class="custom-control-input" name="checkbox_Discount" id="checkbox_Discount" ' + discount + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Discount</span></label>' +
        //                 '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;display: none;"><input type="checkbox" class="custom-control-input" name="checkbox_Set_Price" id="checkbox_Set_Price" ' + set_price + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Set price</span></label>' +
        //                 '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;display: none;"><input type="checkbox" class="custom-control-input" name="checkbox_Void" id="checkbox_Void" ' + setting_void + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Void</span></label>');
        //         }

        //         return ('<label class="custom-control-All custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input checkbox_All" name="checkbox_All" id="checkbox_All" ' + all + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">All</span></label>' +
        //             '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input" name="checkbox_Move" id="checkbox_Move" ' + move + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Move</span></label>' +
        //             '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input" name="checkbox_Discount" id="checkbox_Discount" ' + discount + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Discount</span></label>' +
        //             '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input" name="checkbox_Set_Price" id="checkbox_Set_Price" ' + set_price + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Set price</span></label>' +
        //             '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input" name="checkbox_Void" id="checkbox_Void" ' + setting_void + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Void</span></label>')
        //     },
        // },
        // {
        //     data: "setting_hide_cahsier",
        //     render: function (data, type, row, meta) {
        //         var isChecked = data == 1 ? 'checked' : '';

        //         return (
        //             '<label class="custom-control-hide-cahsier custom-checkbox custom-control-md mb-1"><input type="checkbox" class="custom-control-input" name="checkbox_Hide_Cahsier" id="checkbox_Hide_Cahsier" ' + isChecked + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Hide Cahsier</span></label>'
        //         );
        //     },
        // },
        // {
        //     data: null,
        //     render: function (data, type, row, meta) {
        //         return (
        //             '<div class="action_btns d-flex" style="justify-content: center;"><button type="button" class="btn btn-primary f_s_14 saveEditEmployeePinStock me-2" data-id="' + data["id"] + '"><i class="ti-save f_s_13 me-2"></i>Save</button><button type="button" class="btn btn-danger f_s_14 btnDeleteEmployeePinStock" data-id="' + data["id"] + '"><i class="fas fa-trash f_s_13 me-2"></i>Remove</button></div>'
        //         );
        //     },
        // }
        // ],
        // "bFilter": true, // to display datatable search
    });
}