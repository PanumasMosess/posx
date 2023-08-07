var itemsArray = [];
var itemsArrayOffline = [];
var itemsArrayUpdate = [];
var itemsArrayDelete = [];
var isOnline;
(function ($) {
  isOnline = window.navigator.onLine;

  if (isOnline) {
    offlineTemp();
    updateStoreToOnline();
    itemsArray = localStorage.getItem("productsOld")
      ? JSON.parse(localStorage.getItem("productsOld"))
      : [];
  } else {
    itemsArrayOffline = localStorage.getItem("productsNew")
      ? JSON.parse(localStorage.getItem("productsNew"))
      : [];
  }
  loadTableStock();
})(jQuery);

function openModalProduct() {
  $(".bd-add-product").modal("show");
  $("#save_stock_btn").show();
  $("#update_stock_btn").hide();
}

function closeModalAddStock() {
  $(".bd-add-product").modal("hide");
  $("#update_stock_btn").hide();
  $("#addStock")[0].reset();
  $("#pcs").prop("disabled", false);
  $("#addStock").parsley().reset();
  $("#nameForm").html("<h3>เพิ่มสต็อก</h3>");
  $("#addStock .parsley-required").hide();
}

$("#addStock").submit(function (e) {
  e.preventDefault();
  var productname = $("#productname").parsley();
  var category = $("#category").parsley();
  var price = $("#price").parsley();
  var pcs = $("#pcs").parsley();
  var max = $("#max").parsley();
  var min = $("#min").parsley();
  var file_product = $("#file_product").parsley();

  if (
    productname.isValid() &&
    category.isValid() &&
    price.isValid() &&
    pcs.isValid() &&
    max.isValid() &&
    min.isValid() &&
    file_product.isValid()
  ) {
    isOnline = window.navigator.onLine;

    arr_product = [
      {
        id: "",
        name: $("#productname").val(),
        group_id: $("#category").val(),
        price: $("#price").val(),
        pcs: $("#pcs").val(),
        MAX: $("#max").val(),
        MIN: $("#min").val(),
        src_picture: $("#file_product_base64").val(),
        updated_at: "",
      },
    ];

    if (isOnline) {
      console.log("Online");
      //old from table
      itemsArray.push(arr_product[0]);
      localStorage.setItem("productsOld", JSON.stringify(itemsArray));

      // new
      itemsArrayOffline.push(arr_product);
      localStorage.setItem("productsNew", JSON.stringify(itemsArrayOffline));

      productNew = JSON.parse(localStorage.productsNew);

      $.ajax({
        url: serverUrl + "stock/insertProduct",
        method: "post",
        data: {
          data: productNew,
        },
        cache: false,
        success: function (response) {
          if ((response.message = "เพิ่มรายการสำเร็จ")) {
            localStorage.removeItem("productsNew");
            productNew = [];
            itemsArrayOffline = [];
            notif({
              type: "success",
              msg: "เพิ่มรายการสำเร็จ!",
              position: "right",
              fade: true,
              time: 300,
            });
            $(".bd-add-product").modal("hide");
            $("#addStock")[0].reset();
            $("#addStock").parsley().reset();
            $("#addStock .parsley-required").hide();
            loadTableStock();
          } else {
          }
        },
      });
    } else {
      console.log("Offline");
      //old from table
      itemsArray.push(arr_product[0]);
      localStorage.setItem("productsOld", JSON.stringify(itemsArray));

      // new
      itemsArrayOffline.push(arr_product);
      localStorage.setItem("productsNew", JSON.stringify(itemsArrayOffline));

      $(".bd-add-product").modal("hide");
      $("#addStock")[0].reset();
      $("#addStock").parsley().reset();
      $("#addStock .parsley-required").hide();

      notif({
        type: "success",
        msg: "เพิ่มรายการสำเร็จ!",
        position: "right",
        fade: true,
        time: 300,
      });

      loadTableStock();
    }

    //   var fields__product = $(this).serialize();
  } else {
    productname.validate();
    category.validate();
    price.validate();
    pcs.validate();
    max.validate();
    min.validate();
    file_product.validate();
  }
});

function encodeImgtoBase64(element) {
  var img = element.files[0];
  var reader = new FileReader();
  reader.onloadend = function () {
    $("#file_product_base64").val(reader.result);
  };
  reader.readAsDataURL(img);
}

function loadTableStock() {
  isOnline = window.navigator.onLine;
  $("#stockTable").DataTable().clear().destroy();
  if (isOnline) {
    $("#stockTable").DataTable({
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
        url: serverUrl + "/stock/dataStock",
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
          data: "group_id",
        },
        {
          data: "MIN",
        },
        {
          data: "MIN",
        },
        {
          data: "price",
        },
        {
          data: "updated_at",
        },
        {
          data: null,
          render: function (data, type, row, meta) {
            return '<a href="#" >View Transaction</a>';
          },
        },
        {
          data: null,
          render: function (data, type, row, meta) {
            return (
              "<a herf='javascript:void(0);' type='button' class='action_btn' onclick='adjustStockData(this.id);' id='" +
              data["id"] +
              "' data-toggle='tooltip' data-placement='top' title='เพิ่ม/ปรับสต็อก'><i class='ti-split-v'></i></a><a herf='javascript:void(0);' type='button' class='action_btn' onclick='updateStockData(this.id);' id='" +
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
          targets: 8,
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
      // Processing indicator
      processing: true,
      // DataTables server-side processing mode
      serverSide: true,
      // Initial no order.
    });
  } else {
    $("#stockTable").DataTable().clear().destroy();
    $("#stockTable").DataTable({
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
          data: "group_id",
        },
        {
          data: "MIN",
        },
        {
          data: "MIN",
        },
        {
          data: "price",
        },
        {
          data: "updated_at",
        },
        {
          data: null,
          render: function (data, type, row, meta) {
            return '<a href="#" >View Transaction</a>';
          },
        },
        {
          data: null,
          render: function (data, type, row, meta) {
            return (
              "<a herf='javascript:void(0);' type='button' class='action_btn' onclick='adjustStockData(this.id);' id='" +
              data["id"] +
              "' data-toggle='tooltip' data-placement='top' title='เพิ่ม/ปรับสต็อก'><i class='ti-split-v'></i></a><a herf='javascript:void(0);' type='button' class='action_btn' onclick='updateStockData(this.id);' id='" +
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
          targets: 8,
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
}

function offlineTemp() {
  $("#update_stock_btn").hide();
  // localStorage.removeItem("productsOld");
  let arr_temp = [];
  localStorage.removeItem("productsOld");
  $.ajax({
    url: serverUrl + "/stock/getTempOffline",
    method: "get",
    success: function (response) {
      for (index = 0; index < response.data.length; index++) {
        arr_temp = [
          {
            id: response.data[index].id,
            name: response.data[index].name,
            group_id: response.data[index].group_id,
            price: response.data[index].price,
            pcs: response.data[index].pcs,
            MAX: response.data[index].MAX,
            MIN: response.data[index].MIN,
            src_picture: response.data[index].src_picture,
            updated_at: response.data[index].updated_at,
          },
        ];

        itemsArray.push(arr_temp[0]);
      }

      localStorage.setItem("productsOld", JSON.stringify(itemsArray));
    },
  });

  $.ajax({
    url: serverUrl + "/stock/groupData",
    method: "get",
    success: function (response) {
      var category = $("#category");
      category.html('<option value="">category</option>');
      $.each(response.data, function (index, item) {
        category.append(
          $('<option style="color: #000;"></option>')
            .val(item.id)
            .html(item.name)
        );
      });
    },
  });
}

function updateStockData(data) {
  $("#save_stock_btn").hide();
  $("#update_stock_btn").show();
  isOnline = window.navigator.onLine;
  if (isOnline) {
    $.ajax({
      url: serverUrl + "/stock/getTempUpdate/" + data,
      method: "get",
      success: function (response) {
        $(".bd-add-product").modal("show");
        $("#nameForm").html("<h3>แก้ไขข้อมูล</h3>");
        $("#productname").val(response.data.name);
        $("#category").val(response.data.group_id);
        $("#price").val(response.data.price);
        $("#pcs").val(response.data.pcs);
        $("#pcs").prop("disabled", true);
        $("#max").val(response.data.MAX);
        $("#min").val(response.data.MIN);
        $("#file_oldname").val(response.data.src_picture);
        $("#id_db").val(response.data.id);
      },
    });
  } else {
    $(".bd-add-product").modal("show");
    $("#nameForm").html("<h3>แก้ไขข้อมูล</h3>");
    array_temp_update = [];
    array_temp_update.push(JSON.parse(localStorage.productsOld));
    array_temp_update = array_temp_update[0];
    for (i_temp = 0; i_temp < array_temp_update.length; i_temp++) {
      if (array_temp_update[i_temp]["id"] == data) {
        $("#productname").val(array_temp_update[i_temp]["name"]);
        $("#category").val(array_temp_update[i_temp]["group_id"]);
        $("#price").val(array_temp_update[i_temp]["price"]);
        $("#pcs").val(array_temp_update[i_temp]["pcs"]);
        $("#pcs").prop("disabled", true);
        $("#max").val(array_temp_update[i_temp]["MAX"]);
        $("#min").val(array_temp_update[i_temp]["MIN"]);
        $("#file_oldname").val(array_temp_update[i_temp]["src_picture"]);
        $("#id_db").val(data);
      }
    }
  }
}

function submitDataUpdate() {
  isOnline = window.navigator.onLine;

  arr_product_update = [
    {
      id: $("#id_db").val(),
      name: $("#productname").val(),
      group_id: $("#category").val(),
      price: $("#price").val(),
      pcs: $("#pcs").val(),
      MAX: $("#max").val(),
      MIN: $("#min").val(),
      src_picture: $("#file_product_base64").val(),
      old_src_picture: $("#file_oldname").val(),
    },
  ];

  itemsArrayUpdate.push(arr_product_update);

  if (isOnline) {
    $.ajax({
      url: serverUrl + "stock/updateProduct",
      method: "post",
      data: {
        data: itemsArrayUpdate,
      },
      cache: false,
      success: function (response) {
        if ((response.message = "แก้ไขรายการสำเร็จ")) {
          notif({
            type: "success",
            msg: "แก้ไขรายการสำเร็จ!",
            position: "right",
            fade: true,
            time: 300,
          });
          //clear after update
          itemsArrayUpdate = [];
          localStorage.removeItem("productsOldUpdate");
          $(".bd-add-product").modal("hide");
          $("#addStock")[0].reset();
          $("#addStock").parsley().reset();
          $("#pcs").prop("disabled", false);
          $("#nameForm").html("<h3>เพิ่มสต็อก</h3>");
          $("#addStock .parsley-required").hide();

          loadTableStock();
        } else {
        }
      },
    });
  } else {
    itemsArrayUpdate.push(arr_product_update);
    localStorage.setItem("productsOldUpdate", JSON.stringify(itemsArrayUpdate));
    $(".bd-add-product").modal("hide");
    $("#addStock")[0].reset();
    $("#addStock").parsley().reset();
    $("#pcs").prop("disabled", false);
    $("#nameForm").html("<h3>เพิ่มสต็อก</h3>");
    $("#addStock .parsley-required").hide();
    loadTableStock();
  }
}

function deleteStock(id) {
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
      itemsArrayDeleteTemp = [
        {
          id: id,
        },
      ];

      itemsArrayDelete.push(itemsArrayDeleteTemp);

      if (isOnline) {
        $.ajax({
          url: serverUrl + "stock/deleteProduct",
          method: "post",
          data: {
            data: itemsArrayDelete,
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
              itemsArrayDelete = [];
              itemsArrayDeleteTemp = [];
              localStorage.removeItem("productsOldDelete");
              loadTableStock();
            } else {
            }
          },
        });
      } else {
        itemsArrayDelete.push(itemsArrayDeleteTemp);
        localStorage.setItem(
          "productsOldDelete",
          JSON.stringify(itemsArrayDelete)
        );
        loadTableStock();
      }
    }
  });
}

function adjustStockData(id) {
  $(".bd-adjust-product").modal("show");  
  $.ajax({
    url: serverUrl + "/stock/getTempAdjust/" + id,
    method: "get",
    success: function (response) {
      $(".bd-adjust-product").modal("show");  
      $("#pcs_adjust").val(response.data.pcs);
    },
  });
}

function updateStoreToOnline() {
  productsNew = JSON.parse(localStorage.getItem("productsNew"))
    ? JSON.parse(localStorage.getItem("productsNew"))
    : [];
  productsOldUpdate = JSON.parse(localStorage.getItem("productsOldUpdate"))
    ? JSON.parse(localStorage.getItem("productsOldUpdate"))
    : [];
  productsOldDelete = JSON.parse(localStorage.getItem("productsOldDelete"))
    ? JSON.parse(localStorage.getItem("productsOldDelete"))
    : [];

  if (productsNew.length != 0) {
    $.ajax({
      url: serverUrl + "stock/insertProduct",
      method: "post",
      data: {
        data: productsNew,
      },
      cache: false,
      success: function (response) {
        if ((response.message = "เพิ่มรายการสำเร็จ")) {
          localStorage.removeItem("productsNew");
          productsNew = [];
          itemsArrayOffline = [];
          loadTableStock();
        } else {
        }
      },
    });
    productsNew = [];
  } else if (productsOldUpdate != 0) {
    $.ajax({
      url: serverUrl + "stock/updateProduct",
      method: "post",
      data: {
        data: productsOldUpdate,
      },
      cache: false,
      success: function (response) {
        if ((response.message = "แก้ไขรายการสำเร็จ")) {
          itemsArrayUpdate = [];
          localStorage.removeItem("productsOldUpdate");
          loadTableStock();
        } else {
        }
      },
    });
    productsOldUpdate = [];
  } else if (productsOldDelete != 0) {
    $.ajax({
      url: serverUrl + "stock/deleteProduct",
      method: "post",
      data: {
        data: productsOldDelete,
      },
      cache: false,
      success: function (response) {
        localStorage.removeItem("productsOldDelete");
        itemsArrayDelete = [];
        productsOldUpdate = [];
      },
    });
  }
}

function closeModalAdjustStock(){
  $(".bd-adjust-product").modal("hide");
  $("#adjustStock")[0].reset();
}
