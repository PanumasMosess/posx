(function ($) {
  loadPrinterLocation();
})(jQuery);

function loadPrinterLocation() {
  $.ajax({
    url: serverUrl + "setting/printersetting",
    method: "get",
    success: function (response) {
      if (response.data != null) {
        $("#printer_order").val(response.data.printer_order);
        $("#printer_bill").val(response.data.printer_order_summary);
        $("#printer_order_sum").val(response.data.printer_bill);
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
