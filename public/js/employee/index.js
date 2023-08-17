//previewImage
function PreviewImage(input, previewImage) {
    if (input.files && input.files[0]) {
        var reader = new FileReader()

        reader.onload = function (e) {
            $('#' + previewImage).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function openModalAddEmployee() {
    $(".bd-add-employee").modal("show");
}

function closeModalAddEmployee() {
    $(".bd-add-employee").modal("hide");
    $("#addEmployee")[0].reset();
    $("#addEmployee").parsley().reset();
    $("#addEmployee .parsley-required").hide();
}

$(document).ready(function () {

    // ModalAddEmployee
    let $ModalAddEmployee = $(".bd-add-employee")
    let $formAddEmployee = $ModalAddEmployee.find('form')

    $formAddEmployee
        // บันทึกข้อมูล
        .on('click', '.btnSaveEmployee', function (e) {
            e.preventDefault()

            // เช็คข้อมูล
            if ($formAddEmployee.find('input[name=name]').val() == '') {
                alert('กรุณาระบุชื่อ-นามสกุล')
                return false;
            }
            else if ($formAddEmployee.find('select[name=branch_id]').val() == '0') {
                alert('กรุณาเลือกสาขา')
                return false;
            }
            else if ($formAddEmployee.find('select[name=position_id]').val() == '0') {
                alert('กรุณาเลือกตำแหน่ง')
                return false;
            }
            else if ($formAddEmployee.find('input[name=username]').val() == '') {
                alert('กรุณาระบุชื่อผู้ใช้')
                return false;
            }
            else if ($formAddEmployee.find('input[name=password]').val() == '') {
                alert('กรุณาระบุรหัสผ่าน')
                return false;
            }
            // ผ่าน
            else {

                let $me = $(this)

                $me.attr('disabled', true)

                let formData = new FormData($formAddEmployee[0])

                formData.append('content', $formAddEmployee.find('.ql-editor').html())

                $.ajax({
                    type: "POST",
                    url: `${serverUrl}/employee/addEmployee`,
                    data: formData,
                    processData: false,
                    contentType: false,
                }).done(function (res) {

                    //กรณี: บันทึกสำเร็จ
                    if (res.success = 1) {

                        Swal.fire({
                            text: "เพิ่ม พนักงาน สำเร็จ",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "ตกลง",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {

                                setTimeout(function () {
                                    window.location = '/employee/index'
                                }, 1 * 1500)

                            }
                        })
                        setTimeout(function () {
                            window.location = '/employee/index'
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

    //When click edit password
    $('body').on('click', '.btnEditPasswordEmployee', function () {
        var employee_id = $(this).attr('data-id');
        //    alert(employee_id);
        //    exit();
        $.ajax({
            url: '/employee/editPassword/' + employee_id,
            type: "GET",
            dataType: 'json',
            success: function (res) {
                // let $data = res.data
                $('.bd-edit-password').modal('show');
                $('#editPassword #EmployeeId').val(res.data.id);
                $('#editPassword #username').val(res.data.username);
            },
            error: function (data) { }
        });
    });

    //modalUpdatePassword
    let $modalEditPassword = $(".bd-edit-password")
    let $formEditPassword = $modalEditPassword.find('form')

    $formEditPassword
        // บันทึกข้อมูล
        .on('click', '.btnEditSavePassword', function (e) {
            e.preventDefault()

            // เช็คข้อมูล
            if ($formEditPassword.find('input[name=new_password]').val() == '') {
                alert('กรุณากรอกรหัสผ่านใหม่')
                return false;
            }
            else if ($formEditPassword.find('input[name=confirm_password]').val() == '') {
                alert('กรุณากรอกยืนยันรหัสผ่านใหม่')
                return false;
            }
            else if ($formEditPassword.find('input[name=new_password]').val() != $formEditPassword.find('input[name=confirm_password]').val()) {
                alert('รหัสผ่านไม่ตรงกัน กรุณากรอกยืนยันรหัสผ่านใหม่')
                return false;
            }
            // ผ่าน
            else {
                let $me = $(this)

                $me.attr('disabled', true)

                let formData = new FormData($formEditPassword[0])

                formData.append('content', $formEditPassword.find('.ql-editor').html())

                $.ajax({
                    type: "POST",
                    url: '/employee/updatePassword',
                    data: formData,
                    processData: false,
                    contentType: false,
                }).done(function (res) {

                    if (res.success = 1) {

                        Swal.fire({
                            text: "แก้ไข รหัสผ่าน สำเร็จ",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "ตกลง",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                setTimeout(function () {
                                    window.location = '/employee/index'
                                }, 1 * 1500)
                            }
                        })

                        setTimeout(function () {
                            window.location = '/employee/index'
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

    //When click edit Employee
    $('body').on('click', '.btnEditEmployee', function () {
        var Employee_id = $(this).attr('data-id');
        //    alert(employee_id);
        //    exit();
        $.ajax({
            url: '/employee/editEmployee/' + Employee_id,
            type: "GET",
            dataType: 'json',
            success: function (res) {
                // if (res.data.thumbnail != '') {
                //     thumbnail = res.data.thumbnail;
                // } else {
                //     thumbnail = 'nullthumbnail.png';
                // }
                // let $data = res.data
                $('.bd-edit-employee').modal('show');
                $('#editEmployee #EmployeeId').val(res.data.id);
                $('#editEmployee #edit_name').val(res.data.name);
                $('#editEmployee #edit_nickname').val(res.data.nickname);
                $('#editEmployee #edit_phone_number').val(res.data.phone_number);
                $('#editEmployee #edit_employee_email').val(res.data.employee_email);
                $('#editEmployee #edit_branch_id').val(res.data.branch_id);
                $('#editEmployee #edit_position_id').val(res.data.position_id);
                $('#editEmployee #ePreviewThumbnail').attr('src', `/uploads/img/${res.data.thumbnail}`);
            },
            error: function (data) { }
        });
    });

    //modalUpdateEmployee
    let $modalEditEmployee = $(".bd-edit-employee")
    let $formEditEmployee = $modalEditEmployee.find('form')

    $formEditEmployee
        // บันทึกข้อมูล
        .on('click', '.btnEditSaveEmployee', function (e) {
            e.preventDefault()

            // เช็คข้อมูล
            if ($formAddEmployee.find('input[name=edit_name]').val() == '') {
                alert('กรุณาระบุชื่อ-นามสกุล')
                return false;
            }
            else if ($formAddEmployee.find('select[name=edit_branch_id]').val() == '0') {
                alert('กรุณาเลือกสาขา')
                return false;
            }
            else if ($formAddEmployee.find('select[name=edit_position_id]').val() == '0') {
                alert('กรุณาเลือกตำแหน่ง')
                return false;
            }
            // ผ่าน
            else {
                let $me = $(this)

                $me.attr('disabled', true)

                let formData = new FormData($formEditEmployee[0])

                formData.append('content', $formEditEmployee.find('.ql-editor').html())

                $.ajax({
                    type: "POST",
                    url: '/employee/updateEmployee',
                    data: formData,
                    processData: false,
                    contentType: false,
                }).done(function (res) {

                    if (res.success = 1) {

                        Swal.fire({
                            text: "แก้ไข พนักงาน สำเร็จ",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "ตกลง",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                setTimeout(function () {
                                    window.location = '/employee/index'
                                }, 1 * 1500)
                            }
                        })

                        setTimeout(function () {
                            window.location = '/employee/index'
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

    //btnDeleteEmployee alert
    $('body').on('click', '.btnDeleteEmployee', function () {
        var Employee_id = $(this).attr('data-id');

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
                    url: '/employee/deleteEmployee/' + Employee_id,
                    method: 'get',
                    success: function (response) {
                        Swal.fire(
                            'ลบสำเร็จ',
                            response.message,
                            'success'

                        )
                        setTimeout(function () {
                            window.location = '/employee/index'
                        }, 1 * 1500)
                    }
                });
            }
        })
    });
    
    $(".tableEmployee").DataTable({
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
                'className': 'text-center',
                "targets": [1],
            },
            {
                'className': 'text-left',
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
            {
                'className': 'text-center',
                "targets": [5],
            },
            {
                'className': 'text-center',
                "targets": [6],
            },
            {
                'className': 'text-center',
                "targets": [7],
            }
        ]
    });
    $(".toggle-password").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
});
