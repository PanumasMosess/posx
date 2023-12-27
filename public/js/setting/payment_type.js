$(document).ready(function () {
    loadTablePaymentType();
});

function openModalAddPaymentType() {
    $(".add-payment-type").modal("show");
}

function closeModalAddPaymentType() {
    $(".add-payment-type").modal("hide");
    $("#addPaymentType")[0].reset();
    $("#addPaymentType").parsley().reset();
    $("#addPaymentType .parsley-required").hide();
}

// AddPaymentTypeModal
let $ModalAddPaymentType = $(".add-payment-type")
let $formAddPaymentType = $ModalAddPaymentType.find('form')

$formAddPaymentType
    // บันทึกข้อมูล
    .on('click', '.btnAddPaymentType', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formAddPaymentType.find('input[name=type]').val() == '') {
            alert('กรุณาระบุชื่อ')
            return false;
        }
        // ผ่าน
        else {

            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formAddPaymentType[0])

            formData.append('content', $formAddPaymentType.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: `${serverUrl}/setting/addPaymentType`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                //กรณี: บันทึกสำเร็จ
                if (res.success = 1) {

                    Swal.fire({
                        text: "เพิ่ม PaymentType สำเร็จ",
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
                    $(".add-payment-type").modal("hide");
                    $("#addPaymentType")[0].reset();
                    $("#addPaymentType").parsley().reset();
                    $("#addPaymentType .parsley-required").hide();
                    loadTablePaymentType();
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

// //When click saveEditPaymentType
// $('body').on('click', '.saveEditPaymentType', function () {
//     var PaymentTypeID = $(this).attr('data-id');

//     var $row = $('tr[data-type-id="' + PaymentTypeID + '"]'); // ใช้ data-type-id เพื่อหาแถวที่ต้องการแก้ไข

//     var Credit_Card = $row.find("#checkbox_Credit_Card").prop('checked');
//     var Entertain = $row.find("#checkbox_Entertain").prop('checked');

//     $.ajax({
//         type: "POST",
//         url: "/setting/updatePaymentType", // Replace with the actual URL
//         data: {
//             PaymentTypeID: PaymentTypeID, Credit_Card: Credit_Card, Entertain: Entertain
//         },
//     }).done(function (res) {
//         //กรณี: บันทึกสำเร็จ
//         if (res.success = 1) {

//             Swal.fire({
//                 text: "แก้ไข PaymentType สำเร็จ",
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

//btnDeletePaymentType alert
$('body').on('click', '.btnDeletePaymentType', function () {
    var PaymentType_ID = $(this).attr('data-id');
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
                url: '/setting/deletePaymentType/' + PaymentType_ID,
                method: 'get',
                success: function (response) {
                    Swal.fire(
                        'ลบสำเร็จ',
                        response.message,
                        'success'
                    )
                    loadTablePaymentType();
                }
            });
        }
    })
});

$('body').on('click', '#checkbox_Credit_Card', function () {

    let $data = {
        id: $(this).attr('data-id'),
        status: this.checked == false ? '0' : '1'
    }
    $.ajax({
        type: "POST",
        url: `${serverUrl}/setting/updateCreditCard`,
        data: $data,
        success: function (res) {
            Swal.fire({
                text: "อัพเดท Credit Card สำเร็จ",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "ตกลง",
                timer: "800",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function (result) {
                if (result.isConfirmed) {

                }
            })
        },
        error: function () {
            // Show error message.
            Swal.fire({
                text: 'ไม่สามารถบันทึกได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "ตกลง",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        }
    })
});

$('body').on('click', '#checkbox_Entertain', function () {

    let $data = {
        id: $(this).attr('data-id'),
        status: this.checked == false ? '0' : '1'
    }
    $.ajax({
        type: "POST",
        url: `${serverUrl}/setting/updateEntertain`,
        data: $data,
        success: function (res) {
            Swal.fire({
                text: "อัพเดท Entertain สำเร็จ",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "ตกลง",
                timer: "800",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function (result) {
                if (result.isConfirmed) {

                }
            })
         },
        error: function () {
            // Show error message.
            Swal.fire({
                text: 'ไม่สามารถบันทึกได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "ตกลง",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        }
    })
});

function loadTablePaymentType() {
    $("#tablePaymentType").DataTable().clear().destroy();
    $("#tablePaymentType").DataTable({
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
        // "autoWidth": true,
        "stripeClasses": [],
        "pageLength": 5,
        "lengthMenu": [[5, 15, 25, 10000], [5, 15, 25, "ทั้งหมด"]],
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
            'url': "/setting/ajax-datatablePaymentType",
        },
        "createdRow": function (row, data, dataIndex) {
            // กำหนด id ให้กับแต่ละ <tr> โดยใช้ dataIndex แทน
            $(row).attr('data-type-id', data["id"]);
        },
        "columns": [{
            data: null,
            "sortable": false,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: "type"
        },
        {
            data: null,
            render: function (data, type, row, meta) {
                var checked_credit_card = data["credit_card"] == 1 ? 'checked' : '';

                if (data["type"] === 'Cash') {
                    return ('');
                }

                return (
                    '<label class="custom-control-hide-cahsier custom-checkbox custom-control-md mb-1"><input type="checkbox" class="custom-control-input" data-id="' + data["id"] + '" name="checkbox_Credit_Card" id="checkbox_Credit_Card" ' + checked_credit_card + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Credit Card</span></label>'
                );
            },
        },
        {
            data: null,
            render: function (data, type, row, meta) {
                var checked_entertain = data["entertain"] == 1 ? 'checked' : '';
                // console.log(data["type"]);
                if (data["type"] === 'Cash') {
                    return ('');
                }

                return (
                    '<label class="custom-control-hide-cahsier custom-checkbox custom-control-md mb-1"><input type="checkbox" class="custom-control-input" data-id="' + data["id"] + '" name="checkbox_Entertain" id="checkbox_Entertain" ' + checked_entertain + '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Entertain</span></label>'
                );
            },
        },
        {
            data: null,
            render: function (data, type, row, meta) {
                if (data["type"] === 'Cash') {
                    return ('');
                }
                // <button type="button" class="btn btn-primary f_s_14 saveEditPaymentType me-2" data-id="' + data["id"] + '"><i class="ti-save f_s_13 me-2"></i>Save</button>
                return (
                    '<div class="action_btns d-flex" style="justify-content: center;"><button type="button" class="btn btn-danger f_s_14 btnDeletePaymentType" data-id="' + data["id"] + '"><i class="fas fa-trash f_s_13 me-2"></i>Remove</button></div>'
                );
            },
        }
        ],
        "bFilter": true, // to display datatable search
    });
}