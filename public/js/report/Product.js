function reload() {
  // location.reload()
}

function cb(start, end) {
  $("#reportrange span").html(
    start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
  );
}

$(document).ready(function () {

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

  var $wrapperFilter = $('.wrapperFilter')
  var $btnFilter = $wrapperFilter.find('a')

  const PRODUCT = {
    showDisplay(displayName) {
      switch (displayName) {
        case 'Group':
          $('#wrapperGroup').show()
          $('#wrapperBestSeller').hide()
          $('#wrapperQuantity').hide()
          break
        case 'Best Seller':
          $('#wrapperGroup').hide()
          $('#wrapperBestSeller').show()
          $('#wrapperQuantity').hide()
          break
        case 'Quantity':
          $('#wrapperGroup').hide()
          $('#wrapperBestSeller').hide()
          $('#wrapperQuantity').show()
          break
      }
    },
    handleSearch() {

      $btnFilter.on('click', function() {
        let $me = $(this)

        $btnFilter.removeClass('active')
        $me.addClass('active')

        PRODUCT.showDisplay($me.data('title'))
      })

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
          url: `${serverUrl}/report/SumOrderItems`,
          data: JSON.stringify(dataObj),
          contentType: "application/json; charset=utf-8",
        })
          .done(function (res) {
            if (res.success) {

              let $data = res.data

              $('#tdFROM').html($data.from)
              $('#tdTO').html($data.to)
              $('#tdLENGTH').html('tdFROM')
              $('#tdGENERATED').html('tdFROM')

              $('#tdAMOUNT').html($data.Amount)
              $('#tdQUANTITY').html($data.Quantity)

            
              // Product Type Arrray
              let html = ''
              $.each($data.SummaryType, function (key, value) {
                html += `
                  <tr>
                      <td width="60%">${key}</td>
                      <td width="40%">${value}</td>
                  </tr>
                `;
              });

              $('#ProductTypeArrray').html(html)

              let $btnGroup = $('.btn-group').find('active')

              $title = $btnGroup ? 'Group' : $btnGroup.data('title')

              PRODUCT.showDisplay($title)


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
      PRODUCT.handleSearch()
    },
  }

  PRODUCT.init()
});
