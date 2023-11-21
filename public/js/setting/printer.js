(function ($) {
  loadPrinterLocation();
})(jQuery);

function encodeImgtoBase64(element) {
  var img = element.files[0];
  var reader = new FileReader();
  reader.onloadend = function () {
    $("#file_setting_base64").val(reader.result);
  };
  reader.readAsDataURL(img);
}

function loadPrinterLocation() {
  $.ajax({
    url: serverUrl + "setting/printersetting",
    method: "get",
    success: function (response) {
      if (response.data != null) {
        $("#printer_order").val(response.data.printer_order);
        $("#printer_bill").val(response.data.printer_bill);
        $("#printer_order_sum").val(response.data.printer_order_summary);
        $("#id_printer").val(response.data.id);
      }
    },
  });
}

function printer_order() {
  $.ajax({
    url: serverUrl + "setting/printer",
    method: "post",
    data: {
      printer_order: $("#printer_order").val(),
      printer_summary_order: $("#printer_order_sum").val(),
      printer_bill: $("#printer_bill").val(),
      id: $("#id_printer").val(),
    },
    cache: false,
    success: function (response) {
      if ((response.message = "รายการสำเร็จ")) {
        notif({
          type: "success",
          msg: "รายการสำเร็จ!",
          position: "right",
          fade: true,
          time: 300,
        });
        loadPrinterLocation();
      } else {
        notif({
          type: "danger",
          msg: "เพิ่มไม่สำเร็จ",
          position: "right",
          fade: true,
          time: 300,
        });
      }
    },
  });
}

function printer_bill() {
  $.ajax({
    url: serverUrl + "setting/printer",
    method: "post",
    data: {
      printer_order: $("#printer_order").val(),
      printer_summary_order: $("#printer_order_sum").val(),
      printer_bill: $("#printer_bill").val(),
      printer_bill: $("#printer_bill").val(),
      id: $("#id_printer").val(),
    },
    cache: false,
    success: function (response) {
      if ((response.message = "รายการสำเร็จ")) {
        notif({
          type: "success",
          msg: "รายการสำเร็จ!",
          position: "right",
          fade: true,
          time: 300,
        });
        loadPrinterLocation();
      } else {
        notif({
          type: "danger",
          msg: "เพิ่มไม่สำเร็จ",
          position: "right",
          fade: true,
          time: 300,
        });
      }
    },
  });
}

function printer_order_sum() {
  $.ajax({
    url: serverUrl + "setting/printer",
    method: "post",
    data: {
      printer_order: $("#printer_order").val(),
      printer_summary_order: $("#printer_order_sum").val(),
      printer_bill: $("#printer_bill").val(),
      id: $("#id_printer").val(),
    },
    cache: false,
    success: function (response) {
      if ((response.message = "รายการสำเร็จ")) {
        notif({
          type: "success",
          msg: "รายการสำเร็จ!",
          position: "right",
          fade: true,
          time: 300,
        });
        loadPrinterLocation();
      } else {
        notif({
          type: "danger",
          msg: "เพิ่มไม่สำเร็จ",
          position: "right",
          fade: true,
          time: 300,
        });
      }
    },
  });
}

$("#addFileSetting").submit(function (e) {
  e.preventDefault();
  var file_setting = $("#file_setting").parsley();

  if (file_setting.isValid()) {

    arr_file = [
      {
        src_file_setting: $("#file_setting_base64").val(),
      },
    ];

    $.ajax({
      url: serverUrl + "setting/file_setting",
      method: "post",
      data: {
        data: arr_file,
      },
      cache: false,
      success: function (response) {
        if ((response.message = "เพิ่มรายการสำเร็จ")) {
          notif({
            type: "success",
            msg: "เพิ่มรายการสำเร็จ!",
            position: "right",
            fade: true,
            time: 300,
          });
          
        } else {
        }
      },
    });
  } else {
    file_setting.validate();
  }
});
