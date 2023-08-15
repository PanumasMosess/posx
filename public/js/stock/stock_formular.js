var array_formular_stock_cut = [];
(function ($) {
  selectOrder();
})(jQuery);

function selectOrder() {
  $.ajax({
    url: serverUrl + "/stock/orderData",
    method: "get",
    success: function (response) {
      //init order select
      var order_select = $("#order_select");
      order_select.html('<option value="">เลือกสินค้า</option>');
      $.each(response.data, function (index, item) {
        order_select.append(
          $('<option style="color: #000;"></option>')
            .val(item.order_code + "###" + item.order_name)
            .html(item.order_name)
        );
      });
      $("#order_select").niceSelect("destroy");
      order_select.niceSelect();
    },
  });
}

var orderSelect = $("#order_select");
orderSelect.on("change", function () {
  let value = $("#order_select").val();
  getTableStockByselect(value);
  getTableFormularProductItem(value);
});

function getTableStockByselect(code_order) {
  var table_stock_formular = null;
  if (code_order != "") {
    isOnline = window.navigator.onLine;
    if (isOnline) {
      // $("#table_fomular_item").DataTable().clear().destroy();
      table_stock_formular = $("#table_fomular_item").DataTable({
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
          url: serverUrl + "/stock/dataStockFormular",
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
            data: "name",
          },
          {
            data: "pcs",
          },
        ],
        columnDefs: [
          {
            targets: 2,
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
      $("#table_fomular_item").DataTable().clear().destroy();
      table_stock_formular = $("#table_fomular_item").DataTable({
        language: {
          search: "<i class='ti-search'></i>",
          searchPlaceholder: "ค้นหา",
          paginate: {
            next: "<i class='ti-arrow-right'></i>",
            previous: "<i class='ti-arrow-left'></i>",
          },
        },
        order: [],
        data: JSON.parse(localStorage.productsOld),
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
            data: "pcs",
          },
        ],
        columnDefs: [
          {
            targets: 2,
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
    $("#table_fomular_item tbody").off('click').on("click", "tr", function (e) {  
     let data = table_stock_formular.row(this).data();
      addListConfirrmCutStock(data);
    });
  } else {
    // Other statement.
    reloadFomularOrder();
  }
}

function getTableFormularProductItem(data) {
  var str_split = data;
  var str_split_result = str_split.split("###");
  arr_temp_order = [];
  arr_temp_order = [
    {
      order_code: str_split_result[0],
      order_name: str_split_result[1],
    },
  ];
  // localStorage.setItem("productsFormular", JSON.stringify(arr_temp_order));

  if (data != "") {
    $("#table_fomular_order").DataTable().clear().destroy();
    table_stock_formular = $("#table_fomular_order").DataTable({
      language: {
        paginate: {
          next: "<i class='ti-arrow-right'></i>",
          previous: "<i class='ti-arrow-left'></i>",
        },
      },
      order: [],
      data: arr_temp_order,
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
              "<a herf='javascript:void(0);' type='button' class='action_btn' onclick='reloadFomularOrder(this.id);' id='" +
              data["order_code"] +
              "###" +
              data["order_name"] +
              "' data-toggle='tooltip' data-placement='top' title='ลบ'><i class='fas fa-trash'></i></a>"
            );
          },
        },
      ],
      columnDefs: [
        {
          targets: 2,
          className: "text-center",
        },
      ],
      responsive: true,
      searching: false,
      info: false,
      paging: false,
      // Initial no order.
    });
  } else {
    reloadFomularOrder();
  }
}

function reloadFomularOrder(data) {
  $("#table_fomular_item").DataTable().clear().destroy();
  $('#table_fomular_item tbody').empty();
  $("#table_fomular_order").DataTable().clear().destroy();
  $('#table_fomular_order tbody').empty();
  $("#table_fomular_stock_cut").DataTable().clear().destroy();
  $('#table_fomular_stock_cut tbody').empty();
  selectOrder();
}

function addListConfirrmCutStock(data) {
  array_formular_stock_cut.push(data);

  $("#table_fomular_stock_cut").DataTable().clear().destroy();
  table_fomular_order_confirm = $("#table_fomular_stock_cut").DataTable({
    language: {
      paginate: {
        next: "<i class='ti-arrow-right'></i>",
        previous: "<i class='ti-arrow-left'></i>",
      },
    },
    order: [],
    data: array_formular_stock_cut,
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
        data: null,
        render: function (data, type, row, meta) {
          return (
            "<div class='input-group'>" +
            "<input type='number' class='form-control' pattern='/^-?d+.?d*$/' onKeyPress='if(this.value.length==10) return false;' id='pcs_cut' name='pcs_cut' placeholder='กรอกจำนวน' required>" +
            "<div class='input-group-text'><span class id='basic-addon1'>" +
            data["unit"] +
            "</span></div></div>"
          );
        },
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          return (
            "<a herf='javascript:void(0);' type='button' class='action_btn' onclick='reloadFomularOrder(this.id);' id='" +
            data["order_code"] +
            "###" +
            data["order_name"] +
            "' data-toggle='tooltip' data-placement='top' title='ลบ'><i class='fas fa-trash'></i></a>"
          );
        },
      },
    ],
    columnDefs: [
      {
        targets: 2,
        className: "text-center",
      },
    ],
    responsive: true,
    searching: false,
    info: false,
    paging: false,
    // Initial no order.
  });
}
