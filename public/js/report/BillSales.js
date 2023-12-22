function reload() {
  // location.reload()
}

$(document).ready(function () {

  var date

  let $selectDate = $("#datepickerFrom")
    .datepicker({
      format: "mm/dd/yyyy",
      orientation: "bottom left",
      showButtonPanel: !0,
      autoclose: !0,
      todayBtn: !0,
    })
    .on("changeDate", function (n) {
      // date = n.date
      // console.log(date)
    });

    var $reportDetail = $("#tblDetail").dataTable()

  const BILL_SALES = {
    handleSearch() {

      $("#btnSearch").on("click", function () {

        let dataObj = {
          from: moment($selectDate.val()).format('YYYY-MM-DD'),
          to: moment($selectDate.val()).format('YYYY-MM-DD')
        };

        $.ajax({
          type: "POST",
          url: `${serverUrl}/report/SalesByOrder`,
          data: JSON.stringify(dataObj),
          contentType: "application/json; charset=utf-8",
        })
          .done(function (res) {
            if (res.success) {

              let $data = res.data

              $('#thTotalSum').html($data.SubTotal)
              $('#thDiscountSum').html($data.Discount)
              $('#thServiceSum').html($data.ServiceCharge)
              $('#thCreditChargeSum').html($data.CardCharge)
              $('#thVatSum').html($data.Vat)
              $('#thGrandTotalSum').html($data.GrandTotal)

              $reportDetail.fnDestroy()
              $reportDetail.dataTable({
                data: $data.Orders,
                columns: [
                  { data: "id" },
                  { data: "order_customer_code" },
                  { data: "created_at" },
                  { data: "order_table_code" },
                  { data: "type" },
                  { data: "shift" },
                  { data: "updated_by" },
                  { data: "grandTotal" },
                  { data: "remark" }
                ],
              });

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
      BILL_SALES.handleSearch();
    },
  };

  BILL_SALES.init();
});
