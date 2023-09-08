$(document).ready(function () {
    // ฟังก์ชันเพื่อแสดง newUser
    function showNewUser() {
        var newUser = document.getElementById("newUser");
        newUser.style.display = "block";
    }

    // ฟังก์ชันเพื่อแสดง UserDetail
    function showUserDetail() {
        var UserDetail = document.getElementById("user-detail");
        UserDetail.style.display = "block";
    }

    // ฟังก์ชันเพื่อแสดงหน้า Add
    function showAddUser() {
        var addUser = document.getElementById("newUser");
        addUser.style.display = "block";
    }

    // คำสั่งให้ปุ่ม "Add" เรียก showNewUser เมื่อคลิก
    var addUserBtn = document.getElementById("addUserBtn");
    addUserBtn.addEventListener("click", showNewUser);

    // เพิ่ม Event Listener เมื่อค่าใน <select> ถูกเปลี่ยน
    var roleSelect = document.getElementById("roles");
    var checkboxes = document.getElementById("checkboxes");

    roleSelect.addEventListener("change", function () {
        if (roleSelect.value === "0") {
            checkboxes.style.display = "block"; // แสดง Checkbox เมื่อเลือก Custom User
        } else {
            checkboxes.style.display = "none"; // ซ่อน Checkbox เมื่อเลือก Admin
        }
    });

    // เพิ่ม Event Listener เมื่อค่าใน <select> ถูกเปลี่ยน
    var editRolesSelect = document.getElementById("edit_roles");
    var editcheckboxes = document.getElementById("editcheckboxes");

    editRolesSelect.addEventListener("change", function () {
        if (editRolesSelect.value === "0") {
            editcheckboxes.style.display = "block"; // แสดง Checkbox เมื่อเลือก Custom User
        } else {
            editcheckboxes.style.display = "none"; // ซ่อน Checkbox เมื่อเลือก Admin
        }
    });

    // Event Listener เมื่อคลิกที่องค์ประกอบที่มีคลาส "editUser"
    var editUserElements = document.querySelectorAll('.editUser');
    var UserDetail = document.getElementById("user-detail");
    var editcheckboxes = document.getElementById("editcheckboxes");

    editUserElements.forEach(function (editUserElement) {
        editUserElement.addEventListener('click', function () {
            var Employee_id = editUserElement.getAttribute('data-id');
            // console.log('1');
            $.ajax({
                url: '/setting/editUser/' + Employee_id,
                type: "GET",
                dataType: 'json',
                success: function (res) {
                    $("#editUserID").val(Employee_id);
                    $("#edit_username").val(res.data.username);
                    $("#edit_name_userlogin").val(res.data.name);
                    $("#edit_roles").val(res.data.roles);
                    if (res.data.roles == 0) {
                        editcheckboxes.style.display = "block"; // แสดง Checkbox เมื่อเลือก Custom User
                    } else {
                        editcheckboxes.style.display = "none"; // ซ่อน Checkbox เมื่อเลือก Admin
                    }
                    if (res.data.setting_pos == 1) {
                        $('#checkbox_Edit_Pos').prop("checked", true);
                    } else {
                        $('#checkbox_Edit_Pos').prop("checked", false);
                    }
                    if (res.data.setting_report == 1) {
                        $('#checkbox_Edit_Report').prop("checked", true);
                    } else {
                        $('#checkbox_Edit_Report').prop("checked", false);
                    }
                    if (res.data.setting_menu == 1) {
                        $('#checkbox_Edit_Menu').prop("checked", true);
                    } else {
                        $('#checkbox_Edit_Menu').prop("checked", false);
                    }
                    if (res.data.setting_expense == 1) {
                        $('#checkbox_Edit_Expense').prop("checked", true);
                    } else {
                        $('#checkbox_Edit_Expense').prop("checked", false);
                    }
                    if (res.data.setting_stock == 1) {
                        $('#checkbox_Edit_Stock').prop("checked", true);
                    } else {
                        $('#checkbox_Edit_Stock').prop("checked", false);
                    }
                    if (res.data.setting_setting == 1) {
                        $('#checkbox_Edit_Setting').prop("checked", true);
                    } else {
                        $('#checkbox_Edit_Setting').prop("checked", false);
                    }
                },
            });

            // ตรวจสอบว่า "newUser" ถูกแสดงหรือไม่
            if (newUser.style.display === "block") {
                // ถ้า "newUser" ถูกแสดงอยู่ ให้ซ่อน "newUser" และแสดง "user-detail"
                newUser.style.display = "none";
                UserDetail.style.display = "block";
            } else {
                // ถ้า "newUser" ไม่ถูกแสดง ให้แสดง "user-detail" โดยตรง
                UserDetail.style.display = "block";
            }
        });
    });


    // Event Listener เมื่อคลิก "Add" ในหน้า "editUser"
    var addUserBtnButton = document.getElementById("addUserBtn");

    addUserBtnButton.addEventListener("click", function () {
        // ซ่อน "user-detail" และแสดง "addUser"
        UserDetail.style.display = "none";
        showAddUser();
    });

    //When click Add UserAccounts
    $('body').on('click', '.saveRemoveUser', function () {

        var editUserID = document.querySelector("#editUserID");
        var editUserID = editUserID.value;

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
                    url: "/setting/deleteUser/" + editUserID, // Replace with the actual URL
                    success: function (response) {
                        // If the email was removed successfully, update the UI
                        Swal.fire(
                            'ลบสำเร็จ',
                            response.message,
                            'success'
                        )
                        removeItemFromAList(editUserID);
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

// ฟังก์ชันสำหรับอัพเดต roles ใน A list-group
function updateListItemRoles(employeeId, newRoles) {
    console.log('Updating roles for employeeId: ' + employeeId + ', newRoles: ' + newRoles);
    var listItems = document.querySelectorAll('.A.list-group a[data-id="' + employeeId + '"]');
    listItems.forEach(function (listItem) {
        var rolesSpan = listItem.querySelector('span.roles');
        console.log(rolesSpan);
        if (rolesSpan) {
            rolesSpan.textContent = ' ( ' + (newRoles == '1' ? 'Admin' : 'Custom User') + ' )';
        }
    });
}

function removeItemFromAList(itemId) {
    // ทำการลบรายการ A list-group โดยใช้ `data-id`
    $(".A.list-group a[data-id='" + itemId + "']").remove();
}

// ฟังก์ชันสำหรับสร้าง element และเพิ่มลงในรายการ
function createEmployeeListItem(employee) {
    var roles = employee.roles == '1' ? 'Admin' : 'Custom User';

    var listItem = document.createElement('a');
    listItem.className = 'list-group-item editUser';
    listItem.setAttribute('data-id', employee.id);
    listItem.style.cursor = 'pointer';

    var usernameSpan = document.createElement('span');
    usernameSpan.textContent = employee.username;

    var rolesSpan = document.createElement('span');
    rolesSpan.className = 'roles';
    rolesSpan.style.marginLeft = '15px';
    rolesSpan.style.fontSize = '0.8em';
    rolesSpan.style.fontStyle = 'italic';
    rolesSpan.style.color = 'gray';
    rolesSpan.textContent = ' ( ' + roles + ' )';

    listItem.appendChild(usernameSpan);
    listItem.appendChild(rolesSpan);

    return listItem;
}

// ฟังก์ชันสำหรับรีเซ็ตฟอร์ม
function resetForm() {
    // ล้างค่าฟิลด์ของฟอร์ม
    document.getElementById("username").value = "";
    document.getElementById("user_password").value = "";
    document.getElementById("repassword").value = "";
    document.getElementById("name_userlogin").value = "";
    document.getElementById("roles").value = "1"; // ตั้งค่า Role เป็น Admin

    document.getElementById("checkbox_Pos").checked = false;
    document.getElementById("checkbox_Report").checked = false;
    document.getElementById("checkbox_Menu").checked = false;
    document.getElementById("checkbox_Expense").checked = false;
    document.getElementById("checkbox_Stock").checked = false;
    document.getElementById("checkbox_Setting").checked = false;

    checkboxes.style.display = "none";
}

//When click Add UserAccounts
$('body').on('click', '#saveNewUser', function () {
    var username = document.querySelector("#username");
    var user_password = document.querySelector("#user_password");
    var repassword = document.querySelector("#repassword");
    var name_userlogin = document.querySelector("#name_userlogin");
    var roles = document.querySelector("#roles");

    var username = username.value;
    var user_password = user_password.value;
    var repassword = repassword.value;
    var name_userlogin = name_userlogin.value;
    var roles = roles.value;

    var Pos = document.getElementById("checkbox_Pos").checked;
    var Report = document.getElementById("checkbox_Report").checked;
    var Menu = document.getElementById("checkbox_Menu").checked;
    var Expense = document.getElementById("checkbox_Expense").checked;
    var Stock = document.getElementById("checkbox_Stock").checked;
    var Setting = document.getElementById("checkbox_Setting").checked;

    // เช็คข้อมูล
    if (username == '') {
        alert('กรุณากรอก Username')
        return false;
    }
    else if (user_password == '') {
        alert('กรุณากรอกรหัสผ่าน')
        return false;
    }
    else if (repassword == '') {
        alert('กรุณากรอกยืนยันรหัสผ่าน')
        return false;
    }
    else if (user_password != repassword) {
        alert('รหัสผ่านไม่ตรงกัน กรุณากรอกยืนยันรหัสผ่านใหม่')
        return false;
    }
    else if (name_userlogin == '') {
        alert('กรุณากรอกชื่อ')
        return false;
    }

    $.ajax({
        type: "POST",
        url: "/setting/addNewUser", // Replace with the actual URL
        data: {
            username: username, user_password: user_password, name_userlogin: name_userlogin,
            roles: roles, Pos: Pos, Report: Report, Menu: Menu, Expense: Expense, Stock: Stock, Setting: Setting
        },
    }).done(function (res) {
        //กรณี: บันทึกสำเร็จ
        if (res.success = 1) {

            Swal.fire({
                text: "เพิ่ม UserLogin สำเร็จ",
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
            var listItem = createEmployeeListItem(res.employeeID);
            var listContainer = document.querySelector('.A');
            listContainer.appendChild(listItem);
            // addNewUserToList();
            resetForm();

            var UserDetail = document.getElementById("user-detail");
            var editcheckboxes = document.getElementById("editcheckboxes");
            // ผูกอีเวนต์ click ใหม่หลังจากสร้างรายการใหม่
            listItem.addEventListener('click', function () {
                var Employee_id = listItem.getAttribute('data-id');
                // console.log('2');
                $.ajax({
                    url: '/setting/editUser/' + Employee_id,
                    type: "GET",
                    dataType: 'json',
                    success: function (res) {
                        $("#editUserID").val(Employee_id);
                        $("#edit_username").val(res.data.username);
                        $("#edit_name_userlogin").val(res.data.name);
                        $("#edit_roles").val(res.data.roles);
                        if (res.data.roles == 0) {
                            editcheckboxes.style.display = "block"; // แสดง Checkbox เมื่อเลือก Custom User
                        } else {
                            editcheckboxes.style.display = "none"; // ซ่อน Checkbox เมื่อเลือก Admin
                        }
                        if (res.data.setting_pos == 1) {
                            $('#checkbox_Edit_Pos').prop("checked", true);
                        } else {
                            $('#checkbox_Edit_Pos').prop("checked", false);
                        }
                        if (res.data.setting_report == 1) {
                            $('#checkbox_Edit_Report').prop("checked", true);
                        } else {
                            $('#checkbox_Edit_Report').prop("checked", false);
                        }
                        if (res.data.setting_menu == 1) {
                            $('#checkbox_Edit_Menu').prop("checked", true);
                        } else {
                            $('#checkbox_Edit_Menu').prop("checked", false);
                        }
                        if (res.data.setting_expense == 1) {
                            $('#checkbox_Edit_Expense').prop("checked", true);
                        } else {
                            $('#checkbox_Edit_Expense').prop("checked", false);
                        }
                        if (res.data.setting_stock == 1) {
                            $('#checkbox_Edit_Stock').prop("checked", true);
                        } else {
                            $('#checkbox_Edit_Stock').prop("checked", false);
                        }
                        if (res.data.setting_setting == 1) {
                            $('#checkbox_Edit_Setting').prop("checked", true);
                        } else {
                            $('#checkbox_Edit_Setting').prop("checked", false);
                        }
                    },
                });
    
                // ตรวจสอบว่า "newUser" ถูกแสดงหรือไม่
                if (newUser.style.display === "block") {
                    // ถ้า "newUser" ถูกแสดงอยู่ ให้ซ่อน "newUser" และแสดง "user-detail"
                    newUser.style.display = "none";
                    UserDetail.style.display = "block";
                } else {
                    // ถ้า "newUser" ไม่ถูกแสดง ให้แสดง "user-detail" โดยตรง
                    UserDetail.style.display = "block";
                }
            });
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
});

//When click Add UserAccounts
$('body').on('click', '.saveEditUser', function () {

    var editUserID = document.querySelector("#editUserID");
    var name_userlogin = document.querySelector("#edit_name_userlogin");
    var roles = document.querySelector("#edit_roles");

    var editUserID = editUserID.value;
    var name_userlogin = name_userlogin.value;
    var roles = roles.value;

    var Pos = document.getElementById("checkbox_Edit_Pos").checked;
    var Report = document.getElementById("checkbox_Edit_Report").checked;
    var Menu = document.getElementById("checkbox_Edit_Menu").checked;
    var Expense = document.getElementById("checkbox_Edit_Expense").checked;
    var Stock = document.getElementById("checkbox_Edit_Stock").checked;
    var Setting = document.getElementById("checkbox_Edit_Setting").checked;

    // เช็คข้อมูล
    if (name_userlogin == '') {
        alert('กรุณากรอกชื่อ')
        return false;
    }
    $.ajax({
        type: "POST",
        url: "/setting/updateUser", // Replace with the actual URL
        data: {
            editUserID: editUserID, name_userlogin: name_userlogin, roles: roles, Pos: Pos,
            Report: Report, Menu: Menu, Expense: Expense, Stock: Stock, Setting: Setting
        },
    }).done(function (res) {
        //กรณี: บันทึกสำเร็จ
        if (res.success = 1) {

            Swal.fire({
                text: "แก้ไข UserLogin สำเร็จ",
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
            updateListItemRoles(editUserID, roles);
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
});