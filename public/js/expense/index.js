function openModalAddExpense() {
    $(".bd-add-expense").modal("show");
}

function closeModalAddExpense() {
    $(".bd-add-expense").modal("hide");
    $("#addExpense")[0].reset();
    $("#addExpense").parsley().reset();
    $("#addExpense .parsley-required").hide();
}

function openModalAddExpenseList() {
    $(".add-expense-list").modal("show");
}

function closeModalAddExpenseList() {
    $(".add-expense-list").modal("hide");
    $("#addExpenseList")[0].reset();
    $("#addExpenseList").parsley().destroy();
    $("#addExpenseList .parsley-required").hide();

    for (let i = 1; i <= 5; i++) {
        const groupSelect = document.createElement('select');
        groupSelect.className = 'form-select';
        groupSelect.name = 'group_lists';
        groupSelect.id = 'group_lists';
        groupSelect.setAttribute('onchange', `updateTitle(${i}, this.value)`);
        groupSelect.innerHTML = '<option value="0">Select Group</option>';

        // ดึงข้อมูลจาก AJAX
        $.ajax({
            url: '/expense/getGroup',
            method: 'get',
            success: function (res) {
                if (res.success == 1) {
                    const data = res.data;
                    for (let j = 0; j < data.length; j++) {
                        const ExpenseID = data[j].id;
                        const ExpenseName = data[j].expense_name;
                        const option = document.createElement('option');
                        option.value = ExpenseID;
                        option.textContent = ExpenseName;
                        groupSelect.appendChild(option);
                    }
                } else {
                    console.error('Error: ' + res.message);
                }
            }
        });
        // console.log('Test');
        // กำหนดค่าในตาราง
        $("#group_lists_" + i).html(groupSelect.outerHTML);
        $("#title_" + i).html('');
        $("#amount_" + i).html('');
        $("#comment_" + i).html('');
    }
}

// function openModalAddSubExpense() {
//     $(".bd-add-sup-expense").modal("show");
// }

function closeModalAddSubExpense() {
    $(".bd-add-sup-expense").modal("hide");
    $("#addSubExpense")[0].reset();
    $("#addSubExpense").parsley().reset();
    $("#addSubExpense .parsley-required").hide();
}

$('body').on('click', '.click-hover', function () {
    const icon = $(this).find("i");
    // console.log(icon);
    if (icon.hasClass("fa-plus-square")) {
        icon.removeClass("fa-plus-square").addClass("fa-minus-square");
    } else if (icon.hasClass("fa-minus-square")) {
        icon.removeClass("fa-minus-square").addClass("fa-plus-square");
    }
    $(this).parent().next(".sort-sub-group").toggle();
});

$(document).ready(function () {
    var date = new Date();
    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    let Expensedate = year + "-" + month + "-" + day;

    loadTableExpense(Expensedate);
    TotalExpenses(Expensedate);
    TableExpenses(Expensedate);

    $("#datepicker").datepicker({
        onSelect: function (date) {
            // console.log(date);
            // ทำสิ่งที่คุณต้องการเมื่อมีการเลือกวันที่
            if (date == '') {
                loadTableExpense(Expensedate);
                TotalExpenses(Expensedate);
                TableExpenses(Expensedate);
            } else {
                // เช่น เรียกใช้ฟังก์ชันที่ต้องการ
                loadTableExpense(date);
                TotalExpenses(date);
                TableExpenses(date);
            }
        }
    });

    $('#datepickerExpenseList').on('focus', function () {
        flatpickr(this, {
            // ตัวอย่าง: ให้ datepicker แสดงด้านบนของ modal
            position: 'below',
            dateFormat: "Y/m/d",
        });
    });

    // $(".click-hover").click(function () {
    //     const icon = $(this).find("i");
    //     console.log(icon);
    //     if (icon.hasClass("fa-plus-square")) {
    //         icon.removeClass("fa-plus-square").addClass("fa-minus-square");
    //     } else if (icon.hasClass("fa-minus-square")) {
    //         icon.removeClass("fa-minus-square").addClass("fa-plus-square");
    //     }
    //     $(this).parent().next(".sort-sub-group").toggle();
    // });


    // $(".click-hover").on("click", function () {
    //     const icon = $(this).find("i");
    //     console.log(icon);
    //     if (icon.hasClass("fa-plus-square")) {
    //       icon.removeClass("fa-plus-square").addClass("fa-minus-square");
    //     } else if (icon.hasClass("fa-minus-square")) {
    //       icon.removeClass("fa-minus-square").addClass("fa-plus-square");
    //     }
    //     $(this).parent().next(".sort-sub-group").toggle();
    //   });

    // $(".list-group-item.sub").on("mouseenter", function () {
    //     $(this).find(".sub-action-hide").show();
    // });

    // $(".list-group-item.sub").on("mouseleave", function () {
    //     $(this).find(".sub-action-hide").hide();
    // });

    $(".group").on("mouseenter", function () {
        $(this).addClass("group-hovered");
    });

    $(".group").on("mouseleave", function () {
        $(this).removeClass("group-hovered");
    });

    $('body').on('click', '.seveAddSubExpense', function () {
        var Expense_id = $(this).attr('data-id');

        $.ajax({
            url: '/expense/editExpense/' + Expense_id,
            type: "GET",
            dataType: 'json',
            success: function (res) {
                // let $data = res.data
                $(".bd-add-sup-expense").modal("show");

                $(".bd-add-sup-expense .modal-title").html(
                    "New Sub-Group for" + " " + res.data.expense_name
                );
                // $('.bd-edit-expense').modal('show');
                $('#addSubExpense #ExpenseId').val(res.data.id);
                // $('#addSubExpense #expense_name').val(res.data.expense_name);
                // console.log(res.data.Expense_name)
            },
            error: function (data) { }
        });
    });

    $('body').on('click', '.saveRemoveExpense', function () {
        var listItem = $(this).closest("li");
        var Expense_id = $(this).attr('data-id');

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
                    type: "GET",
                    url: "/expense/deleteExpense/" + Expense_id, // Replace with the actual URL
                    success: function (response) {
                        // If the email was removed successfully, update the UI
                        Swal.fire(
                            'ลบสำเร็จ',
                            response.message,
                            'success'
                        )
                        saveRemoveExpenses(listItem);
                    },
                    error: function () {
                        Swal.fire(
                            'ลบไม่สำเร็จ',
                            response.message,
                            'error'
                        )
                    }
                });
            }
        })
    });

    $('body').on('click', '.saveRemoveSubExpense', function () {
        var RemoveSubExpense = $(this).closest('li.list-group-item.sub');
        var Sub_Expense_id = $(this).attr('data-id');

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
                    type: "GET",
                    url: "/expense/deleteSubExpense/" + Sub_Expense_id, // Replace with the actual URL
                    success: function (response) {
                        // If the email was removed successfully, update the UI
                        Swal.fire(
                            'ลบสำเร็จ',
                            response.message,
                            'success'
                        )
                        // console.log(response.ExpenseSubGroupID.expense_group_id);
                        updateSubGroupsCount(response.ExpenseSubGroupID.expense_group_id);
                        saveRemoveSubExpenses(RemoveSubExpense);
                    },
                    error: function () {
                        Swal.fire(
                            'ลบไม่สำเร็จ',
                            response.message,
                            'error'
                        )
                    }
                });
            }
        })
    });
});

//When click edit Expense
$('body').on('click', '.saveEditExpense', function () {
    var Expense_id = $(this).attr('data-id');
    //    alert(employee_id);
    //    exit();
    $.ajax({
        url: '/expense/editExpense/' + Expense_id,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            // let $data = res.data
            $('.bd-edit-expense').modal('show');
            $('#editExpense #ExpenseId').val(res.data.id);
            $('#editExpense #expense_name').val(res.data.expense_name);
            // console.log(res.data.Expense_name)
        },
        error: function (data) { }
    });
});

//When click edit Expense
$('body').on('click', '.saveEditSubExpense', function () {
    var Sub_Expense_id = $(this).attr('data-id');
    //    alert(employee_id);
    //    exit();
    $.ajax({
        url: '/expense/editSubExpense/' + Sub_Expense_id,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            // let $data = res.data
            $('.bd-edit-sub-expense').modal('show');
            $('#editSubExpense #ExpenseId').val(res.data.id);
            $('#editSubExpense #expense_sub_name').val(res.data.sub_expense_name);
            // console.log(res.data.Expense_name)
        },
        error: function (data) { }
    });
});

//modalUpdateExpense
let $modalEditExpense = $(".bd-edit-expense")
let $formEditExpense = $modalEditExpense.find('form')

$formEditExpense
    // บันทึกข้อมูล
    .on('click', '.btnEditExpenseSave', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formEditExpense.find('input[name=expense_name]').val() == '') {
            alert('กรุณาระบุชื่อExpense Group')
            return false;
        }
        // ผ่าน
        else {
            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formEditExpense[0])

            formData.append('content', $formEditExpense.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: '/expense/updateExpense',
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                if (res.success = 1) {

                    Swal.fire({
                        text: "แก้ไข Expense Group สำเร็จ",
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
                    var newExpenseName = $formEditExpense.find('input[name=expense_name]').val();
                    var expenseId = $formEditExpense.find('input[name=ExpenseId]').val();
                    $(`li[data-expense-id='${expenseId}'] .group span`).eq(0).text(newExpenseName);
                    // console.log(expenseId);
                    // console.log(newExpenseName);

                    $(".bd-edit-expense").modal("hide");
                    $("#editExpense")[0].reset();
                    $("#editExpense").parsley().reset();
                    $("#editExpense .parsley-required").hide();

                    // ตัวอย่างการเรียกใช้

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

//modalUpdateExpense
let $modalEditSubExpense = $(".bd-edit-sub-expense")
let $formEditSubExpense = $modalEditSubExpense.find('form')

$formEditSubExpense
    // บันทึกข้อมูล
    .on('click', '.btnEditSubExpenseSave', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formEditSubExpense.find('input[name=expense_sub_name]').val() == '') {
            alert('กรุณาระบุชื่อExpense Sub Group')
            return false;
        }
        // ผ่าน
        else {
            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formEditSubExpense[0])

            formData.append('content', $formEditSubExpense.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: '/expense/updateSubExpense',
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                if (res.success = 1) {

                    Swal.fire({
                        text: "แก้ไข Expense Sub Group สำเร็จ",
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

                    var newExpenseName = $formEditSubExpense.find('input[name=expense_sub_name]').val();
                    var expenseId = $formEditSubExpense.find('input[name=ExpenseId]').val();
                    $(`li.list-group-item.sub[data-sub-expense-id='${expenseId}'] .sub-group span`).text(newExpenseName);
                    // console.log(expenseId);
                    // console.log(newExpenseName);
                    $(".bd-edit-sub-expense").modal("hide");
                    $("#editSubExpense")[0].reset();
                    $("#editSubExpense").parsley().reset();
                    $("#editSubExpense .parsley-required").hide();

                    // ตัวอย่างการเรียกใช้

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

// ModalAddExpense
let $ModalAddExpense = $(".bd-add-expense")
let $formAddExpense = $ModalAddExpense.find('form')

$formAddExpense
    // บันทึกข้อมูล
    .on('click', '.btnSaveAddExpense', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formAddExpense.find('input[name=expense_name]').val() == '') {
            alert('กรุณาระบุชื่อExpense Group')
            return false;
        }
        // ผ่าน
        else {

            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formAddExpense[0])

            formData.append('content', $formAddExpense.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: `${serverUrl}/expense/addExpense`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                //กรณี: บันทึกสำเร็จ
                if (res.success = 1) {

                    Swal.fire({
                        text: "เพิ่ม Expense Group สำเร็จ",
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
                    $(".bd-add-expense").modal("hide");
                    $("#addExpense")[0].reset();
                    $("#addExpense").parsley().reset();
                    $("#addExpense .parsley-required").hide();

                    addExpense(res.ExpenseGroupID);
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

// AddSubExpenseModal
let $ModalAddSubExpense = $(".bd-add-sup-expense")
let $formAddSubExpense = $ModalAddSubExpense.find('form')

$formAddSubExpense
    // บันทึกข้อมูล
    .on('click', '.btnSaveAddSubExpense', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formAddSubExpense.find('input[name=expense_sub_name]').val() == '') {
            alert('กรุณาระบุชื่อExpense Sub Group')
            return false;
        }
        // ผ่าน
        else {

            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formAddSubExpense[0])

            formData.append('content', $formAddSubExpense.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: `${serverUrl}/expense/addSubExpense`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                //กรณี: บันทึกสำเร็จ
                if (res.success = 1) {

                    Swal.fire({
                        text: "เพิ่ม Expense Sub Group สำเร็จ",
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


                    $(".bd-add-sup-expense").modal("hide");
                    $("#addSubExpense")[0].reset();
                    $("#addSubExpense").parsley().reset();
                    $("#addSubExpense .parsley-required").hide();

                    addSubExpense(res.ExpenseSubGroupID);
                    // addSubExpense(res.ExpenseSubGroupID);
                    // console.log(res.ExpenseSubGroupID);
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

function TotalExpenses(date) {
    $.ajax({
        type: 'GET',
        url: `/expense/ajax-totalexpenses`,
        data: { date: date },
        contentType: 'application/json; charset=utf-8',
        success: function (res) {
            if (res.success) {

                let $data = res.data
                $("#total_expenses_list").hide().html($data).fadeIn('slow')
                $("#total_expenses_table").hide().html($data).fadeIn('slow')

            } else {

            }
        },
        error: function (res) { }
    });
};

function TableExpenses(date) {
    $.ajax({
        type: 'GET',
        url: `/expense/ajax-expenses`,
        data: { date: date },
        contentType: 'application/json; charset=utf-8',
        success: function (res) {
            if (res.success) {

                let $data = res.data
                $("#total_expenses").hide().html($data).fadeIn('slow')

            } else {

            }
        },
        error: function (res) { }
    });
};

function addExpensesList() {
    var date = new Date();
    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    let Expensedate = year + "/" + month + "/" + day;

    var datepickerExpenseList = document.querySelector("#datepickerExpenseList");
    var datepickerExpenseList = datepickerExpenseList.value;
    var dateExpense = document.querySelector("#datepicker");

    if (dateExpense.value == '') {
        var dateExpense = Expensedate;
    } else {
        var dateExpense = dateExpense.value;
    }
    // console.log(dateExpense,'tt');

    if (datepickerExpenseList == '') {
        alert('กรุณาระบุวันที่ต้องการเพิ่มข้อมูล')
        return false;
    } else {
        // วนลูปผ่านแต่ละแถวและตรวจสอบว่ามีค่าในฟิลด์ "Amount" หรือไม่
        var tableBody = $('#tableLists tbody');
        var rowsWithAmountss = [];
        tableBody.find('tr').each(function () {
            var amountCell = $(this).find('td:eq(3) input').val(); // ตำแหน่งของเซลล์ Amount (index 3)
            // console.log(amountCell);
            // ถ้ามีข้อมูลในเซลล์ Amount ให้เก็บแถวนี้
            if (amountCell != null && amountCell != '') {
                var amountData = {
                    group: $(this).find('td:eq(1) select').val(),
                    title: $(this).find('td:eq(2) select').val(),
                    amount: $(this).find('td:eq(3) input').val(),
                    comment: $(this).find('td:eq(4) input').val()
                };
                rowsWithAmountss.push(amountData);
            }
        });
        // console.log('บันทึกลงฐานข้อมูล:', rowsWithAmountss);
        if (rowsWithAmountss != '') {

            $.ajax({
                type: "POST",
                url: `${serverUrl}/expense/addExpenseDate`,
                data: { rowsWithAmountss, date: datepickerExpenseList },
                success: function (data) {
                    closeModalAddExpenseList();
                    // console.log(datepickerExpenseList, dateExpense);
                    if (datepickerExpenseList == dateExpense) {
                        loadTableExpense(datepickerExpenseList);
                        TotalExpenses(datepickerExpenseList);
                        TableExpenses(datepickerExpenseList);
                    }
                },
                error: function () {
                    alert("error");
                }
            });
        } else {
            alert('กรุณากรอกข้อมูล')
            return false;
        }
    }
}
//btnDeleteExpenseList
$('body').on('click', '.btnDeleteExpenseList', function () {
    var Expense_ID = $(this).attr('data-id');

    var dateExpense = document.querySelector("#datepicker");

    var dateExpense = dateExpense.value;

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
                url: '/expense/deleteExpenseList/' + Expense_ID,
                method: 'get',
                success: function (response) {
                    Swal.fire(
                        'ลบสำเร็จ',
                        response.message,
                        'success'
                    )
                    loadTableExpense(dateExpense);
                    TotalExpenses(dateExpense);
                    TableExpenses(dateExpense);
                }
            });
        }
    })
});
function TableList() {
    var group = document.getElementById("group");
    group.style.display = "none";
    var list = document.getElementById("list");
    list.style.display = "block";
}

function TableGroup() {
    var group = document.getElementById("group");
    group.style.display = "block";
    var list = document.getElementById("list");
    list.style.display = "none";
}

function updateTitle(rowNumber, selectedGroupId) {
    // ให้หา element ที่มี id="title" และเปลี่ยนเนื้อหาของมัน
    var title = document.getElementById('title_' + rowNumber);
    var amount = document.getElementById('amount_' + rowNumber);
    var comment = document.getElementById('comment_' + rowNumber);

    // ลบ select ที่มี name="group_title" ทิ้ง
    var existingSelect = title.querySelector('select[name="group_title"]');
    if (existingSelect) {
        existingSelect.remove();
    }

    // เพิ่มเงื่อนไขที่คอยตรวจสอบว่า selectedGroupId ไม่ใช่ค่าเริ่มต้น
    if (selectedGroupId !== '0') {
        $.ajax({
            url: '/expense/getSubGroup/' + selectedGroupId,
            method: 'get',
            success: function (res) {
                // console.log(res);
                if (res.success == 1) {
                    var selectHTML = '<select class="form-select" name="group_title" id="group_title">';
                    // จัดการกับข้อมูลที่ได้รับ
                    var data = res.data;
                    for (var i = 0; i < data.length; i++) {
                        var id = data[i].id;
                        var subExpenseName = data[i].sub_expense_name;
                        // ทำสิ่งที่คุณต้องการกับข้อมูลที่ได้รับ
                        selectHTML += '<option value="' + id + '">' + subExpenseName + '</option>';
                    }
                    selectHTML += '</select>';
                    title.insertAdjacentHTML('beforeend', selectHTML);
                } else {
                    console.error('Error: ' + res.message);
                }
            }
        });
        amount.innerHTML = '<input type="text" class="form-control" placeholder="Amount" id="amount" name="amount" required=""><div class="input-group-text"><span class="">Amount</span></div>';
        comment.innerHTML = '<input type="text" class="form-control" placeholder="Comment" id="comment" name="comment" required="">';
    } else {
        title.innerHTML = ''; // ลบเนื้อหาถ้าค่าเริ่มต้น
        amount.innerHTML = '';
        comment.innerHTML = '';
    }
}

function addNewRow() {
    // console.log('Test');
    var table = document.getElementById('tableLists');
    var newRowNumber = table.rows.length;

    var newRow = table.insertRow(-1);

    // Column 1: Index
    var indexCell = newRow.insertCell(0);
    indexCell.innerHTML = `<p class="mt-2">${newRowNumber}</p>`;

    // Column 2: Group Lists (Dropdown)
    var groupCell = newRow.insertCell(1);
    var groupSelect = document.createElement('select');
    groupSelect.className = 'form-select';
    groupSelect.name = 'group_lists';
    groupSelect.id = 'group_lists';
    groupSelect.setAttribute('onchange', `updateTitle(${newRowNumber}, this.value)`);
    groupSelect.innerHTML = '<option value="0">Select Group</option>';

    $.ajax({
        url: '/expense/getGroup',
        method: 'get',
        success: function (res) {
            // console.log(res);
            if (res.success == 1) {
                var data = res.data;
                for (var i = 0; i < data.length; i++) {
                    var ExpenseID = data[i].id;
                    var ExpenseName = data[i].expense_name;
                    var option = document.createElement('option');
                    option.value = ExpenseID;
                    option.textContent = ExpenseName;
                    groupSelect.appendChild(option);
                }
            } else {
                console.error('Error: ' + res.message);
            }
        }
    });

    groupCell.appendChild(groupSelect);

    // Column 3: Title
    var titleCell = newRow.insertCell(2);
    titleCell.innerHTML = `<div id="title_${newRowNumber}"></div>`;

    // Column 4: Amount
    var amountCell = newRow.insertCell(3);
    amountCell.innerHTML = `<div class="input-group" id="amount_${newRowNumber}"></div>`;

    // Column 5: Comment
    var commentCell = newRow.insertCell(4);
    commentCell.innerHTML = `<div class="input-group" id="comment_${newRowNumber}"></div>`;

    // Column 6: Remove Button
    var removeCell = newRow.insertCell(5);
    removeCell.innerHTML = `<button type="button" class="btn btn-danger saveRemoveLine" onclick="removeRow(this)">Remove</button>`;
}

function removeRow(button) {
    var $row = $(button).closest('tr');
    var $table = $row.closest('table');
    
    // ลบแถวนั้น
    $row.remove();

    // ปรับปรุงหมายเลขแถวใหม่
    var $rows = $table.find('tbody tr');
    
    $rows.each(function (i) {
        var rowNumber = i + 1;
        var $pElement = $(this).find('td p');
        $pElement.text(rowNumber);

        // ปรับปรุงฟิลด์ ID และ onchange function ของ select
        var $selectElement = $(this).find('td select');
        $selectElement.prop('id', 'group_lists_' + rowNumber);
        $selectElement.attr('onchange', 'updateTitle(' + rowNumber + ', this.value)');

        // ปรับปรุง ID ของ div ที่ใช้เก็บข้อมูล
        var $titleDiv = $(this).find('td div[id^="title_"]');
        $titleDiv.prop('id', 'title_' + rowNumber);

        var $amountDiv = $(this).find('td div[id^="amount_"]');
        // console.log($titleDiv.prop('id') + 'a');
        $amountDiv.prop('id', 'amount_' + rowNumber);

        var $commentDiv = $(this).find('td div[id^="comment_"]');
        $commentDiv.prop('id', 'comment_' + rowNumber);
    });
}



// สร้างฟังก์ชันเพิ่มรายการค่าใช้จ่าย
function addExpense(Expense) {
    // สร้าง <li> element ใหม่
    var newLi = $("<li>").addClass("list-group-item").attr("data-expense-id", Expense.id);

    // สร้างโครงสร้างภายใน <li>
    var newDivGroup = $("<div>").addClass("group");
    var newClickHover = $("<div>").addClass("click-hover");
    var newPlusIcon = $("<i>").addClass("fas fa-plus-square").css("cursor", "pointer");
    var newSpanBold = $("<span>").css({ "font-weight": "bold", "cursor": "pointer", "padding-left": "10px" }).text(Expense.expense_name);
    var newSpanItalic = $("<span>").css({ "font-style": "italic", "margin-left": "10px", "color": "gray" }).text("(0)");

    // เพิ่ม element ลงใน DOM
    newClickHover.append(newPlusIcon, newSpanBold, newSpanItalic);
    newDivGroup.append(newClickHover);

    // เพิ่มปุ่ม "Add Sub-group"
    var addButton = createButton("Add Sub-Group", "btn-success", Expense.id, "seveAddSubExpense", 320, "fa fa-plus");
    newDivGroup.append(addButton);

    // เพิ่มปุ่ม "Edit"
    var editButton = createButton("Edit", "btn-primary", Expense.id, "saveEditExpense", 500, "ti-pencil");
    newDivGroup.append(editButton);

    // เพิ่มปุ่ม "Remove"
    var removeButton = createButton("Remove", "btn-danger", Expense.id, "saveRemoveExpense", 600, "ti-trash");
    newDivGroup.append(removeButton);

    // เพิ่ม <div class="sort-sub-group" style="margin-top: 5px; display: none;"> และ <ul class="sort-sub-group ui-sortable"></ul>
    var subGroupContainer = $("<div>").addClass("sort-sub-group").css("margin-top", "5px").css("display", "none");
    var subGroupList = $("<ul>").addClass("sort-sub-group ui-sortable").attr("data-expense-id", Expense.id);

    subGroupContainer.append(subGroupList);
    // newDivGroup.append(subGroupContainer);

    // console.log("newDivGroup:", newDivGroup);
    // console.log("subGroupContainer:", subGroupContainer);
    // console.log("subGroupList:", subGroupList);


    // เพิ่ม <li> ใหม่ลงในรายการที่มีอยู่
    $("#sort-group").append(newLi.append(newDivGroup));
    $("#sort-group").append(newLi.append(subGroupContainer));
}

// สร้างฟังก์ชันสร้างปุ่ม
function createButton(text, className, id, Name, leftPosition, iconClass) {
    return $("<button>").attr({
        type: "button",
        class: "btn " + className + " group-action-hide " + Name,
        "data-id": id,
        style: "position: absolute; left: " + leftPosition + "px; padding-top: 0px; margin-top: -26px;padding-bottom: 2px;"
    }).append($("<i>").addClass(iconClass + " f_s_14 me-2").css("vertical-align", "middle"), text);
}


// $(".saveRemoveExpense").on("click", saveRemoveExpense);

function saveRemoveExpenses(listItem) {
    // console.log('Removing:', listItem);
    // ลบ <li> ที่ถูกคลิก
    listItem.remove();
}

function saveRemoveSubExpenses(RemoveSubExpense) {
    // หา element li ที่ต้องการลบ
    // var $liToRemove = $(this).closest('li.list-group-item.sub');
    // ลบ element li ออก
    RemoveSubExpense.remove();
}

function updateSubGroupsCount(expenseId) {
    // var subGroupCount = $(`.sort-sub-group.ui-sortable[data-expense-id="${expenseId}"] li.list-group-item.sub`).length;
    var groupItem = $(`#sort-group li.list-group-item[data-expense-id="${expenseId}"]`);
    var spanElement = groupItem.find(".click-hover span:last-child");

    // ลดค่าปัจจุบันลง 1
    var currentCount = parseInt(spanElement.text().replace(/\D/g, ''), 10);
    var newCount = Math.max(0, currentCount - 1);

    // อัปเดตและแสดงใน span
    spanElement.text(`(${newCount})`);

    // groupItem.find(".click-hover span:last-child").text(`(${subGroupCount})`);
    // console.log(newCount);
}

function addSubExpense(SubExpense) {
    // ดึงข้อมูล expense_id จาก data-id ของปุ่ม
    var expenseId = SubExpense.expense_group_id;
    // console.log(expenseId);
    // สร้าง <li> ใหม่
    var newSubLi = $('<li>').addClass('list-group-item sub').attr("data-sub-expense-id", SubExpense.id).css({ 'border-left': '0', 'border-right': '0' });

    // สร้างโครงสร้างภายใน <li> สำหรับ Sub-Expense
    var newSubGroup = $('<div>').addClass('sub-group');
    var newSubSpan = $('<span>').text(SubExpense.sub_expense_name); // สามารถแก้ไขตามความต้องการ

    // เพิ่มปุ่ม "Edit" สำหรับ Sub-Expense
    var editSubButton = $('<button>').attr({
        'type': 'button',
        'class': 'btn btn-primary sub-action-hide saveEditSubExpense',
        'data-id': SubExpense.id // ต้องกำหนด ID ให้แตกต่างกันทุกครั้งที่สร้างใหม่
    }).css({
        'position': 'absolute',
        'left': '400px',
        'padding-top': '0px',
        'margin-top': '-25px',
        'padding-bottom': '2px'
        // 'display': 'none'
    }).html('<i class="ti-pencil f_s_14 me-2" style="vertical-align: middle;"></i>Edit');

    // เพิ่มปุ่ม "Remove" สำหรับ Sub-Expense
    var removeSubButton = $('<button>').attr({
        'type': 'button',
        'class': 'btn btn-danger sub-action-hide saveRemoveSubExpense',
        'data-id': SubExpense.id // ต้องกำหนด ID ให้แตกต่างกันทุกครั้งที่สร้างใหม่
    }).css({
        'position': 'absolute',
        'left': '500px',
        'padding-top': '0px',
        'padding-bottom': '2px',
        'margin-top': '-25px'
        // 'display': 'none'
    }).html('<i class="ti-trash f_s_14 me-2" style="vertical-align: middle;"></i>Remove');

    // เพิ่ม Element ลงใน DOM
    newSubGroup.append(newSubSpan, editSubButton, removeSubButton);
    newSubLi.append(newSubGroup);

    // นำ <li> ใหม่ลงในรายการ Sub-Expense
    $('.sort-sub-group.ui-sortable[data-expense-id="' + expenseId + '"]').append(newSubLi);

    var groupItem = $(`#sort-group li.list-group-item[data-expense-id="${expenseId}"]`);
    var spanElement = groupItem.find(".click-hover span:last-child");

    // บวกค่าปัจจุบันขึ้น 1
    var currentCount = parseInt(spanElement.text().replace(/\D/g, ''), 10);
    var newCount = Math.max(0, currentCount + 1);

    // อัปเดตและแสดงใน span
    spanElement.text(`(${newCount})`);
}

function loadTableExpense(date) {
    $("#tableListshow").DataTable().clear().destroy();
    $("#tableListshow").DataTable({
        "oLanguage": {
            "sInfo": "กำลังแสดง _START_ ถึง _END_ จาก _TOTAL_ แถว หน้า _PAGE_ ใน _PAGES_",
            "sLengthMenu": "แสดง _MENU_ แถว",
            "oPaginate": {
                "sPrevious": "<i class='ti-arrow-left'></i>",
                "sNext": "<i class='ti-arrow-right'></i>",
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
                'className': 'text-center',
                "targets": [1],
            },
            {
                'className': 'text-center',
                "targets": [2],
            },
            {
                'className': 'dt-body-right',
                "targets": [3],
                "render": $.fn.dataTable.render.number(',', '.', 2, ''),
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
            'url': "/expense/ajax-datatableExpense",
            'data': { date: date },
        },
        "columns": [{
            data: null,
            "sortable": false,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: "expense_name"
        },
        {
            data: "sub_expense_name"
        },
        {
            data: "amount"
        },
        {
            data: "comment"
        },
        {
            data: null,
            render: function (data, type, row, meta) {
                return (
                    '<div class="action_btns d-flex" style="justify-content: center;"><a href="#" class="action_btn btnDeleteExpenseList" data-id="' + data["id"] + '"> <i class="fas fa-trash"></i> </a></div>'
                );
            },
        }
        ],
        "bFilter": false,
    });
}