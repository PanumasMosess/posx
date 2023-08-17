var isOnline;
var itemsArrayDeleteFormular = [];
var searchParams = window.location.pathname;
var searchParams_ = searchParams.split("/stock/listStockItem/");
(function ($) {
  tableItemFomular(searchParams_ [1]);
})(jQuery);

function tableItemFomular(code){
  $("#stock_table_item_formular").DataTable().clear().destroy();
  $("#stock_table_item_formular").DataTable({
    language: {
      search: "<i class='ti-search'></i>",
      searchPlaceholder: "ค้นหา",
      paginate: {
        next: "<i class='ti-arrow-right'></i>",
        previous: "<i class='ti-arrow-left'></i>",
      },
    },
    order: [],
    ajax: serverUrl + "/stock/pageListFomular/" + code,
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
          return "<font >" + data["name"];
        },
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          return (
            "<font >" +
            data["formula_pcs"] +
            " (" +
            data["name_unit"] +
            ")" +
            "</font>"
          );
        },
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          return (
            "<a herf='javascript:void(0);' class='action_btn' data-toggle='tooltip' data-placement='top' id='" +
            data["formular_id"] +
            "' onclick='deleteFormularid(this.id)' title='ลบข้อมูล'><i class='fas fa-trash'></i></a>"
          );
        },
      },
    ],
    columnDefs: [
      {
        targets: 3,
        className: "text-center",
      },
    ],
    responsive: true,
    searching: true,
    info: true,
    paging: true,
    pagingType: "full_numbers",
    pageLength: 10,
    lengthMenu: [
      [10, 20, 50, 100, -1],
      [10, 20, 50, 100, "All"],
    ],
    // Initial no order.
  });
}

function deleteFormularid(id) {
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
          url: serverUrl + "stock/deleteFormularbyId",
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
              tableItemFomular(searchParams_[1]);
             
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
