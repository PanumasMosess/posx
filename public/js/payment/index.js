$(document).ready(function () {

    // $('#datepicker').on('focus', function () {
    //     flatpickr(this, {
    //         // ตัวอย่าง: ให้ datepicker แสดงด้านบนของ modal
    //         position: 'below center',
    //         dateFormat: "Y/m/d",
    //         enableTime: false,
    //         defaultDate: new Date(),
    //     });
    // });

    flatpickr("#datepicker_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: new Date().getHours(),    // ตั้งค่าชั่วโมงเริ่มต้นเป็นเวลาปัจจุบัน
        defaultMinute: new Date().getMinutes(), // ตั้งค่านาทีเริ่มต้นเป็นเวลาปัจจุบัน
        position: "below center"
    });
});

function updatePrice() {
    var selectElement = document.getElementById('months');
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var price = selectedOption.getAttribute('data-price');
    
    // อัปเดตค่าใน input ของยอดเงิน
    document.getElementById('amount').value = price;
}

window.onload = function() {
    updatePrice(); // เรียกฟังก์ชันเพื่อให้ช่องยอดเงินแสดงผลตามค่าเริ่มต้น
};

$('body').on('click', '#AddPayment', function () {

    var date = new Date();
    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    let hour = date.getHours();
    let Minute = date.getMinutes();
    let PaymentDate = year + "/" + month + "/" + day;
    let PaymentTime = hour + ":" + Minute;

    var datepicker = document.querySelector("#datepicker");
    var datepicker_time = document.querySelector("#datepicker_time");

    if (datepicker.value == '') {
        var payment_date = PaymentDate;
    } else {
        var payment_date = datepicker.value;
    }

    if (datepicker_time.value == '') {
        var payment_time = PaymentTime;
    } else {
        var payment_time = datepicker_time.value;
    }

    var payment_type = document.querySelector("#payment_type");
    var months = document.querySelector("#months");
    var amount = document.querySelector("#amount");
    // var datepicker = document.querySelector("#datepicker");
    // var datepicker_time = document.querySelector("#datepicker_time");
    var bank = document.querySelector("#bank");
    var transfer_money = document.querySelector("#transfer_money");
    var remark = document.querySelector("#remark");
    var payment_type = payment_type.value;
    var months = months.value;
    var amount = amount.value;
    // var datepicker = datepicker.value;
    // var datepicker_time = datepicker_time.value;
    var bank = bank.value;
    var transfer_money = transfer_money.value;
    var remark = remark.value;

    $.ajax({
        type: "POST",
        url: "/payment/addPayment", // Replace with the actual URL
        data: { 
            payment_type: payment_type,
            months: months,
            amount: amount, 
            payment_date: payment_date, 
            payment_time: payment_time, 
            bank: bank, 
            transfer_money: transfer_money, 
            remark: remark
        },
    }).done(function (res) {
        //กรณี: บันทึกสำเร็จ
        if (res.success = 1) {

            Swal.fire({
                text: "เพิ่ม Payment สำเร็จ",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "ตกลง",
                timer: "1000",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    setTimeout(function () {
                        window.location = '/dashboard'
                    }, 1 * 1500)
                }
            })
            setTimeout(function () {
                window.location = '/dashboard'
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
});