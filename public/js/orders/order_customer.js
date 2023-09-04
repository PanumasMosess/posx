var isOnline;
var searchParams_;
var array_select_confirm = [];
var orderCustomerStore = [];
var array_customer_order = [];
var table_order_customer;
var data_table_name;
(function ($) {
  let searchParams = window.location.pathname;
  searchParams_ = searchParams.split("/order/order_customer_list/");
  loadTableOrderCustomer();
  getTableByTableCode(searchParams_[1]);
  getOrderCard();
})(jQuery);

function loadTableOrderCustomer() {
  $("#orderListCustomerInTable").DataTable().clear().destroy();
  table_order_customer = $("#orderListCustomerInTable").DataTable({
    order: [],
    data: array_select_confirm,
    columns: [
      {
        orderable: false,
        data: null,
        render: function (data, type, row, meta) {
          let values_pcs = 1;
          if (data["order_pcs"] != 0) {
            values_pcs = data["order_pcs"];
            // onkeyup='calpcsAndprice()'  oninput='calpcsAndprice()'
          }
          return (
            "<div class='input-group'>" +
            "<input type='number' class='form-control form-control-sm' pattern='/^-?d+.?d*$/' value='" +
            values_pcs +
            "' onKeyPress='if(this.value.length==10) return false;'    id='pcs_cut' name='pcs_cut' placeholder='กรอกจำนวน' required>" +
            "</div>"
          );
        },
      },
      {
        data: "order_name",
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          let values_pcs = 1;
          if (data["order_pcs"] != 0) {
            values_pcs = data["order_pcs"];
          }
          return "<font>" + data["order_price"] + "</font>";
        },
      },
      {
        data: "total_price",
      },
      {
        orderable: false,
        data: null,
        render: function (data, type, row, meta) {
          return (
            "<a herf='javascript:void(0);' type='button' class='action_btn' onclick='deleteListSelecCustomertComfirm(this.id);' id='" +
            data["id"] +
            "' data-toggle='tooltip' data-placement='top' title='ลบ'><i class='fas fa-trash'></i></a>"
          );
        },
      },
    ],
    columnDefs: [
      {
        targets: 0,
        className: "text-center",
      },
      {
        targets: 2,
        className: "text-right",
      },
      {
        targets: 3,
        className: "text-center",
      },
    ],
    responsive: true,
    searching: false,
    info: true,
  });

  $("#orderListCustomerInTable tbody tr").on("keyup input", function (event) {
    let subtotal = 0;
    let product_price = 0;
    let product_qty = 0;

    product_price = table_order_customer.cell(this, 2).data();
    product_qty = $(table_order_customer.cell(this, 0).node())
      .find("input")
      .val();

    subtotal = parseFloat(product_price.order_price) * parseFloat(product_qty);

    table_order_customer.cell(this, 3).data(subtotal).draw();

    summaryText();
  });
}

function getTableByTableCode(tableCode) {
  isOnline = window.navigator.onLine;
  if (isOnline) {
    $.ajax({
      url: serverUrl + "/order/getTableDetalByCode/" + tableCode,
      method: "get",
      success: function (response) {
        data_table_name = response.data.table_code;
        $("#number_table_page_order").html(
          " <h4 class='header-title' id='number_table_page_order'>" +
            response.data.table_name +
            "</h4>"
        );
        $("#table_text").html("<font>" + response.data.table_name + "</font>");
      },
    });
  } else {
  }
}

function getOrderCard() {
  isOnline = window.navigator.onLine;
  var table_select_list = null;
  $("#orderListCustomerCard").DataTable().clear().destroy();
  if (isOnline) {
    table_select_list = $("#orderListCustomerCard").DataTable({
      dom:
        "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'<'float-md-end ms-2'B>f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      buttons: [
        {
          text: '<i class="fa fa-id-badge fa-fw" aria-hidden="true"></i>',
          action: function (e, dt, node) {
            $(dt.table().node()).toggleClass("cards");
            $(".fa", node).toggleClass(["fa-table", "fa-id-badge"]);
            dt.draw("page");
          },
          className: "btn btn-outline",
          attr: {
            title: "รูปแบบ Card",
          },
        },
      ],
      order: [],
      ajax: {
        type: "POST",
        url: serverUrl + "/order/getDetailCard",
        data: function (d) {
          return d;
        },
      },
      columns: [
        {
          orderable: false,
          data: null,
          className: "text-center",
          render: function (data, type, full, meta) {
            data =
              "<div class='card-body'><img src='" +
              serverUrl +
              "/uploads/temps_order/" +
              data["src_order_picture"] +
              "' width='100px' height='100px' style='border-radius: .40rem; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;'></div>";

            return data;
          },
        },
        {
          data: "order_name",
        },
        {
          data: "name",
        },
        {
          data: "order_price",
        },
      ],
      columnDefs: [
        {
          targets: 2,
          className: "text-left",
        },
      ],
      responsive: true,
      searching: true,
      paging: true,
      pagingType: "full_numbers",
      pageLength: 10,
      lengthMenu: [
        [10, 20, 50, 100, -1],
        [10, 20, 50, 100, "All"],
      ],
      // Processing indicator
      processing: true,
      // DataTables server-side processing mode
      serverSide: true,
      // Initial no order.
      drawCallback: function (settings) {
        var api = this.api();
        var $table = $(api.table().node());

        if ($table.hasClass("cards")) {
          // Create an array of labels containing all table headers
          var labels = [];
          $("thead th", $table).each(function () {
            labels.push($(this).text());
          });

          // Add data-label attribute to each cell
          $("tbody tr", $table).each(function () {
            $(this)
              .find("td")
              .each(function (column) {
                $(this).attr("data-label", labels[column]);
              });
          });

          var max = 0;
          $("tbody tr", $table)
            .each(function () {
              max = Math.max($(this).height(), max);
            })
            .height(max);
        } else {
          // Remove data-label attribute from each cell
          $("tbody td", $table).each(function () {
            $(this).removeAttr("data-label");
          });

          $("tbody tr", $table).each(function () {
            $(this).height("auto");
          });
        }
      },
    });

    $("#orderListCustomerCard tbody")
      .off("click")
      .on("click", "tr", function (e) {
        let data = table_select_list.row(this).data();
        data.total_price = "";
        arrar_select_function(data);
      });
  } else {
  }
}

function arrar_select_function(data) {
  updateArrayTable();
  if (array_select_confirm.length != 0) {
    let arr = [];
    arr = array_select_confirm.map((a) => a.id);

    if (arr.includes(data.id)) {
      // console.log(arr);
    } else {
      array_select_confirm.push(data);
    }
  } else {
    array_select_confirm.push(data);
  }

  loadTableOrderCustomer();
  summaryText();
}

function deleteListSelecCustomertComfirm(data) {
  for (var i = 0; i < array_select_confirm.length; i++) {
    if (array_select_confirm[i].id == data) {
      array_select_confirm[i].order_pcs = 1;
    }
  }
  array_select_confirm = array_select_confirm.filter(
    (item) => item.id !== data
  );

  loadTableOrderCustomer();
  summaryText();
}

function cancleAllTable() {
  array_select_confirm = [];
  loadTableOrderCustomer();
  getOrderCard();
  summaryText();
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

function orderConfirm() {
  //get data from table input
  let data = table_order_customer.$("input, text").serialize();
  let str_split = data.replace(/pcs_cut=/g, "");
  let pcs_number_order = str_split.split("&");

  let order_pcs_sum = 0,
    order_price = 0;
  object_customer_order_temp = {};

  for (var i = 0; i < array_select_confirm.length; i++) {
    (object_customer_order_temp = {
      order_code: array_select_confirm[i].order_code,
      order_customer_ordername: array_select_confirm[i].order_name,
      order_customer_price: array_select_confirm[i].order_price,
      order_customer_pcs: pcs_number_order[i],
      order_customer_table_code: data_table_name,
    }),
      (order_pcs_sum += parseInt(pcs_number_order[i]));
    order_price +=
      parseInt(array_select_confirm[i].order_price) *
      parseInt(pcs_number_order[i]);

    array_customer_order.push(object_customer_order_temp);
  }
}

function summaryText() {
  let order_pcs_sum = 0,
    order_price = 0,
    order_price_total = 0;
  let data = table_order_customer.$("input, text").serialize();
  let str_split = data.replace(/pcs_cut=/g, "");
  let pcs_number_order = str_split.split("&");

  for (var i = 0; i < array_select_confirm.length; i++) {
    order_pcs_sum += parseInt(pcs_number_order[i]);
    order_price +=
      parseInt(array_select_confirm[i].order_price) *
      parseInt(pcs_number_order[i]);
  }

  order_price_total = order_price;

  $("#sum_price").html(
    '<span id="sum_price">' +
      order_price.toLocaleString(undefined, { minimumFractionDigits: 2 }) +
      "</span>"
  );
  $("#item_count").html(
    '<div id="item_count">Item: ' + order_pcs_sum + "</div>"
  );

  $("#price_last_order").html(
    '<h4 class="header-title" id="price_last_order">Grand Total: ' +
      order_price_total +
      "</h4>"
  );
}

function updateArrayTable() {
  let data = table_order_customer.$("input, text").serialize();
  let str_split = data.replace(/pcs_cut=/g, "");
  let pcs_number_order = 0;
  pcs_number_order = str_split.split("&");

  for (var i = 0; i < array_select_confirm.length; i++) {
    array_select_confirm[i].order_pcs = pcs_number_order[i];
  }
}
