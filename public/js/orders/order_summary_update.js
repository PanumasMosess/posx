var isOnline;
var tableUpdate;
var array_update;
(function ($) {
  isOnline = window.navigator.onLine;
  loadTableUpdate();
})(jQuery);

function loadTableUpdate() {
  isOnline = window.navigator.onLine;
  array_update = JSON.parse(localStorage.summary_update);

  $("#tableUpdate").DataTable().clear().destroy();
  tableUpdate = $("#tableUpdate").DataTable({
    order: [],
    // serverSide: true,
    // ajax: {
    //   url: serverUrl + "order/loadTableOrderList",
    //   type: "POST",
    //   data: {
    //     data: areaorderTemp,
    //   },
    // },
    data: array_update,
    // data: array_select_confirm,
    columns: [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        },
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          // "<font>" + data["order_customer_ordername"] + "</font>";
          let data_order_name = data["order_customer_ordername"];
          dataRe =
            '<div class="box_header m-0"><div class="main-title">' +
            data_order_name +
            "</div>" +
            "</div>";
          return dataRe;
        },
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          let values_pcs = 1;
          if (data["order_customer_pcs"] != 0) {
            values_pcs = data["order_customer_pcs"];
            // onkeyup='calpcsAndprice()'  oninput='calpcsAndprice()'
          }
          return (
            "<div class='input-group'>" +
            "<input type='number' class='form-control form-control-sm' pattern='/^-?d+.?d*$/' value='" +
            values_pcs +
            "' onKeyPress='if(this.value.length==10) return false;' oninput='updatePcsSummary(this);' id='" +
            data["id_order"] +
            "###" +
            data["order_customer_code"] +
            "###" +
            data["order_customer_pcs"] +
            "###" +
            data["order_price"] +
            "' name='pcs_summary_update' placeholder='กรอกจำนวน' required>" +
            "</div>"
          );
        },
      },
      {
        orderable: false,
        data: null,
        render: function (data, type, row, meta) {
          let price_sum = data["order_customer_pcs"] * data["order_price"];
          return (
            "<font>" +
            price_sum.toLocaleString(undefined, { minimumFractionDigits: 2 }) +
            "</font>"
          );
        },
      },
      {
        orderable: false,
        data: null,
        render: function (data, type, row, meta) {
          let price_sum = data["order_customer_pcs"] * data["order_price"];
          return (
            "<font>" +
            price_sum.toLocaleString(undefined, { minimumFractionDigits: 2 }) +
            "</font>"
          );
        },
      },
    ],
    columnDefs: [
      {
        targets: 0,
        className: "text-left",
      },
      {
        targets: 2,
        className: "text-center",
      },
      {
        targets: 3,
        className: "text-right",
      },
    ],
    responsive: true,
    searching: false,
    info: true,
  });
}

function updatePcsSummary(data) {
  isOnline = window.navigator.onLine;
  var str_split_result = data.id.split("###");
  var id_order = str_split_result[0];
  var customer_code = str_split_result[1];
  var old_pcs = str_split_result[2];
  var old_price = str_split_result[3];

  pcsTemp = [
    {
      id_order: id_order,
      pcs: data.value,
      old_pcs: old_pcs,
      customer_code: customer_code,
      price: old_price
    },
  ];

  // console.log(pcsTemp);

  if (isOnline) {
    console.log(pcsTemp);
    $.ajax({
      url: serverUrl + "order/updatePcsSummary",
      method: "post",
      data: {
        data: pcsTemp,
      },
      cache: false,
      success: function (response) {
        if (response.message = "แก้ไขสำเร็จ") {
        
          pcsTemp[0].old_pcs = data.value;
          localStorage.setItem("isCallNewOrder", "yes");
        } else {
        }
      },
    });
  } else {
  }
}
