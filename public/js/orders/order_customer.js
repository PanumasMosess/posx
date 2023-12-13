var isOnline;
var searchParams_;
var array_select_confirm = [];
var orderCustomerStore = [];
var array_customer_order = [];
var table_order_customer;
var data_table_name;
var subtotal = 0;

var order_price_total = 0;

//service Val public
var service_type = "";
var service_number = 0;
var service_total = 0;
//discounr val public
var discount_type = "";
var discount_number = 0;
var discount_total = 0;
//charge val public
var card_charge_number = 0;
var card_charge_total = 0;
// vat val public
var vat_type = "";
var vat_number = 0;
var vat_total = 0;

(function ($) {
  let searchParams = window.location.pathname;
  searchParams_ = searchParams.split("/order/order_list_customer/");
  loadTableOrderCustomer();
  getTableByTableCode(searchParams_[1]);
  getOrderCard();
})(jQuery);

function deleteFilePdf(file_name) {
  $.ajax({
    url: `${serverUrl}/unlink_pdf/` + file_name,
    method: "get",
    success: function (res) {
      // การสำเร็จ
    },
    error: function (error) {
      // เกิดข้อผิดพลาด
    },
  });
}

function printPDF(file_name, printer) {
  qz.websocket
    .connect()
    .then(function () {
      return qz.printers.find(printer);
    })
    .then((found) => {
      var config = qz.configs.create(printer);
      var path = serverUrl + "uploads/temp_pdf/" + file_name;
      var data = [
        {
          type: "pixel",
          format: "pdf",
          flavor: "file",
          data: path,
        },
      ];
      return qz.print(config, data);
    })
    .then((event) => {
      return qz.websocket.disconnect();
    })
    .then((event) => {
      return deleteFilePdf(file_name);
    })
    .catch((e) => {
      console.log(e);
    });
}

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
            "<div class='input-group'> <a href='javascript:void(0);' class='action_btn' id='minus'><i class='ti-minus' id='minus'></i></a> " +
            "<input type='number' class='form-control form-control-sm' pattern='/^-?d+.?d*$/' value='" +
            values_pcs +
            "' onKeyPress='if(this.value.length==10) return false;'  id='pcs_cut' name='pcs_cut' placeholder='กรอกจำนวน' required>" +
            "<a href='javascript:void(0);' class='action_btn' id='plus'><i class='ti-plus' id='plus'></i> </a></div>"
          );
        },
      },
      {
        data: null,
        render: function (data, type, full, meta) {
          let data_order_name = data["order_name"];
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
            '<a class="dropdown-item" href="javascript:void(0);" onclick="openModalComment(' +
            data["id"] +
            ');">' +
            '<i class="ti-comment-alt"></i> Comment</a>' +
            '<a class="dropdown-item" href="javascript:void(0);" onclick="openModalDiscountByOrder(' +
            data["id"] +
            ');">' +
            '<i class="fas fa-hryvnia"></i> Discount</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";
          return dataRe;
        },
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
        width: "27%",
      },
      {
        targets: 2,
        className: "text-right",
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

    // summaryText();
    calService();
    calDiscountAll();
  });

  $("#orderListCustomerInTable tbody tr").on("click a", function (event) {
    var id;
    id = event.target.id;

    let subtotal_ = 0;
    let product_price_ = 0;
    let product_qty_ = 0;

    product_price_ = table_order_customer.cell(this, 2).data();
    product_qty_ = $(table_order_customer.cell(this, 0).node())
      .find("input")
      .val();

    if (id == "plus") {
      product_qty_++;
      $(table_order_customer.cell(this, 0).node())
        .find("input")
        .val(product_qty_);
    } else {
      product_qty_--;
      $(table_order_customer.cell(this, 0).node())
        .find("input")
        .val(product_qty_);
    }

    subtotal_ =
      parseFloat(product_price_.order_price) * parseFloat(product_qty_);
    table_order_customer.cell(this, 3).data(subtotal_).draw();
    // summaryText();
    calService();
    calDiscountAll();
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
            // let out_of_stock = checkOutOfStock(data["order_code"]);
            data =
              "<div class='card-body'><img src='" +
              CDN_IMG +
              "/uploads/temps_order/" +
              data["src_order_picture"] +
              "' width='100px' height='100px' style='border-radius: .40rem; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;' class='zoom'></div>";

            return data;
          },
        },
        {
          data: null,
          render: function (data, type, full, meta) {
            let data_order_name = data["order_name"];
            dataRe = "";
            return data_order_name;
          },
        },
        {
          data: "name",
        },
        {
          data: "order_price",
        },
        {
          data: "printer_name",
          visible: false,
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

      initComplete: function () {
        this.api()
          .columns([2])
          .every(function () {
            var column = this;
            var select = $(
              '<select><option value="">เลือกหมวดหมู่</option></select>'
            )
              .appendTo($("#search"))
              .on("change", function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(this.value).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '">' + d + "</option>");
              });
          });
      },
    });

    $("#orderListCustomerCard tbody")
      .off("click")
      .on("click", "tr", function (e) {
        let data = table_select_list.row(this).data();
        data.total_price = "";
        data.order_des = "";
        data.order_discount_type_by_order = "";
        data.order_discount_by_order = 0;
        data.order_pcs = 1;
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
  updateArrayTable();

  for (var i = 0; i < array_select_confirm.length; i++) {
    if (array_select_confirm[i].id === data) {
      array_select_confirm[i].order_pcs = 1;
      array_select_confirm.splice(i, 1);
    }
  }

  loadTableOrderCustomer();
  summaryText();
}

function cancleAllTable() {
  $("#search").html("");
  order_price_total = 0;

  service_number = 0;
  service_total = 0;

  discount_number = 0;
  discount_total = 0;

  card_charge_number = 0;
  card_charge_total = 0;

  vat_number = 0;
  vat_total = 0;

  array_select_confirm = [];
  loadTableOrderCustomer();
  summaryText();
  $("#service_price").html('<span id="service_price"> ' + "---" + " </span>");
  $("#discount_price").html('<span id="discount_price"> ' + "---" + "</span>");
  $("#cardCharge_price").html(
    '<span id="cardCharge_price"> ' + "---" + "</span>"
  );
  $("#vat_price").html('<span id="vat_price"> ' + "---" + "</span>");
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
  Swal.fire({
    title: "เพิ่ม Order",
    text: "คุณต้องการเพิ่ม Order โต๊ะนี้ !",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "ปิด",
    confirmButtonText: "ตกลง",
  }).then((result) => {
    if (result.isConfirmed) {
      if (array_select_confirm.length != 0) {
        array_customer_order = [];
        let check_kitchen = $("#kitchen_check").is(":checked");
        //get data from table input
        let data = table_order_customer.$("input, text").serialize();
        let str_split = data.replace(/pcs_cut=/g, "");
        let pcs_number_order = str_split.split("&");

        arr_object_customer_order_temp = [];

        let status = "OTHER";
        if (check_kitchen) {
          status = "IN_KITCHEN";
        }

        for (var i = 0; i < array_select_confirm.length; i++) {
          (arr_object_customer_order_temp = [
            {
              order_code: array_select_confirm[i].order_code,
              order_customer_ordername: array_select_confirm[i].order_name,
              order_customer_price: array_select_confirm[i].order_price,
              order_customer_pcs: pcs_number_order[i],
              order_customer_table_code: data_table_name,
              order_price_sum: order_price_total,
              order_service: service_total,
              order_service_type: service_type,
              order_discount: discount_total,
              order_discount_type: discount_type,
              order_card_charge: card_charge_total,
              order_card_charge_type: "-",
              order_vat_type: vat_type,
              order_vat: vat_total,
              order_status: status,
              order_des: array_select_confirm[i].order_des,
              order_discount_type_by_order:
                array_select_confirm[i].order_discount_type_by_order,
              order_discount_by_order:
                array_select_confirm[i].order_discount_by_order,
              order_printer_name: array_select_confirm[i].printer_name,
            },
          ]),
            array_customer_order.push(arr_object_customer_order_temp);
        }

        if (isOnline) {
          $.ajax({
            url: serverUrl + "order/addOrderCustomer",
            method: "post",
            data: {
              data: array_customer_order,
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

                $.ajax({
                  url:
                    `${serverUrl}/order/check_printer_order/` +
                    response.order_customer_code,
                  method: "get",
                  success: function (res_print_log) {
                    for (var i = 0; i < res_print_log.data.length; i++) {
                      array_print_log = [
                        {
                          customer_code: response.order_customer_code,
                          printer_name: res_print_log.data[i].printer_name,
                        },
                      ];

                      $.ajax({
                        url: `${serverUrl}/pdf_BillOrder`,
                        method: "post",
                        data: {
                          data: array_print_log,
                        },
                        success: function (res) {
                          // การสำเร็จ
                          //clear after add
                          array_customer_order = [];
                          array_select_confirm = [];
                          cancleAllTable();
                          localStorage.setItem("isCallNewOrder", "yes");

                          printPDF(res.message_name, res.message_printer);

                          $.ajax({
                            url: `${serverUrl}/order/update_order_print_log`,
                            method: "post",
                            data: { data: array_print_log },
                            success: function (res) {
                              // การสำเร็จ
                            },
                            error: function (error) {
                              // เกิดข้อผิดพลาด
                            },
                          });
                        },
                        error: function (error) {
                          // เกิดข้อผิดพลาด
                        },
                      });
                    }
                  },
                  error: function (error) {
                    // เกิดข้อผิดพลาด
                  },
                });

                // var win = window.open(
                //   `${serverUrl}/pdf_BillOrder/` + response.order_customer_code,
                //   "",
                //   "left=0,top=0,width=800,height=800,toolbar=0,scrollbars=0,status=0"
                // );

                // win.onload = function () {
                //   win.print(); // สั่งพิมพ์ทันที
                //   // console.log("printed");
                //   // รอให้การพิมพ์เสร็จสิ้นแล้วค่อยปิดหน้า PDF
                //   setTimeout(function () {
                //     win.close();
                //   }, 4000);

                //   // ส่วนนี้อาจจะไม่จำเป็น
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
        } else {
        }
      } else {
        notif({
          type: "warning",
          msg: "กรุณาเลือก Order!",
          position: "right",
          fade: true,
          time: 300,
        });
      }
    }
  });
}

function summaryText() {
  let order_pcs_sum = 0,
    order_price = 0;

  let data = table_order_customer.$("input, text").serialize();
  let str_split = data.replace(/pcs_cut=/g, "");
  let pcs_number_order = str_split.split("&");

  for (var i = 0; i < array_select_confirm.length; i++) {
    order_pcs_sum += parseInt(pcs_number_order[i]);
    order_price +=
      parseInt(array_select_confirm[i].order_price) *
      parseInt(pcs_number_order[i]);
  }

  // console.log(order_price);

  order_price_total =
    order_price +
    service_total -
    discount_total +
    card_charge_total +
    vat_total;

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
      order_price_total.toLocaleString(undefined, {
        minimumFractionDigits: 2,
      }) +
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

function openModalComment(id) {
  $(".bd-add-comment").modal("show");
  $("#text_comment_hiden").val(id);
}

function closeModalcomment() {
  $(".bd-add-comment").modal("hide");
  $("#addcomment")[0].reset();
  $("#addcomment").parsley().reset();
}

$("#addService").submit(function (e) {
  e.preventDefault();
  var service_type = $("#service_type").parsley();
  var num_service = $("#num_service").parsley();

  if (service_type.isValid() && num_service.isValid()) {
    isOnline = window.navigator.onLine;

    if (isOnline) {
      console.log("Online");
      calService();
      $(".bd-add-service").modal("hide");
      $("#addService")[0].reset();
      $("#addService").parsley().reset();
    } else {
      console.log("Offline");
      $(".bd-add-service").modal("hide");
      $("#addService")[0].reset();
      $("#addService").parsley().reset();
    }
  } else {
    service_type.validate();
    num_service.validate();
  }
});

function calService() {
  if ($("#service_type").val() != "") {
    if ($("#service_type").val() == "percen") {
      service_type = $("#service_type").val();
      service_number = $("#num_service").val();
      let number_ = 0;
      number_ = $("#num_service").val();
      let precen_number = order_price_total * (parseFloat(number_) / 100);
      service_total = precen_number;
      $("#service_price").html(
        '<span id="service_price"> ' + number_ + " %</span>"
      );
      summaryText();
    } else {
      service_number = $("#num_service").val();
      let number_ = 0;
      number_ = $("#num_service").val();
      service_total = parseFloat(number_);
      $("#service_price").html(
        '<span id="service_price"> ' +
          number_ +
          " " +
          window.symbolValueMoney +
          "</span>"
      );
      summaryText();
    }
  } else {
    if (service_type == "percen") {
      summaryText();
      let number_last = order_price_total * (parseFloat(service_number) / 100);
      service_total = number_last;
      summaryText();
    } else {
      summaryText();
    }
  }
}

$("#adddiscountAll").submit(function (e) {
  e.preventDefault();
  var adddiscountAll_type = $("#adddiscountAll_type").parsley();
  var num_adddiscountAll = $("#num_adddiscountAll").parsley();

  if (adddiscountAll_type.isValid() && num_adddiscountAll.isValid()) {
    isOnline = window.navigator.onLine;
    if (isOnline) {
      calDiscountAll();
      $(".bd-add-discountAll").modal("hide");
      $("#adddiscountAll")[0].reset();
      $("#adddiscountAll").parsley().reset();
    } else {
      // calDiscountAll();
      $(".bd-add-discountAll").modal("hide");
      $("#adddiscountAll")[0].reset();
      $("#adddiscountAll").parsley().reset();
    }
  } else {
    adddiscountAll_type.validate();
    num_adddiscountAll.validate();
  }
});

function calDiscountAll() {
  if ($("#adddiscountAll_type").val() != "") {
    if ($("#adddiscountAll_type").val() == "percen") {
      discount_type = $("#adddiscountAll_type").val();
      discount_number = $("#num_adddiscountAll").val();
      let number_ = 0;
      number_ = $("#num_adddiscountAll").val();
      let precen_number = order_price_total * (parseFloat(number_) / 100);
      discount_total = precen_number;
      $("#discount_price").html(
        '<span id="discount_price"> ' + number_ + " %</span>"
      );
      summaryText();
    } else {
      discount_number = $("#num_adddiscountAll").val();
      let number_ = 0;
      number_ = $("#num_adddiscountAll").val();
      discount_total = parseFloat(number_);
      $("#discount_price").html(
        '<span id="discount_price"> ' +
          number_ +
          " " +
          window.symbolValueMoney +
          "</span>"
      );
      summaryText();
    }
  } else {
    if (adddiscountAll_type == "percen") {
      summaryText();
      let number_last = order_price_total * (parseFloat(discount_number) / 100);
      discount_total = number_last;
      summaryText();
    } else {
      summaryText();
    }
  }
}

$("#addcardCharge").submit(function (e) {
  e.preventDefault();
  var num_cardCharge = $("#num_cardCharge").parsley();

  if (num_cardCharge.isValid()) {
    isOnline = window.navigator.onLine;
    if (isOnline) {
      cardCharge();
      $(".bd-add-cardCharge").modal("hide");
      $("#addcardCharge")[0].reset();
      $("#addcardCharge").parsley().reset();
    } else {
      // calDiscountAll();
      $(".bd-add-cardCharge").modal("hide");
      $("#addcardCharge")[0].reset();
      $("#addcardCharge").parsley().reset();
    }
  } else {
    num_cardCharge.validate();
  }
});

function cardCharge() {
  if ($("#num_cardCharge").val() != "") {
    card_charge_number = $("#num_cardCharge").val();
    let number_ = 0;
    number_ = $("#num_cardCharge").val();
    let precen_number = order_price_total * (parseFloat(number_) / 100);
    card_charge_total = precen_number;
    $("#cardCharge_price").html(
      '<span id="cardCharge_price"> ' + number_ + " %</span>"
    );
    summaryText();
  } else {
    summaryText();
    let number_last =
      order_price_total * (parseFloat(card_charge_number) / 100);
    card_charge_total = number_last;
    summaryText();
  }
}

$("#addvat").submit(function (e) {
  e.preventDefault();
  var vat_type = $("#vat_type").parsley();
  var num_vat = $("#num_vat").parsley();

  if (vat_type.isValid() && num_vat.isValid()) {
    isOnline = window.navigator.onLine;
    if (isOnline) {
      calvat();
      $(".bd-add-vat").modal("hide");
      $("#addvat")[0].reset();
      $("#addvat").parsley().reset();
    } else {
      // calDiscountAll();
      $(".bd-add-vat").modal("hide");
      $("#addvat")[0].reset();
      $("#addvat").parsley().reset();
    }
  } else {
    vat_type.validate();
    num_adddiscountAll.validate();
  }
});

function calvat() {
  if ($("#vat_type").val() != "") {
    if ($("#vat_type").val() == "percen") {
      vat_type = $("#vat_type").val();
      vat_number = $("#num_vat").val();
      let number_ = 0;
      number_ = $("#num_vat").val();
      let precen_number = order_price_total * (parseFloat(number_) / 100);
      vat_total = precen_number;
      $("#vat_price").html('<span id="vat_price"> ' + number_ + " %</span>");
      summaryText();
    } else {
      discount_number = $("#num_vat").val();
      let number_ = 0;
      number_ = $("#num_vat").val();
      vat_total = parseFloat(number_);
      $("#vat_price").html(
        '<span id="vat_price"> ' +
          number_ +
          " " +
          window.symbolValueMoney +
          "</span>"
      );
      summaryText();
    }
  } else {
    if (vat_type == "percen") {
      summaryText();
      let number_last = order_price_total * (parseFloat(vat_number) / 100);
      vat_total = number_last;
      summaryText();
    } else {
      summaryText();
    }
  }
}

$("#addcomment").submit(function (e) {
  e.preventDefault();
  var text_comment = $("#text_comment").parsley();
  if (text_comment.isValid()) {
    isOnline = window.navigator.onLine;
    if (isOnline) {
      let data_id = $("#text_comment_hiden").val();
      addComment(data_id);
    } else {
      $(".bd-add-comment").modal("hide");
      $("#addcomment")[0].reset();
      $("#addcomment").parsley().reset();
    }
  } else {
    text_comment.validate();
  }
});

function addComment(id) {
  for (var i = 0; i < array_select_confirm.length; i++) {
    if (array_select_confirm[i].id == id) {
      array_select_confirm[i].order_des = $("#text_comment").val();
    }
  }
  loadTableOrderCustomer();
  $(".bd-add-comment").modal("hide");
  $("#addcomment")[0].reset();
  $("#addcomment").parsley().reset();
}

function checkOutOfStock(code) {
  $.ajax({
    url: serverUrl + "/order/outofstock/" + code,
    method: "get",
    success: function (response) {
      console.log(response.data[0].length);
    },
  });
}

function openModalDiscountByOrder(id) {
  $(".bd-add-discountByOrder").modal("show");
  $("#text_discount_order_hiden").val(id);
}

function closeModaladddiscountByOrder() {
  $(".bd-add-discountByOrder").modal("hide");
  $("#adddiscountByOrder")[0].reset();
  $("#adddiscountByOrder").parsley().reset();
}

$("#adddiscountByOrder").submit(function (e) {
  e.preventDefault();
  var adddiscountbyorder_type = $("#adddiscountbyorder_type").parsley();
  var num_adddiscountbyorder = $("#num_adddiscountbyorder").parsley();
  if (adddiscountbyorder_type.isValid() && num_adddiscountbyorder.isValid()) {
    isOnline = window.navigator.onLine;
    if (isOnline) {
      let data_id = $("#text_discount_order_hiden").val();
      add_discount_order(data_id);
    } else {
      $(".bd-add-discountByOrder").modal("hide");
      $("#adddiscountByOrder")[0].reset();
      $("#adddiscountByOrder").parsley().reset();
    }
  } else {
    adddiscountbyorder_type.validate();
    num_adddiscountbyorder.validate();
  }
});

function add_discount_order(id) {
  for (var i = 0; i < array_select_confirm.length; i++) {
    if (array_select_confirm[i].id == id) {
      array_select_confirm[i].order_discount_type_by_order = $(
        "#adddiscountbyorder_type"
      ).val();
      if ($("#adddiscountbyorder_type").val() == "percen") {
        let discount_number_per =
          array_select_confirm[i].order_price *
          ($("#num_adddiscountbyorder").val() / 100);

        array_select_confirm[i].order_discount_by_order = discount_number_per;
      } else {
        array_select_confirm[i].order_discount_by_order = $(
          "#num_adddiscountbyorder"
        ).val();
      }
    }
  }
  loadTableOrderCustomer();
  $(".bd-add-discountByOrder").modal("hide");
  $("#adddiscountByOrder")[0].reset();
  $("#adddiscountByOrder").parsley().reset();
}

function minus(data) {}
function plus(data) {}
