function reload() {
  // location.reload()
}

function cb(start, end) {
  $("#reportrange span").html(
    start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
  );
}

$(document).ready(function () {
  var N = N || {};

  N.report = {
    //share
    amount: "Baht ",
    time: "Time",
    date: "Date",
    grandTotal: "Grand Total",
    sum: "Sum",

    //income tab1

    //7:00 น. ถึง 7:00น. ของวันถัดไป'
    //' 00:00น. ถึง 23:59น.'
    incomeNote0: "Remark",
    incomeNote1: "The grand total sales is calculated from orders made from ",
    incomeNote2: "Click and drag to zoom-in",
    fromTime7: "7:00AM  to 7:00AM of tomorrow",
    fromTime0: " 00:00 to 23:59",

    //order tab
    sortByOrder: "By Order",
    sortByTimeGroup: "By TimeSpan",
    tableNo: "No.",
    tableDate: "Date",
    tableFood: "Food & Beverage",
    tableDiscountItem: "Discount Items",
    tableService: "Service",
    tableCustomer: "Customer",
    tableDiscountAll: "Discount Bill",
    tableGrandTotal: "Grand Total",

    tableSubTotal: "SubTotal",
    tableItem: "Items",
    tableQuantity: "Quantity",
    tableQty: "Qty",
    tablePrice: "UnitPrice",
    tableExtPrice: "Ext.Price",
    tableDiscountLint: "Discount",

    tableReceived: "Received",
    tableChange: "Change",

    //products tab
    sortByGroup: "By group",
    sortByBestSeller: "By best seller",
    sortByQuantity: "By qty",
  };

  var start = moment().startOf("month");
  var end = moment();

  let $selectDate = $("#reportrange").daterangepicker(
    {
      startDate: start,
      endDate: end,
      ranges: {
        Today: [moment(), moment()],
        Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
        "Last 7 Days": [moment().subtract(6, "days"), moment()],
        "Last 30 Days": [moment().subtract(29, "days"), moment()],
        "This Month": [moment().startOf("month"), moment().endOf("month")],
        "Last Month": [
          moment().subtract(1, "month").startOf("month"),
          moment().subtract(1, "month").endOf("month"),
        ],
      },
    },
    cb
  );

  cb(start, end);

  const SALES = {
    list: [],
    all: {},
    dataRequest: {},
    selectedDate: {},
    displayRange: "",
    calendar: { created: !1, container: null },

    genCalendar() {
      var t = [],
        i,
        n;
      _.each(SALES.list, function (n) {
        if (n.Date != "all" && n.Date != "All") {
          var r = n.GrandTotal,
            f = n.Expense,
            e = r - f,
            i = moment(n.Date),
            o = {
              title: accounting.formatMoney(r, "", 0),
              start: i.add("h", 0),
              textColor: "green",
            },
            s = {
              title: "- " + accounting.formatMoney(f, "", 0),
              start: moment(i).add("h", 5),
              textColor: "rgb(167, 78, 26)",
            },
            h = {
              title: accounting.formatMoney(e, "", 0),
              start: moment(i).add("h", 10),
              textColor: "blue",
              className: "fc-net-total",
            };
          t.push(o);
          t.push(s);
          t.push(h);
          // u[n.Date] = !0;
        }
      });
      SALES.calendar.created
        ? ((i = SALES.calendar.container),
          i.fullCalendar("addEventSource", t),
          i.fullCalendar("gotoDate", moment(this.dataRequest.from)))
        : ((n = this),
          (SALES.calendar.container = $("#container2").fullCalendar({
            weekMode: "liquid",
            firstDay: 0,
            events: t,
            dayClick: function (t) {
              // console.log("d");
              // console.log(t);
              // u[t.format("YYYY-MM-DD")] != undefined &&
              //   ((n.viewAll = !1),
              //   (n.selectedDate =
              //     n.dataRequest.data[t.format("YYYY-MM-DD")]));
            },
            eventClick: function (t) {
              var i = t.start.format("YYYY-MM-DD");

              let $selectedDate = SALES.dataRequest.data[i];

              /**
               * 
               *                 <ul class="list-unstyled" v-if="list.length >0">

                    <li class="section">
                        <span v-if="!viewAll">${$selectedDate.Date}</span>
                        <span v-if="viewAll">{{displayRange}}</span>
                    </li>
               */

              let $html = `
                <ul class="list-unstyled" v-if="list.length >0">
                    <li class="section">
                        <span v-if="!viewAll">${$selectedDate.Date}</span>
                    </li>
                    <li>
                        <span class="sale-info">
                            <span>GrandTotal</span>
                        </span>
                        <span class="sale-num" style="font-weight: bold">
                            <currency>${$selectedDate.GrandTotal}</currency>
                        </span>
                    </li>
                    <li class="section">
                        <span>Summary</span>
                    </li>
                    <li>
                        <span class="sale-info">
                            <span>Bills</span>
                        </span>
                        <span class="sale-num">${$selectedDate.Bills}</span>
                    </li>
                    <li>
                        <span class="sale-info">
                            <span>Bill (avg.)</span>
                        </span>
                        <span class="sale-num">
                            <currency>${
                              $selectedDate.GrandTotal / $selectedDate.Bills
                            }</currency>
                        </span>
                    </li>

                    <li class="section">
                        <span>Payment Type</span>
                    </li>
              `;

              $html += `<li> `;
              $.each($selectedDate.PaymentList, function (key, $payment) {
                html += `
                    <span class="sale-info">
                        <span>${$payment.name}</span>
                    </span>
                    <span class="sale-num">
                        <currency>${$payment.amount}</currency>
                    </span>
                `;
              });
              $html += `</li>`;

              $html += `
                    <li class="section">
                        <span>Detail</span>
                    </li>
                    <li v-if="selectedDate.SubTotal">
                        <span class="sale-info">
                            <span>Total</span>
                        </span>
                        <span class="sale-num">
                            <currency>${$selectedDate.SubTotal}</currency>
                        </span>
                    </li>
                    <li v-if="selectedDate.ItemDiscount">
                        <span class="sale-info">
                            <span>Item Discount</span>
                        </span>
                        <span class="sale-num">
                            <currency>${-$selectedDate.ItemDiscount}</currency>
                        </span>
                    </li>
                </ul>
              `;
              $(".sale-summary").html($html);
            },
            timezone: "local",
            eventMouseover: function (n) {
              var t = n.start.format("YYYY-MM-DD");
              $(".fc-day[data-date=" + t + "]").css(
                "background-color",
                "#DFCEE1"
              );
            },
            eventMouseout: function (n) {
              var t = n.start.format("YYYY-MM-DD");
              $(".fc-day[data-date=" + t + "]").css("background-color", "");
            },
          })),
          (SALES.calendar.created = !0));
    },
    showGraph() {
      var u, f;
      if (SALES.all != undefined) {
        var n = [],
          t = [],
          i = [],
          r = _.sortBy(SALES.list, "Date");

        $.each(r, function (key, r) {
          n.push(parseInt(r.GrandTotal));
          t.push(r.Expense);
          i.push(r.Date);
        });

        u = $("#container").highcharts({
          title: {
            text:
              "Income " +
              accounting.formatMoney(SALES.all.GrandTotal) +
              "  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     Expense " +
              accounting.formatMoney(SALES.all.Expense) +
              "  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Net " +
              accounting.formatMoney(SALES.all.GrandTotal - SALES.all.Expense),
            useHTML: !0,
          },
          colors: ["#852b99", "#f45b4f"],
          lang: { thousandsSep: "," },
          xAxis: [
            {
              categories: i,
              crosshair: !0,
              title: {
                enabled: !0,
                text:
                  N.report.date +
                  " :  " +
                  moment(this.from).format("DD-MMM") +
                  " to " +
                  moment(this.to).format("DD-MMM"),
              },
              labels: {
                rotation: -45,
                align: "right",
                x: 0,
                y: 25,
                style: {
                  fontSize: "13px",
                  fontFamily: "Verdana, sans-serif",
                },
              },
            },
          ],
          yAxis: [
            { title: { text: N.report.amount }, min: 0 },
            {
              linkedTo: 0,
              title: { text: N.report.amount },
              opposite: !0,
              min: 0,
            },
          ],
          tooltip: { shared: !0 },
          legend: {
            enabled: !0,
            layout: "horizontal",
            align: "left",
            verticalAlign: "right",
            floating: !0,
            title: {
              text: '<span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
              style: { fontStyle: "italic" },
            },
            x: 20,
            y: -10,
          },
          series: [
            {
              name: "Income ",
              type: "column",
              data: n,
              tooltip: { valueSuffix: " " },
              showInLegend: !0,
              dataLabels: {
                enabled: !0,
                rotation: -90,
                color: "#FFFFFF",
                align: "right",
                format: "{point.y:,.0f}",
                allowOverlap: !0,
                crop: !1,
                overflow: "none",
                y: 10,
                style: {
                  fontFamily: "Verdana, sans-serif",
                  color: "#FFFFFF",
                  fontSize: "13px",
                  fontWeight: "normal",
                  textShadow: "none",
                },
              },
            },
            {
              name: "Expense ",
              type: "line",
              data: t,
              tooltip: { valueSuffix: " " },
              marker: { radius: 2 },
              lineWidth: 1,
              showInLegend: !0,
            },
          ],
        });
        SALES.all.Expense == 0 &&
          (f = $("#container").highcharts().series[1].hide());
      }
    },
    handleSearch() {
      $("#btnSearch").on("click", function () {
        let $startDate = $selectDate.data("daterangepicker").startDate,
          $endDate = $selectDate.data("daterangepicker").endDate;

        let dataObj = {
          businessMode: "",
          customerId: "",
          customerMode: "",
          from: $startDate.format("YYYY-MM-DD"),
          pattern: "YYYY-MM-DD",
          shopname: "",
          to: $endDate.format("YYYY-MM-DD"),
        };

        $.ajax({
          type: "POST",
          url: `${serverUrl}/report/incomeSummary`,
          data: JSON.stringify(dataObj),
          contentType: "application/json; charset=utf-8",
        })
          .done(function (res) {
            if (res.success) {
              let data = res.data;

              SALES.dataRequest.data = data;
              SALES.list = data;
              SALES.selectedDate = data.all;
              SALES.all = data.all;
              SALES.displayRange =
                "Report : " +
                $startDate.format("YYYY-MM-DD") +
                " - " +
                $endDate.format("YYYY-MM-DD");
              delete data.all;

              SALES.showGraph();
              SALES.genCalendar();

              let $table = $("#vue-income-view3-summary");

              html = "";

              $.each(data, function (key, value) {
                let $data = value;

                $data.perBill = parseInt($data.GrandTotal / $data.Bills);
                $data.perCustomer = parseInt(
                  $data.GrandTotal / $data.CustomerCount
                );

                html += `
                        <tr>
                            <td class="highlight">
                                <span style="margin-left: 7px">${$data.Date}</span>
                            </td>
                            <td>
                                <span>${$data.Bills}</span>
                                &nbsp; &nbsp;
                                <span v-if="$data.Bills">
                                    (<currency>${$data.perBill}</currency>)
                                </span>
                            </td>
                            <td>
                                <currency style="font-weight: bold">${$data.GrandTotal}</currency>
                            </td>
                        `;

                html += `<td style="border-left-width: 2px " class="small-data"> `;
                $.each($data.PaymentList, function (key, $payment) {
                  html += `
                                <div>
                                    <span>${$payment.name}</span>
                                    <span> : </span>
                                    <currency>${$payment.amount}</currency>
                                    <span style="margin-left: 10px">(${$payment.bills})</span>
                                </div>
                            `;
                });
                html += `</td>`;

                html += `
                            <td style="border-left-width: 2px " class="small-data">
                                <currency>${$data.SubTotal}</currency>
                            </td>
                            <td class="small-data">
                                <currency>${$data.Discount}</currency>
                            </td>
                        </tr>
                        `;
              });

              $table.find("tbody").html(html);
            } else {
              // swal({
              //     title: 'ระบบขัดข้อง กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ',
              //     text: 'Redirecting...',
              //     icon: 'warning',
              //     timer: 2000,
              //     buttons: false
              // })
              // reload()
            }
          })
          .fail(function () {
            // swal({
            //     title: 'ระบบขัดข้อง กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ',
            //     text: 'Redirecting...',
            //     icon: 'warning',
            //     timer: 2000,
            //     buttons: false
            // })
            // reload()
          });
      });
    },
    init() {
      SALES.handleSearch();
    },
  };

  SALES.init();

  let $btn = $(".btn-group").find("button");

  $btn.on("click", function () {

    let $me = $(this),
        $title = $me.data("title")

    switch ($title) {
      case "Graph":
        $(".graph").show()
        $(".xcalendar").hide()
        $(".xtable").hide()
        break;
      case "Calendar":
        $(".graph").hide()
        $(".xcalendar").show()
        $(".xtable").hide()
        break;
      case "Table":
        $(".graph").hide()
        $(".xcalendar").hide()
        $(".xtable").show()
        break;
    }
  });
});
