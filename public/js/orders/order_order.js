var isOnline;
var table_code;
var table_order_table;
var table_array_code;
var itemsArrayMoveTableOffline = [];
var itemsArrayDiscountOffline = [];
var itemsArrayCancelOrderTableOffline = []; 
var itemsArrayOrderTableListOffline = [];
var itemsArrayPaymentOffline = [];
var price_sum_total_payment = 0;
(function ($) {
  $("#order_select_detail").slideUp();
  $("#addOrderCusBtn").addClass("disable-click");
  $("#move_order_btn").addClass("disable-click");
  $("#void_order_btn").addClass("disable-click");
  $("#discount_order_btn").addClass("disable-click");
  $("#split_order_btn").addClass("disable-click");
  $("#parmentButtonId").hide();
  selectArea();
  interact(".resize-drag,.resize-drag-b")
    .on("tap", function (event) {
      var target = event.target;
      //   console.log(target.getAttribute("data-area"));
      $("#table_header_name").html(
        "<h3 class='m-0' id='table_header_name'>" +
          target.getAttribute("data-name") +
          "</h3>"
      );
      $("#table_header_name_detail").html(
        "<p>" + target.getAttribute("data-name") + "</p>"
      );
      table_code = target.getAttribute("data-code");

      if (target.getAttribute("data-use") !== "USE") {
        $("#addOrderCusBtn").removeClass("disable-click");
        $("#move_order_btn").addClass("disable-click");
        $("#void_order_btn").addClass("disable-click");
        $("#discount_order_btn").addClass("disable-click");
        $("#parmentButtonId").hide();

        clear_detail_summary();
      } else {
        $("#addOrderCusBtn").removeClass("disable-click");
        $("#move_order_btn").removeClass("disable-click");
        $("#void_order_btn").removeClass("disable-click");
        $("#discount_order_btn").removeClass("disable-click");
        $("#split_order_btn").addClass("disable-click");
        detail_summary(target.getAttribute("data-code"));
        $("#parmentButtonId").show();
      }

      event.preventDefault();
    })
    .resizable({
      // resize from all edges and corners
      edges: { left: false, right: false, bottom: false, top: false },

      listeners: {
        move(event) {
          // console.log(event.target);
          var target = event.target;
          var x = parseFloat(target.getAttribute("data-x")) || 0;
          var y = parseFloat(target.getAttribute("data-y")) || 0;

          // update the element's style
          target.style.width = event.rect.width + "px";
          target.style.height = event.rect.height + "px";

          // translate when resizing from top or left edges
          x += event.deltaRect.left;
          y += event.deltaRect.top;

          target.style.webkitTransform = target.style.transform =
            "translate(" + x + "px," + y + "px)";

          target.setAttribute("data-x", x);
          target.setAttribute("data-y", y);
          // console.log(
          //   " h --->" +
          //     Math.round(event.rect.width) +
          //     " h->" +
          //     Math.round(event.rect.height)
          // );
          //target.textContent = Math.round(event.rect.width) + '\u00D7' + Math.round(event.rect.height)
        },
      },
      modifiers: [
        // keep the edges inside the parent
        interact.modifiers.restrictEdges({
          outer: "parent",
        }),

        // minimum size
        interact.modifiers.restrictSize({
          min: { width: 100, height: 50 },
        }),
      ],

      inertia: true,
    })
    .draggable(false);
})(jQuery);

function selectArea() {
  $.ajax({
    url: serverUrl + "/order/areaData",
    method: "get",
    success: function (response) {
      //init order select
      // var area_select = $("#area_select");
      // area_select.html('<option value="">เลือกพื้นที่</option>');
      // $.each(response.data, function (index, item) {
      //   area_select.append(
      //     $('<option style="color: #000;"></option>')
      //       .val(item.area_code + "###" + item.area_name)
      //       .html(item.area_name)
      //   );
      // });
      // $("#area_select").niceSelect("destroy");
      // area_select.niceSelect();
      let btn_area = "";
      $.each(response.data, function (index, item) {
        btn_area +=
          ' <button type="button" class="btn btn-outline-primary" id="' +
          item.area_code +
          "###" +
          item.area_name +
          '" onclick="drowTableLoad(this.id)">' +
          item.area_name +
          "</button>";
        $("#btn_area").html(btn_area);
      });

      //select move
      var area_move = $("#area_move");
      area_move.html('<option value="">เลือกพื้นที่</option>');
      $.each(response.data, function (index, item) {
        area_move.append(
          $('<option style="color: #000;"></option>')
            .val(item.area_code + "###" + item.area_name)
            .html(item.area_name)
        );
      });
    },
  });
}

var area_select = $("#area_select");
area_select.on("change", function () {
  let value = $("#area_select").val();
  if (value != "") {
    $("#table_header_name").html("");
    $("#table_header_name_detail").html("");
    drowTableLoad(value);
    $("#order_select_detail").slideDown();
  } else {
    $("#canvaHolder").html("");
    $("#table_header_name").html("");
    $("#table_header_name_detail").html("");
    $("#order_select_detail").slideUp();
    $("#addOrderCusBtn").addClass("disable-click");
  }
});

var area_move = $("#area_move");
area_move.on("change", function () {
  $.ajax({
    url: serverUrl + "/order/getTableByArea/" + $("#area_move").val(),
    method: "get",
    success: function (response) {
      var table_move = $("#table_move");
      table_move.html('<option value="">เลือกโต๊ะ</option>');
      $.each(response.data, function (index, item) {
        table_move.append(
          $('<option style="color: #000;"></option>')
            .val(item.table_code + "###" + item.table_name)
            .html(item.table_name)
        );
      });
    },
  });
});

function drowTableLoad(data) {
  if (data != "") {
    $("#table_header_name").html("");
    $("#table_header_name_detail").html("");
    $("#order_select_detail").slideDown();
  } else {
    $("#canvaHolder").html("");
    $("#table_header_name").html("");
    $("#table_header_name_detail").html("");
    $("#order_select_detail").slideUp();
    $("#addOrderCusBtn").addClass("disable-click");
  }
  // interact.removeDocument(document);
  var str_split = data;
  var str_split_result = str_split.split("###");
  var area_code = str_split_result[0];

  table_array_code = area_code;
  isOnline = window.navigator.onLine;

  if (isOnline) {
    $.ajax({
      url: serverUrl + "/order/getTableInArea/" + area_code,
      method: "get",
      success: function (response) {
        $("#canvaHolder").html("");
        var dataTable = response.data;

        for (var i = 0; i < dataTable.length; i++) {
          if (dataTable[i].table_status == "USE") {
            $(".canva").append(
              '<div class="resize-drag-b' +
                (dataTable[i].rounded === "yes" ? " circle" : "") +
                '" id="' +
                dataTable[i].div_id +
                '" data-rounded="' +
                dataTable[i].rounded +
                '" data-name="' +
                dataTable[i].table_name +
                '" data-size="' +
                dataTable[i].size_table +
                '"  data-x="' +
                dataTable[i].x +
                '" data-y="' +
                dataTable[i].y +
                '" data-area="' +
                dataTable[i].area_code +
                '" data-code="' +
                dataTable[i].table_code +
                '" data-use="' +
                dataTable[i].table_status +
                '" style="transform: translate(' +
                dataTable[i].x +
                "px, " +
                dataTable[i].y +
                "px); width: " +
                dataTable[i].width_div +
                "px; height: " +
                dataTable[i].hight_div +
                'px;"  ><p id="Action" style="pointer-events:none;">' +
                dataTable[i].table_name +
                " (ไม่ว่าง)</p><span  style='opacity: 0.7;pointer-events:none;'>" +
                dataTable[i].size_table +
                " ที่นั่ง" +
                "</span></div>"
            );
          } else {
            $(".canva").append(
              '<div class="resize-drag' +
                (dataTable[i].rounded === "yes" ? " circle" : "") +
                '" id="' +
                dataTable[i].div_id +
                '" data-rounded="' +
                dataTable[i].rounded +
                '" data-name="' +
                dataTable[i].table_name +
                '" data-size="' +
                dataTable[i].size_table +
                '"  data-x="' +
                dataTable[i].x +
                '" data-y="' +
                dataTable[i].y +
                '" data-area="' +
                dataTable[i].area_code +
                '" data-code="' +
                dataTable[i].table_code +
                '" data-use="' +
                dataTable[i].table_status +
                '" style="transform: translate(' +
                dataTable[i].x +
                "px, " +
                dataTable[i].y +
                "px); width: " +
                dataTable[i].width_div +
                "px; height: " +
                dataTable[i].hight_div +
                'px;" ><p id="Action" style="pointer-events:none;">' +
                dataTable[i].table_name +
                "</p><span  style='opacity: 0.7; pointer-events:none;'>" +
                dataTable[i].size_table +
                " ที่นั่ง" +
                "</span></div>"
            );
          }
        }
      },
    });
  } else {
  }
}

function loadTable() {
  $("#orderListInTable").DataTable();
}

function openModalServiceType() {
  $(".bd-add-service").modal("show");
}

function closeModalService() {
  $(".bd-add-service").modal("hide");
  $("#addService")[0].reset();
  $("#addService").parsley().reset();
}

function openModaldiscountAllType() {
  $(".bd-add-discountAll").modal("show");
}

function closeModaladddiscountAll() {
  $(".bd-add-discountAll").modal("hide");
  $("#adddiscountAll")[0].reset();
  $("#adddiscountAll").parsley().reset();
}

function openModalCardCharge() {
  $(".bd-add-cardCharge").modal("show");
}

function closeModalcardCharge() {
  $(".bd-add-cardCharge").modal("hide");
  $("#addcardCharge")[0].reset();
  $("#addcardCharge").parsley().reset();
}

function openModalVat() {
  $(".bd-add-vat").modal("show");
}

function closeModalVAT() {
  $(".bd-add-vat").modal("hide");
  $("#addvat")[0].reset();
  $("#addvat").parsley().reset();
}

function openAddOrder_customer() {
  const STOCK_ORDER_LIST = {
    init() {
      let url = `${serverUrl}order/order_list_customer/` + table_code;
      window.open(
        url,
        "Doc",
        "menubar=no,toorlbar=no,location=no,scrollbars=yes, status=no,resizable=no,width=1500,height=800,top=10,left=10"
      );
    },
  };

  STOCK_ORDER_LIST.init();
}

function detail_summary(table_code) {
  $.ajax({
    url: serverUrl + "/order/getSummaryData/" + table_code,
    method: "get",
    success: function (response) {
      let sub_total =
        parseFloat(response.data.order_price_sum) -
        parseFloat(response.data.order_card_charge) -
        parseFloat(response.data.order_vat) -
        parseFloat(response.data.order_service) +
        parseFloat(response.data.order_discount);

      $("#table_pcs").html(
        '<p id="table_pcs">' + response.data.order_pcs_sum + " รายการ</p>"
      );
      $("#time_table").html(
        '<p id="time_table">' + response.data.order_time + "</p>"
      );
      $("#price_sum_table").html(
        '<strong id="price_sum_table">' +
          response.data.order_price_sum +
          " บาท</strong>"
      );

      $("#service_total_").html(
        '<p id="service_total_">' + response.data.order_service + "</p>"
      );
      $("#discount_total_").html(
        '<p id="discount_total_">' + response.data.order_discount + "</p>"
      );
      $("#card_charge_total_").html(
        '<p id="card_charge_total_">' + response.data.order_card_charge + "</p>"
      );
      $("#vat_total_").html(
        '<p id="vat_total_">' + response.data.order_vat + "</p>"
      );
      $("#sub_total_").html(
        '<p id="sub_total_">' +
          sub_total.toLocaleString(undefined, { minimumFractionDigits: 2 }) +
          "</p>"
      );

      $("#sub_total_").html(
        '<p id="sub_total_">' +
          sub_total.toLocaleString(undefined, { minimumFractionDigits: 2 }) +
          "</p>"
      );

      $("#order_customer_code_hide").val(response.data.order_customer_code);

      listOrder(table_code);
    },
  });
}

function clear_detail_summary() {
  $("#table_pcs").html('<p id="table_pcs">' + "XXX" + " รายการ</p>");
  $("#time_table").html('<p id="time_table">' + "XXX" + "</p>");
  $("#price_sum_table").html(
    '<strong id="price_sum_table">' + "0.00" + " บาท</strong>"
  );

  $("#service_total_").html('<p id="service_total_">' + "0.00" + "</p>");
  $("#discount_total_").html('<p id="discount_total_">' + "0.00" + "</p>");
  $("#card_charge_total_").html(
    '<p id="card_charge_total_">' + "0.00" + "</p>"
  );
  $("#vat_total_").html('<p id="vat_total_">' + "0.00" + "</p>");
  $("#sub_total_").html('<p id="sub_total_">' + "0.00" + "</p>");
  $("#orderListInTable").DataTable().clear().destroy();
}

function open_move_order_() {
  $(".bd-move-table").modal("show");
}

function close_move_table() {
  $(".bd-move-table").modal("hide");
  $("#move_table")[0].reset();
  $("#move_table").parsley().reset();
  // $("#addOrderCusBtn").addClass("disable-click");
}

$("#move_table").submit(function (e) {
  e.preventDefault();
  public_array_move_table = [];

  var str_split = $("#table_move").val();
  var str_split_result = str_split.split("###");
  var tabal_code_new = str_split_result[0];

  arr_table = [
    {
      old_table: table_code,
      new_table: tabal_code_new,
    },
  ];

  var table_move = $("#table_move").parsley();

  if (table_move.isValid()) {
    if (isOnline) {
      itemsArrayMoveTableOffline.push(arr_table);
      localStorage.setItem(
        "tableMove",
        JSON.stringify(itemsArrayMoveTableOffline)
      );

      areaMoveTemp = JSON.parse(localStorage.tableMove);
      $.ajax({
        url: serverUrl + "order/updateMoveTable",
        method: "post",
        data: {
          data: areaMoveTemp,
        },
        cache: false,
        success: function (response) {
          if ((response.message = "ย้ายโต๊ะสำเร็จ")) {
            localStorage.removeItem("tableMove");
            areaMoveTemp = [];
            itemsArrayMoveTableOffline = [];
            notif({
              type: "success",
              msg: "ย้ายโต๊ะสำเร็จ!",
              position: "right",
              fade: true,
              time: 300,
            });
            $(".bd-move-table").modal("hide");
            $("#move_table")[0].reset();
            $("#move_table").parsley().reset();
            selectArea();
            $("#canvaHolder").html("");
            $("#table_header_name").html("");
            $("#table_header_name_detail").html("");
            $("#order_select_detail").slideUp();
            $("#addOrderCusBtn").addClass("disable-click");
          } else {
          }
        },
      });
    } else {
    }
  } else {
    table_move.validate();
  }
});

function voidItem() {
  Swal.fire({
    title: "ยกเลิก Order",
    text: "คุณต้องยกเลิก Order โต๊ะนี้ !",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "ปิด",
    confirmButtonText: "ตกลง",
  }).then((result) => {
    if (result.isConfirmed) {
      arr_cancel = [
        {
          code_table: table_code,
        },
      ];
      itemsArrayCancelOrderTableOffline.push(arr_cancel);
      localStorage.setItem(
        "tableCancel",
        JSON.stringify(itemsArrayCancelOrderTableOffline)
      );

      areaCancelTemp = JSON.parse(localStorage.tableCancel);

      if (isOnline) {
        $.ajax({
          url: serverUrl + "order/updateVoidOrderTable",
          method: "post",
          data: {
            data: areaCancelTemp,
          },
          cache: false,
          success: function (response) {
            if ((response.message = "ยกเลิกรายการสำเร็จ")) {
              localStorage.removeItem("tableCancel");
              areaCancelTemp = [];
              itemsArrayCancelOrderTableOffline = [];
              notif({
                type: "success",
                msg: "ยกเลิกรายการสำเร็จ!",
                position: "right",
                fade: true,
                time: 300,
              });

              selectArea();
              detail_summary(table_code);
              $("#canvaHolder").html("");
              $("#order_select_detail").slideUp();
              $("#void_order_btn").addClass("disable-click");
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

function listOrder(tableCode) {
  arr_table_order = [
    {
      code_table: tableCode,
    },
  ];
  itemsArrayOrderTableListOffline.push(arr_table_order);
  localStorage.setItem(
    "tableOrdeList",
    JSON.stringify(itemsArrayOrderTableListOffline)
  );

  areaorderTemp = JSON.parse(localStorage.tableOrdeList);

  $("#orderListInTable").DataTable().clear().destroy();
  table_order_table = $("#orderListInTable").DataTable({
    order: [],
    // serverSide: true,
    ajax: {
      url: serverUrl + "order/loadTableOrderList",
      type: "POST",
      data: {
        data: areaorderTemp,
      },
    },
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
            '<p style="font-size: 13px;">' +
            data["order_des"] +
            "</p>" +
            "</div>" +
            '<div class="header_more_tool">' +
            '<div class="dropdown">' +
            '<span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">' +
            '<i class="ti-more-alt"></i>' +
            "</span>" +
            '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="">' +
            '<a class="dropdown-item" href="javascript:void(0);" onclick="openSplitOrder(' +
            data["id"] +
            ');">' +
            '<i class="ti-split-v"></i> Split Order</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";
          return dataRe;
        },
      },
      {
        data: "order_customer_pcs",
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

  localStorage.removeItem("tableOrdeList");
  areaorderTemp = [];
  itemsArrayOrderTableListOffline = [];
}

setInterval(function () {
  var isCallNewOrder = localStorage.getItem("isCallNewOrder");
  if (isCallNewOrder == "yes") {
    detail_summary(table_code);
    drowTableLoad(table_array_code);
    localStorage.setItem("isCallNewOrder", "no");
  }
}, 500);

function openModaldiscountAllType_() {
  $(".bd-add-discountAll").modal("show");
}

function closeModaladddiscountAll_() {
  $(".bd-add-discountAll").modal("hide");
  $("#adddiscountAll_")[0].reset();
  $("#adddiscountAll_").parsley().reset();
  // $("#discount_order_btn").addClass("disable-click");
}

$("#adddiscountAll_").submit(function (e) {
  e.preventDefault();
  // console.log(table_code);
  public_array_discount = [];
  var type_discount = $("#adddiscountAll_type").parsley();
  var num_discount = $("#num_adddiscountAll").parsley();

  if (type_discount.isValid() && num_discount.isValid()) {
    arr_discount = [
      {
        table_discount: table_code,
        type_discount: $("#adddiscountAll_type").val(),
        num_discount: $("#num_adddiscountAll").val(),
      },
    ];

    if (isOnline) {
      itemsArrayDiscountOffline.push(arr_discount);
      localStorage.setItem(
        "discount",
        JSON.stringify(itemsArrayDiscountOffline)
      );

      arrDiscountTemp = JSON.parse(localStorage.discount);

      $.ajax({
        url: serverUrl + "order/updateDiscount",
        method: "post",
        data: {
          data: arrDiscountTemp,
        },
        cache: false,
        success: function (response) {
          if ((response.message = "เพิ่มส่วนลดสำเร็จ")) {
            localStorage.removeItem("discount");
            areaMoveTemp = [];
            itemsArrayDiscountOffline = [];
            notif({
              type: "success",
              msg: "เพิ่มส่วนลดสำเร็จ!",
              position: "right",
              fade: true,
              time: 300,
            });
            closeModaladddiscountAll_();
            detail_summary(table_code);
          } else {
          }
        },
      });
    } else {
    }
  } else {
    type_discount.validate();
    num_discount.validate();
  }
});

function printPreview() {
  let arr_table_bill = [
    {
      table_discount: table_code,
    },
  ];

  if (isOnline) {
    print_specific_content();
  } else {
  }
}

function print_specific_content() {
  var content = "Printed using Ahmed El-Essawy Code";

  var win = window.open(
    "",
    "",
    "left=0,top=0,width=800,height=800,toolbar=0,scrollbars=0,status =0"
  );
  win.document.write(
    '<html><body onload="window.print(); window.close();">' +
      content +
      "</body></html>"
  );
  win.document.close();
}

function openSplitOrder(id) {
  $(".bd-split-pcs").modal("show");
}

function closeModalsplit() {
  $(".bd-split-pcs").modal("hide");
  $("#split-pcs")[0].reset();
  $("#split-pcs").parsley().reset();
}

$("#split-pcs").submit(function (e) {
  e.preventDefault();
});

function paymentTable() {
  $(".bd-payment").modal("show");

  $.ajax({
    url: serverUrl + "/order/getSummaryData/" + table_code,
    method: "get",
    success: function (response) {
      $("#bill_model_total").html(
        '<h3 class="f_s_25 f_w_700 dark_text mr_30">Total: ' +
          response.data.order_price_sum +
          "</h3>"
      );
      price_sum_total_payment = parseInt(response.data.order_price_sum);
    },
  });

  $.ajax({
    url: serverUrl + "/order/getTypePlayMent",
    method: "get",
    success: function (response) {
      var cash_type = $("#cash_type");
      cash_type.html('<option value="">เลือกประเภทการชำระ</option>');
      $.each(response.data, function (index, item) {
        cash_type.append(
          $('<option style="color: #000;"></option>')
            .val(item.id + "###" + item.type)
            .html(item.type)
        );
      });
    },
  });
}

function closePayment() {
  $(".bd-payment").modal("hide");
  $("#payment-form")[0].reset();
  $("#payment-form").parsley().reset();
}

$("#payment-form").submit(function (e) {
  e.preventDefault();

  public_array_payment = [];

  var str_split = $("#cash_type").val();
  var str_split_result = str_split.split("###");
  var cash_type_id = str_split_result[0];
  var cash_type_val = str_split_result[1];

  var cash_type = $("#cash_type").parsley();
  var num_price_payment = $("#num_price_payment").parsley();

  var num_price_payment_int = $("#num_price_payment").val();

  var receive_total,
    change_total = 0;

  if (cash_type.isValid() && num_price_payment.isValid()) {
    if (num_price_payment_int < price_sum_total_payment) {
      notif({
        type: "warning",
        msg: "กรุณาจ่ายเงินให้มากกว่าราคารวม !",
        position: "right",
        fade: true,
        time: 300,
      });
    } else {
      receive_total = num_price_payment_int;
      change_total = num_price_payment_int - price_sum_total_payment;
      arr_payment = [
        {
          table_code: table_code,
          order_customer_code: $("#order_customer_code_hide").val(),
          cash_type: cash_type_val,
          receive_total: receive_total,
          change_total: change_total,
          note: $("#note_payment").val()
        },
      ];

      if (isOnline) {
        itemsArrayPaymentOffline.push(arr_payment);
        localStorage.setItem(
          "payment",
          JSON.stringify(itemsArrayPaymentOffline)
        );

        arrPaymentTemp = JSON.parse(localStorage.payment);

        $.ajax({
          url: serverUrl + "order/paymentStore",
          method: "post",
          data: {
            data: arrPaymentTemp,
          },
          cache: false,
          success: function (response) {
            if ((response.message = "จ่ายสำเร็จ")) {
              localStorage.removeItem("payment");
              arrPaymentTemp = [];
              itemsArrayPaymentOffline = [];
              notif({
                type: "success",
                msg: "จ่ายสำเร็จ!",
                position: "right",
                fade: true,
                time: 300,
              });
              closePayment();
              clear_detail_summary();
              drowTableLoad(table_array_code);
              $("#parmentButtonId").hide();
            } else {
            }
          },
        });
      } else {
        //wailt offline
      }
    }
  } else {
    cash_type.validate();
    num_price_payment.validate();
  }
});
