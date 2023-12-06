$(document).ready(function () {

    information();

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

function closeModalEditPassword() {
    $("#EditPasswordCompanies").modal("hide");
    $("#editPasswordCompanies")[0].reset();
    $("#editPasswordCompanies").parsley().reset();
    $("#editPasswordCompanies .parsley-required").hide();
}

//When click add Email
$('body').on('click', '#EditInformation', function () {
    var shopname = document.querySelector("#shopname");
    var valueMoney = document.querySelector("#valueMoney");
    var service_charge = document.querySelector("#service_charge");
    var discount = document.querySelector("#discount");
    var discount_mode = document.querySelector("#discount_mode");
    var taxStatus = document.querySelector("#taxStatus");
    var taxId = document.querySelector("#taxId");
    var taxMode = document.querySelector("#taxMode");
    var taxRate = document.querySelector("#taxRate");
    var shopname = shopname.value;
    var valueMoney = valueMoney.value;
    var service_charge = service_charge.value;
    var discount = discount.value;
    var discount_mode = discount_mode.value;
    var taxStatus = taxStatus.value;
    var taxId = taxId.value;
    var taxMode = taxMode.value;
    var taxRate = taxRate.value;
    $.ajax({
        type: "POST",
        url: "/setting/updateInformation", // Replace with the actual URL
        data: { 
            shopname: shopname,
            valueMoney: valueMoney,
            service_charge: service_charge, 
            discount: discount, 
            discount_mode: discount_mode, 
            taxStatus: taxStatus, 
            taxId: taxId, 
            taxMode: taxMode, 
            taxRate: taxRate
        },
    }).done(function (res) {
        //กรณี: บันทึกสำเร็จ
        if (res.success = 1) {

            Swal.fire({
                text: "แก้ไข Information สำเร็จ",
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

//When click add Email
$('body').on('click', '#AddEmail', function () {
    var emailInput = document.querySelector(".add-input");
    var email = emailInput.value;
    if (email.trim() !== "") {
        // console.log(email);
        $.ajax({
            type: "POST",
            url: "/setting/addEmail", // Replace with the actual URL
            data: { email: email },
            success: function (data) {
                if ($('.email-container').css('display') === 'none') {
                    $('.email-container').css('display', 'block'); // ถ้า email-container มี style display: none ให้ลบ style ออก
                }
                // console.log(data.EmailReportIdID.id);
                addEmail(data.EmailReportIdID.id);
            },
            error: function () {
                alert("An error occurred while adding the email.");
            }
        });
    }
});

function removeEmail(emailElement) {
    var emailId = emailElement.getAttribute("data-id");
    // Send the email ID to the server using AJAX
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
                url: "/setting/deleteEmail", // Replace with the actual URL
                data: { id: emailId },
                success: function (response) {
                    // If the email was removed successfully, update the UI
                    Swal.fire(
                        'ลบสำเร็จ',
                        response.message,
                        'success'
                    );
                    var emailContainer = document.querySelector(".email-container");
                    emailContainer.removeChild(emailElement);

                    // Check if there are no more emails, then hide the email-container
                    if (emailContainer.children.length === 0) {
                        emailContainer.style.display = 'none';
                    }
                },
                error: function () {
                    alert("An error occurred while removing the email.");
                }
            });
        }
    });
}

function addEmail(id) {
    var emailInput = document.querySelector(".add-input");
    var email = emailInput.value;

    // Check if the email is not empty

    var emailContainer = document.querySelector(".email-container");
    var emailRow = document.createElement("div");
    emailRow.className = "email-row";
    emailRow.setAttribute("data-id", id);

    var emailText = document.createElement("p");
    emailText.className = "email";
    emailText.textContent = email;

    var removeButton = document.createElement("button");
    removeButton.className = "btn btn-danger f_s_14";
    removeButton.innerHTML = '<i class="fas fa-trash f_s_13 me-2"></i>Remove';
    removeButton.addEventListener("click", function () {
        removeEmail(emailRow);
    });

    emailRow.appendChild(emailText);
    emailRow.appendChild(removeButton);

    emailContainer.appendChild(emailRow);

    // Clear the input
    emailInput.value = "";
}

//modalEditPassword
let $ModalEdit = $("#EditPasswordCompanies")
let $formEditPassword = $ModalEdit.find('form')

$formEditPassword
    // บันทึกข้อมูล
    .on('click', '.btnEditPasswordCompanies', function (e) {
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

            $me.attr('disabled', false)

            let formData = new FormData($formEditPassword[0])

            formData.append('content', $formEditPassword.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: '/setting/updatePasswordCompanies',
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
                        timer: "1000",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {
                        }
                    })
                    $("#EditPasswordCompanies").modal("hide");
                    $("#editPasswordCompanies")[0].reset();
                    $("#editPasswordCompanies").parsley().reset();
                    $("#editPasswordCompanies .parsley-required").hide();
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

function information() {
    $.ajax({
        url: '/setting/information',
        type: "GET",
        dataType: 'json',
        success: function (res) {
            $("#shopname").val(res.data.shopname);
            $("#valueMoney").val(res.data.valueMoney);
            $("#service_charge").val(res.data.service_charge);
            $("#discount").val(res.data.discount);
            $("#discount_mode").val(res.data.discount_mode);
            $("#taxStatus").val(res.data.taxstatus);
            $("#taxId").val(res.data.taxid);
            $("#taxMode").val(res.data.taxmode);
            $("#taxRate").val(res.data.taxrate);
        },
    });
}