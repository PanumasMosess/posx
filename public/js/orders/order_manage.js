var itemsArrayOrder = [];
var itemsArrayOrderOffline = [];
var itemsArrayUpdate = [];
var itemsArrayDelete = [];
var isOnline;
(function ($) {
  //   itemsArrayOrder = localStorage.getItem("orderDataOld")
  //     ? JSON.parse(localStorage.getItem("orderDataOld"))
  //     : [];
  isOnline = window.navigator.onLine;

  if (isOnline) {
    updateStoreToOnline();
    loadTableOrder();
    offlineTemp();
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
              "<a herf='javascript:void(0);' type='button' class='action_btn' onclick='updateOrderData(this.id);' id='" +
              data["id"] +
              "' data-toggle='tooltip' data-placement='top' title='แก้ไขข้อมูล'><i class='far fa-edit'></i></a><a herf='javascript:void(0);' class='action_btn' data-toggle='tooltip' data-placement='top' id='" +
              data["id"] +
              "' onclick='deleteOrder(this.id)' title='ลบข้อมูล'><i class='fas fa-trash'></i></a>"
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
              "<a herf='javascript:void(0);' type='button' class='action_btn' onclick='updateOrderData(this.id);' id='" +
              data["id"] +
              "' data-toggle='tooltip' data-placement='top' title='แก้ไขข้อมูล'><i class='far fa-edit'></i></a><a herf='javascript:void(0);' class='action_btn' data-toggle='tooltip' data-placement='top' id='" +
              data["id"] +
              "' onclick='deleteOrder(this.id)' title='ลบข้อมูล'><i class='fas fa-trash'></i></a>"
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

function encodeImgtoBase64(element) {
  var img = element.files[0];
  var reader = new FileReader();
  reader.onloadend = function () {
    $("#file_order_base64").val(reader.result);
  };
  reader.readAsDataURL(img);
}

function offlineTemp() {
  let arr_temp = [];
  localStorage.removeItem("orderDataOld");

  $.ajax({
    url: serverUrl + "/stock/groupData",
    method: "get",
    success: function (response) {
      var category_order = $("#category_order");
      category_order.html('<option value="">category_order</option>');
      $.each(response.data, function (index, item) {
        category_order.append(
          $('<option style="color: #000;"></option>')
            .val(item.id)
            .html(item.name)
        );
      });
    },
  });

  $.ajax({
    url: serverUrl + "/order/getTempOfflineOrder",
    method: "get",
    success: function (response) {
      for (index = 0; index < response.data.length; index++) {
        arr_temp = [
          {
            id: response.data[index].id,
            order_code: response.data[index].order_code,
            order_name: response.data[index].order_name,
            order_des: response.data[index].order_des,
            order_price: response.data[index].order_price,
            order_pcs: response.data[index].order_pcs,
            order_status: response.data[index].order_status,
            src_order_picture: response.data[index].src_order_picture,
            group_id: response.data[index].group_id,
            updated_at: response.data[index].updated_at,
            group_name: response.data[index].group_name,
            unit: response.data[index].unit,
          },
        ];

        itemsArrayOrder.push(arr_temp[0]);
      }

      localStorage.setItem("orderDataOld", JSON.stringify(itemsArrayOrder));
    },
  });
}

function openModalAddOrder() {
  $(".bd-add-order").modal("show");
  $("#save_order_btn_order").show();
  $("#update_oreder_btn").hide();
}

function closeModalAddOrder() {
  $(".bd-add-order").modal("hide");
  $("#update_oreder_btn").hide();
  $("#addOrder")[0].reset();
  $("#addOrder").parsley().reset();
  $("#nameForm").html("<h3>เพิ่มรายการสินค้า</h3>");
  $("#addOrder .parsley-required").hide();
  $("input:checkbox").removeAttr("checked");
}

$("#addOrder").submit(function (e) {
  e.preventDefault();
  var ordername = $("#ordername").parsley();
  var category_order = $("#category_order").parsley();
  var price = $("#price").parsley();
  var file_order = $("#file_order").parsley();

  if (
    ordername.isValid() &&
    category_order.isValid() &&
    price.isValid() &&
    file_order.isValid()
  ) {
    isOnline = window.navigator.onLine;

    var dataRecomendCheck;
    if ($("#recommendedMenu").is(":checked")) {
      dataRecomendCheck = 1;
    } else {
      dataRecomendCheck = 0;
    }

    arr_order = [
      {
        id: "",
        order_code: "",
        order_name: $("#ordername").val(),
        order_des: $("#des_order").val(),
        order_price: $("#price").val(),
        order_pcs: "",
        order_status: "",
        src_order_picture: $("#file_order_base64").val(),
        group_id: $("#category_order").val(),
        updated_at: "",
        group_name: "",
        unit: "",
        recommended: dataRecomendCheck,
      },
    ];

    if (isOnline) {
      console.log("Online");
      //old from table
      itemsArrayOrder.push(arr_order[0]);
      localStorage.setItem("orderDataOld", JSON.stringify(itemsArrayOrder));

      // new
      itemsArrayOrderOffline.push(arr_order);
      localStorage.setItem("ordersNew", JSON.stringify(itemsArrayOrderOffline));

      orderNew = JSON.parse(localStorage.ordersNew);
      console.log(orderNew);

      $.ajax({
        url: serverUrl + "order/insertOrder",
        method: "post",
        data: {
          data: orderNew,
        },
        cache: false,
        success: function (response) {
          if ((response.message = "เพิ่มรายการสำเร็จ")) {
            localStorage.removeItem("ordersNew");
            orderNew = [];
            itemsArrayOrderOffline = [];
            notif({
              type: "success",
              msg: "เพิ่มรายการสำเร็จ!",
              position: "right",
              fade: true,
              time: 300,
            });
            $(".bd-add-order").modal("hide");
            $("#addOrder")[0].reset();
            $("#addOrder").parsley().reset();
            $("#addOrder .parsley-required").hide();
            $("input:checkbox").removeAttr("checked");
            loadTableOrder();
          } else {
          }
        },
      });
    } else {
      console.log("Offline");
      //old from table
      itemsArrayOrder.push(arr_order[0]);
      localStorage.setItem("orderDataOld", JSON.stringify(itemsArrayOrder));

      // new
      itemsArrayOrderOffline.push(arr_order);
      localStorage.setItem("ordersNew", JSON.stringify(itemsArrayOrderOffline));

      $(".bd-add-order").modal("hide");
      $("#addOrder")[0].reset();
      $("#addOrder").parsley().reset();
      $("#addOrder .parsley-required").hide();
      $("input:checkbox").removeAttr("checked");

      notif({
        type: "success",
        msg: "เพิ่มรายการสำเร็จ!",
        position: "right",
        fade: true,
        time: 300,
      });

      loadTableOrder();
    }

    //   var fields__product = $(this).serialize();
  } else {
    ordername.validate();
    category_order.validate();
    price.validate();
    file_order.validate();
  }
});

function updateOrderData(data) {
  $("#update_oreder_btn").show();
  $("#save_order_btn_order").hide();
  isOnline = window.navigator.onLine;
  if (isOnline) {
    $.ajax({
      url: serverUrl + "/order/getTempUpdate/" + data,
      method: "get",
      success: function (response) {
        $(".bd-add-order").modal("show");
        $("#nameForm").html("<h3>แก้ไขข้อมูล</h3>");
        $("#ordername").val(response.data.order_name);
        $("#category_order").val(response.data.group_id);
        $("#des_order").val(response.data.order_des);
        $("#price").val(response.data.order_price);
        $("#file_old_name_order").val(response.data.src_order_picture);
        $("#id_db_order").val(response.data.id);
        if (response.data.order_menu_recommended == 1) {
          $("#recommendedMenu").attr("checked", true);
        }
      },
    });
  } else {
    $(".bd-add-order").modal("show");
    $("#nameForm").html("<h3>แก้ไขข้อมูล</h3>");
    array_temp_update = [];
    array_temp_update.push(JSON.parse(localStorage.orderDataOld));
    array_temp_update = array_temp_update[0];
    for (i_temp = 0; i_temp < array_temp_update.length; i_temp++) {
      if (array_temp_update[i_temp]["id"] == data) {
        $("#ordername").val(array_temp_update[i_temp]["order_name"]);
        $("#category_order").val(array_temp_update[i_temp]["group_id"]);
        $("#des_order").val(array_temp_update[i_temp]["order_des"]);
        $("#price").val(array_temp_update[i_temp]["order_price"]);
        $("#file_old_name_order").val(
          array_temp_update[i_temp]["src_order_picture"]
        );
        if (array_temp_update[i_temp]["order_menu_recommended"] === 1) {
          $("#recommendedMenu").attr("checked", true);
        }
        $("#id_db_order").val(data);
      }
    }
  }
}

function submitDataUpdateOrder() {
  isOnline = window.navigator.onLine;

  var dataRecomendCheck;
  if ($("#recommendedMenu").is(":checked")) {
    dataRecomendCheck = 1;
  } else {
    dataRecomendCheck = 0;
  }

  arr_product_update = [
    {
      id: $("#id_db_order").val(),
      order_code: "",
      order_name: $("#ordername").val(),
      order_des: $("#des_order").val(),
      order_price: $("#price").val(),
      order_pcs: "",
      order_status: "",
      src_order_picture: $("#file_order_base64").val(),
      old_src_order_picture: $("#file_old_name_order").val(),
      group_id: $("#category_order").val(),
      updated_at: "",
      group_name: "",
      unit: "",
      recommended: dataRecomendCheck,
    },
  ];

  itemsArrayUpdate.push(arr_product_update);

  if (isOnline) {
    $.ajax({
      url: serverUrl + "order/updateOrder",
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
          localStorage.removeItem("orderDataOldUpdate");
          $(".bd-add-order").modal("hide");
          $("#addOrder")[0].reset();
          $("#addOrder").parsley().reset();
          $("#nameForm").html("<h3>เพิ่มสต็อก</h3>");
          $("#addOrder .parsley-required").hide();
          $("input:checkbox").removeAttr("checked");

          loadTableOrder();
        } else {
        }
      },
    });
  } else {
    itemsArrayUpdate.push(arr_product_update);
    localStorage.setItem(
      "orderDataOldUpdate",
      JSON.stringify(itemsArrayUpdate)
    );
    notif({
      type: "success",
      msg: "แก้ไขรายการสำเร็จ!",
      position: "right",
      fade: true,
      time: 300,
    });
    $(".bd-add-order").modal("hide");
    $("#addOrder")[0].reset();
    $("#addOrder").parsley().reset();
    $("#nameForm").html("<h3>เพิ่มรายการสินค้า</h3>");
    $("#addOrder .parsley-required").hide();
    $("input:checkbox").removeAttr("checked");
    loadTableOrder();
  }
}

function deleteOrder(id) {
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
          url: serverUrl + "order/deleteOrder",
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
              localStorage.removeItem("orderOldDelete");
              loadTableOrder();
            } else {
            }
          },
        });
      } else {
        itemsArrayDelete.push(itemsArrayDeleteTemp);
        localStorage.setItem(
          "orderOldDelete",
          JSON.stringify(itemsArrayDelete)
        );
        loadTableOrder();
      }
    }
  });
}

function updateStoreToOnline() {
  ordersNew = JSON.parse(localStorage.getItem("ordersNew"))
    ? JSON.parse(localStorage.getItem("ordersNew"))
    : [];
  orderDataOldUpdate = JSON.parse(localStorage.getItem("orderDataOldUpdate"))
    ? JSON.parse(localStorage.getItem("orderDataOldUpdate"))
    : [];
  orderOldDelete = JSON.parse(localStorage.getItem("orderOldDelete"))
    ? JSON.parse(localStorage.getItem("orderOldDelete"))
    : [];

  if (ordersNew.length != 0) {
    $.ajax({
      url: serverUrl + "order/insertOrder",
      method: "post",
      data: {
        data: ordersNew,
      },
      cache: false,
      success: function (response) {
        if ((response.message = "เพิ่มรายการสำเร็จ")) {
          localStorage.removeItem("ordersNew");
        } else {
        }
      },
    });
    ordersNew = [];
  } else if (orderDataOldUpdate != 0) {
    $.ajax({
      url: serverUrl + "order/updateOrder",
      method: "post",
      data: {
        data: orderDataOldUpdate,
      },
      cache: false,
      success: function (response) {
        if ((response.message = "แก้ไขรายการสำเร็จ")) {
          localStorage.removeItem("orderDataOldUpdate");
        } else {
        }
      },
    });
    orderDataOldUpdate = [];
  } else if (orderOldDelete != 0) {
    $.ajax({
      url: serverUrl + "order/deleteOrder",
      method: "post",
      data: {
        data: orderOldDelete,
      },
      cache: false,
      success: function (response) {
        if ((response.message = "ลบรายการสำเร็จ")) {
          itemsArrayDelete = [];
          itemsArrayDeleteTemp = [];
          localStorage.removeItem("orderOldDelete");
        } else {
        }
      },
    });
  }
}
