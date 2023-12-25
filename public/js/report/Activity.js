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

    var $reportDetail = $("#tblActivity").dataTable()

  const ACTIVITY = {
    handleSearch() {

      $("#btnSearch").on("click", function () {

        let dataObj = {
          from: moment($selectDate.val()).format('YYYY-MM-DD'),
          to: moment($selectDate.val()).format('YYYY-MM-DD')
        };

        $.ajax({
          type: "POST",
          url: `${serverUrl}/report/ActivityLogs`,
          data: JSON.stringify(dataObj),
          contentType: "application/json; charset=utf-8",
        })
          .done(function (res) {
            if (res.success) {

              let $data = res.data

              $('#displayDateQuery').html($data.date)

              $reportDetail.fnDestroy()
              $reportDetail.dataTable({
                data: $data.data,
                columns: [
                  { data: "created_at" },
                  { data: "refer" },
                  { data: "action" },
                  { data: "message" },
                  { data: "value" },
                  { data: "by" },
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
      ACTIVITY.handleSearch();
    },
  };

  ACTIVITY.init();
});
