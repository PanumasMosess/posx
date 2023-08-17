var array_formular_stock_cut = [];
var isOnline;
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
    $("#table_fomular_item tbody")
      .off("click")
      .on("click", "tr", function (e) {
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
  $("#table_fomular_order").DataTable().clear().destroy();
  $("#table_fomular_stock_cut").DataTable().clear().destroy();
  array_formular_stock_cut = [];
  selectOrder();
}

function addListConfirrmCutStock(data) {
  if (array_formular_stock_cut.length != 0) {
    let arr = [];
    arr = array_formular_stock_cut.map((a) => a.id);

    if (arr.includes(data.id)) {
      // console.log(arr);
    } else {
      array_formular_stock_cut.push(data);
    }
  } else {
    array_formular_stock_cut.push(data);
  }

  tableCut();
}

function tableCut() {
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
            "<a herf='javascript:void(0);' type='button' class='action_btn' onclick='deleteListComfirm(this.id);' id='" +
            data["id"] +
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

function deleteListComfirm(data) {
  array_formular_stock_cut = array_formular_stock_cut.filter(
    (item) => item.id !== data
  );
  tableCut();
}

function cancleFormular() {
  array_formular_stock_cut = [];
  tableCut();
}

function formularConfirm() {
  //split order code
  let value = $("#order_select").val();
  let order_split_result = value.split("###");

  //get data from table input
  let data = table_fomular_order_confirm.$("input, text").serialize();
  let str_split = data.replace(/pcs_cut=/g, "");
  let str_split_result = str_split.split("&");

  array_cut_product = [];
  object_cut_product_temp = {};

  for (var i = 0; i < array_formular_stock_cut.length; i++) {
    (object_cut_product_temp = {
      order_code: order_split_result[0],
      stock_code: array_formular_stock_cut[i].stock_code,
      formula_pcs: str_split_result[i],
    }),
      array_cut_product.push(object_cut_product_temp);
  }

  formularStore = JSON.parse(localStorage.getItem("formularNew"))
    ? JSON.parse(localStorage.getItem("formularNew"))
    : [];

  var hash = {};

  if (formularStore.length != 0) {
    array_cut_product.forEach(function (a) {
      hash[a.order_code,a.stock_code, a.formula_pcs] = true;
    });
    formularStore.forEach(function (a) {
      hash[a.order_code,a.stock_code, a.formula_pcs] || array_cut_product.push(a);
    });
  }

  isOnline = window.navigator.onLine;

  if (isOnline) {
    $.ajax({
      url: serverUrl + "stock/insertFormular",
      method: "post",
      data: {
        data: array_cut_product,
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
          array_formular_stock_cut = [];
          tableCut();
          tableFormularPOS();
          localStorage.removeItem("formularNew");
        } else {
        }
      },
    });
  } else {
    localStorage.setItem("formularNew", JSON.stringify(array_cut_product));
    array_cut_product = [];
    array_formular_stock_cut = [];
    tableCut();
  }
}
