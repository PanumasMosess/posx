var isOnline;
var tableUpdate;
var array_update;
(function ($) {
  isOnline = window.navigator.onLine;
  array_update = JSON.parse(localStorage.summary_update);
  loadTableUpdate();
})(jQuery);

function loadTableUpdate() {
  isOnline = window.navigator.onLine;

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
            "<div class='input-group'><a href='javascript:void(0);' class='action_btn' id='minus' data-id='" +
            data["id_order"] +
            "###" +
            data["order_customer_code"] +
            "###" +
            data["order_customer_pcs"] +
            "###" +
            data["order_price"] +
            "'><i class='ti-minus' id='minus'  data-id='" +
            data["id_order"] +
            "###" +
            data["order_customer_code"] +
            "###" +
            data["order_customer_pcs"] +
            "###" +
            data["order_price"] +
            "'></i></a>" +
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
            "' name='pcs_summary_update' placeholder='กรอกจำนวน'  disable /> " +
            "<a href='javascript:void(0);' class='action_btn' id='plus'  data-id='" +
            data["id_order"] +
            "###" +
            data["order_customer_code"] +
            "###" +
            data["order_customer_pcs"] +
            "###" +
            data["order_price"] +
            "'><i class='ti-plus' id='plus'  data-id='" +
            data["id_order"] +
            "###" +
            data["order_customer_code"] +
            "###" +
            data["order_customer_pcs"] +
            "###" +
            data["order_price"] +
            "'></i></a></div>"
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
          return (
            "<a herf='javascript:void(0);' class='action_btn' data-toggle='tooltip' data-placement='top' id='" +
            data["id_order"] +
            "###" +
            data["order_customer_code"] +
            "' onclick='deleteListOrder(this.id)' title='ลบข้อมูล'><i class='ti-trash'></i></a>"
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
        width: "27%",
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

  $("#tableUpdate tbody tr").on("click", "a" ,function (event) {
    var id;
    id = event.target.id;

    let product_qty_ = 0;

    product_qty_ = $(tableUpdate.cell(0, 2).node()).find("input").val();

    if (id == "plus") {
      product_qty_++;
      $(tableUpdate.cell(0, 2).node()).find("input").val(product_qty_);
      data = {
        id : event.target.getAttribute("data-id"),
        value: product_qty_,
      }
      updatePcsSummary(data);
    } else {
      product_qty_--;
      $(tableUpdate.cell(0, 2).node()).find("input").val(product_qty_);
      data = {
        id : event.target.getAttribute("data-id"),
        value: product_qty_,
      }
      updatePcsSummary(data);
    }
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
      price: old_price,
    },
  ];

  // console.log(pcsTemp);

  if (isOnline) {
    $.ajax({
      url: serverUrl + "order/updatePcsSummary",
      method: "post",
      data: {
        data: pcsTemp,
      },
      cache: false,
      success: function (response) {
        if ((response.message = "แก้ไขสำเร็จ")) {
          for (var i = 0; i < array_update.length; i++) {
            if (array_update[i].id_order == id_order) {
              array_update[i].order_customer_pcs = data.value;
            }
          }
          loadTableUpdate();
          localStorage.setItem("isCallNewOrder", "yes");
        } else {
        }
      },
    });
  } else {
  }
}

function deleteListOrder(data) {
  var str_split_result = data.split("###");
  var id_order = str_split_result[0];
  var customer_code = str_split_result[1];

  tempArrDel = [
    {
      id_order: id_order,
      customer_code: customer_code,
    },
  ];

  Swal.fire({
    title: "ยกเลิก Order",
    text: "คุณต้องการยกเลิก Order!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "ปิด",
    confirmButtonText: "ตกลง",
  }).then((result) => {
    if (result.isConfirmed) {
      if (isOnline) {
        $.ajax({
          url: serverUrl + "order/delete_list_order_customer",
          method: "post",
          data: {
            data: tempArrDel,
          },
          cache: false,
          success: function (response) {
            if ((response.message = "ลบสำเร็จ")) {
              for (var i = 0; i < array_update.length; i++) {
                if (array_update[i].id_order == id_order) {
                  array_update.splice(i, 1);
                }
              }
              loadTableUpdate();
              localStorage.setItem("isCallNewOrder", "yes");
            } else {
            }
          },
        });
      } else {
      }
    } else {
    }
  });
}
