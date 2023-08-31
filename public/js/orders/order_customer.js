var isOnline;
var searchParams_;
(function ($) {
  let searchParams = window.location.pathname;
  searchParams_ = searchParams.split("/order/order_customer_list/");
  loadTableOrderCustomer();
  getTableByTableCode(searchParams_[1]);
  getOrderCard();
})(jQuery);

function loadTableOrderCustomer() {
  $("#orderListCustomerInTable").DataTable();
}

function getTableByTableCode(tableCode) {
  isOnline = window.navigator.onLine;
  if (isOnline) {
    $.ajax({
      url: serverUrl + "/order/getTableDetalByCode/" + tableCode,
      method: "get",
      success: function (response) {
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
  $("#orderListCustomerCard").DataTable().clear().destroy();
  if (isOnline) {
    $("#orderListCustomerCard")
      .DataTable({
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
                "<img src='" +
                serverUrl +
                "/uploads/temps_order/" +
                data["src_order_picture"] +
                "' width='60px' height='50px' style='border-radius: .40rem;'>";

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
      })
      .on("select", function (e, dt, type, indexes) {
        var rowData = table.rows(indexes).data().toArray();
      })
      .on("deselect", function () {});
  } else {
  }
}
