var itemsArrayOrder = [];
var isOnline;
(function ($) {
  itemsArrayOrder = localStorage.getItem("orderDataOld")
    ? JSON.parse(localStorage.getItem("orderDataOld"))
    : [];
  isOnline = window.navigator.onLine;
  if (isOnline) {
    loadTableOrder();
  } else {
  }
})(jQuery);

function loadTableOrder() {
  $("#orderTable").DataTable().clear().destroy();
  if (isOnline) {
    $("#orderTable").DataTable({
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
        url: serverUrl + "/order/dataOrder",
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
          data: "group_name",
        },
        {
          data: null,
          render: function (data, type, row, meta) {
            return (
              "<font>" + data["order_price"] + "/" + data["unit"] + "</font>"
            );
          },
        },
        {
          data: "updated_at",
        },
        {
          data: null,
          render: function (data, type, row, meta) {
            return (
              "<a herf='javascript:void(0);' type='button' class='action_btn' onclick='updateStockData(this.id);' id='" +
              data["id"] +
              "' data-toggle='tooltip' data-placement='top' title='แก้ไขข้อมูล'><i class='far fa-edit'></i></a><a herf='javascript:void(0);' class='action_btn' data-toggle='tooltip' data-placement='top' id='" +
              data["id"] +
              "' onclick='deleteStock(this.id)' title='ลบข้อมูล'><i class='fas fa-trash'></i></a>"
            );
          },
        },
      ],
      columnDefs: [
        {
          targets: 5,
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
    });
  } else {
    $("#orderTable").DataTable().clear().destroy();
    $("#orderTable").DataTable({
      language: {
        search: "<i class='ti-search'></i>",
        searchPlaceholder: "ค้นหา",
        paginate: {
          next: "<i class='ti-arrow-right'></i>",
          previous: "<i class='ti-arrow-left'></i>",
        },
      },
      order: [],
      data: JSON.parse(localStorage.orderDataOld),
      columns: [
        {
          data: null,
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          },
        },
        {
          data: "name",
        },
        {
          data: "group_name",
        },
        {
          data: "pcs",
        },
        {
          data: "MIN",
        },
        {
          data: null,
          render: function (data, type, row, meta) {
            return (
              "<a herf='javascript:void(0);' type='button' class='action_btn' onclick='updateStockData(this.id);' id='" +
              data["id"] +
              "' data-toggle='tooltip' data-placement='top' title='แก้ไขข้อมูล'><i class='far fa-edit'></i></a><a herf='javascript:void(0);' class='action_btn' data-toggle='tooltip' data-placement='top' id='" +
              data["id"] +
              "' onclick='deleteStock(this.id)' title='ลบข้อมูล'><i class='fas fa-trash'></i></a>"
            );
          },
        },
      ],
      columnDefs: [
        {
          targets: 5,
          className: "text-left",
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
}

function offlineTemp() {
    let arr_temp = [];
    localStorage.removeItem("orderDataOld");
    $.ajax({
      url: serverUrl + "/order/getTempOffline",
      method: "get",
      success: function (response) {
        for (index = 0; index < response.data.length; index++) {
          arr_temp = [
            {
              id: response.data[index].id,
              name: response.data[index].name,
              group_id: response.data[index].group_id,
              supplier_id: response.data[index].supplier_id,
              price: response.data[index].price,
              pcs: response.data[index].pcs,
              MAX: response.data[index].MAX,
              MIN: response.data[index].MIN,
              src_picture: response.data[index].src_picture,
              updated_at: response.data[index].updated_at,
            },
          ];
  
          itemsArrayOrder.push(arr_temp[0]);
        }
  
        localStorage.setItem("orderDataOld", JSON.stringify(itemsArrayOrder));
      },
    });
}

function openModalAddOrder() {}
