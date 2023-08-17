var isOnline;
var itemsArrayDeleteFormular = [];
(function ($) {
  tableFormularPOS();
  tableTransectionSummary();
})(jQuery);
isOnline = window.navigator.onLine;
function tableFormularPOS() {
  if (isOnline) {
    $("#table_fomular_data").DataTable().clear().destroy();
    table_fomular_data = $("#table_fomular_data").DataTable({
      language: {
        search: "<i class='ti-search'></i>",
        searchPlaceholder: "ค้นหา",
        paginate: {
          next: "<i class='ti-arrow-right'></i>",
          previous: "<i class='ti-arrow-left'></i>",
        },
      },
      order: [],
      ajax: {
        type: "POST",
        url: serverUrl + "stock/dataSummaryFormular", 
        data: function (d) {
          return d;
        },
      },
      columns: [
        {
          data: null,
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          },
        },
        {
          data: "order_name",
        },
        {
          data: null,
          render: function (data, type, row, meta) {
            return (
              '<a href="' +
              serverUrl +
              "stock/listStockItem/" +
              data["order_code"] +
              '" target="popup" onclick=window.open("' +
              serverUrl +
              "stock/listStockItem/" +
              data["order_code"] +
              '","popup","width=1024,height=600"); return false; " >View Stock item</a>'
            );
          },
        },
        {
          data: null,
          render: function (data, type, row, meta) {
            return (
              "<a herf='javascript:void(0);' class='action_btn' data-toggle='tooltip' data-placement='top' id='" +
              data["order_code"] +
              "' onclick='deleteFormularOrder(this.id)' title='ลบข้อมูล'><i class='fas fa-trash'></i></a>"
            );
          },
        },
      ],
      columnDefs: [
        {
          targets: 2,
          className: "text-center",
        },
        {
          targets: 3,
          className: "text-center",
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
    });
  } else {
  }
}

function tableTransectionSummary() {
  if (isOnline) {
    $("#stockTableTransectionSummary").DataTable().clear().destroy();
    stockTableTransectionSummary = $("#stockTableTransectionSummary").DataTable(
      {
        language: {
          search: "<i class='ti-search'></i>",
          searchPlaceholder: "ค้นหา",
          paginate: {
            next: "<i class='ti-arrow-right'></i>",
            previous: "<i class='ti-arrow-left'></i>",
          },
        },
        order: [],
        ajax: {
          type: "POST",
          url: serverUrl + "/stock/dataSummaryTransection",
          data: function (d) {
            return d;
          },
        },

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
              return (
                "<font >" +
                data["name_product"] +
                " (" +
                data["name_group"] +
                ")</font>"
              );
            },
          },
          {
            data: "begin",
          },
          {
            data: "add",
          },
          {
            data: "sold",
          },
          {
            data: "adjust",
          },
          {
            data: "withdraw",
          },
          {
            data: "return",
          },
          {
            data: "balance",
          },
          {
            data: null,
            render: function (data, type, row, meta) {
              var date_stock = new Date(data["created_at"]);
              const options = { dateStyle: "short" };
              const date = date_stock.toLocaleString("en", options);
              return "<font >" + date + "</font>";
            },
          },
        ],
        columnDefs: [
          {
            targets: 6,
            className: "text-center",
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
      }
    );
  } else {
  }
}

function deleteFormularOrder(id) {
  isOnline = window.navigator.onLine;
  Swal.fire({
    title: "ยกเลิกรายการ",
    text: "คุณต้องยกเลิกรายการนี้ !",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "ปิด",
    confirmButtonText: "ตกลง",
  }).then((result) => {
    if (result.isConfirmed) {
      itemsArrayDeleteFormularTemp = [
        {
          id: id,
        },
      ];

      itemsArrayDeleteFormular.push(itemsArrayDeleteFormularTemp);

      if (isOnline) {
        $.ajax({
          url: serverUrl + "stock/deleteFormularbyOrder",
          method: "post",
          data: {
            data: itemsArrayDeleteFormular,
          },
          cache: false,
          success: function (response) {
            if ((response.message = "ลบรายการสำเร็จ")) {
              notif({
                type: "success",
                msg: "ลบรายการสำเร็จ!",
                position: "right",
                fade: true,
                time: 300,
              });
              //clear after update

              tableFormularPOS();
            } else {
            }
          },
        });
      } else {
        //   itemsArrayDelete.push(itemsArrayDeleteTemp);
        //   localStorage.setItem(
        //     "productsOldDelete",
        //     JSON.stringify(itemsArrayDelete)
        //   );
        //   loadTableStock();
      }
    }
  });
}
