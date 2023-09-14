var isOnline;
var table_code;
var table_order_table;
var itemsArrayMoveTableOffline = [];
var itemsArrayCancelOrderTableOffline = [];
var itemsArrayOrderTableListOffline = [];
(function ($) {
  $("#order_select_detail").slideUp();
  $("#addOrderCusBtn").addClass("disable-click");
  $("#move_order_btn").addClass("disable-click");
  $("#void_order_btn").addClass("disable-click");
  $("#discount_order_btn").addClass("disable-click");
  $("#split_order_btn").addClass("disable-click");
  selectArea();
  interact(".resize-drag")
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

        clear_detail_summary();
      } else {
        $("#addOrderCusBtn").addClass("disable-click");
        $("#move_order_btn").removeClass("disable-click");
        $("#void_order_btn").removeClass("disable-click");
        $("#discount_order_btn").addClass("disable-click");
        $("#split_order_btn").addClass("disable-click");
        detail_summary(target.getAttribute("data-code"));
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
                'px; background-color: #E0E0DE;" ><p id="Action" style="pointer-events:none;">' +
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
        data: areaorderTemp
      }
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
          return "<font>" + data["order_customer_ordername"] + "</font>";
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
          return "<font>" + price_sum + "</font>";
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
