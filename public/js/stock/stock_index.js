var itemsArray = [];
var itemsArrayOffline = [];
var isOnline;
(function ($) {
  isOnline = window.navigator.onLine;

  if (isOnline) {
    itemsArray = localStorage.getItem("productsOld")
      ? JSON.parse(localStorage.getItem("productsOld"))
      : [];
  } else {
    itemsArrayOffline = localStorage.getItem("productsNew")
      ? JSON.parse(localStorage.getItem("productsNew"))
      : [];
  }
})(jQuery);

function openModalProduct() {
  $(".bd-add-product").modal("show");
}

function closeModalAddStock() {
  $(".bd-add-product").modal("hide");
  $("#addStock")[0].reset();
  $("#addStock").parsley().reset();
  $("#addStock .parsley-required").hide();
}

$("#addStock").submit(function (e) {
  e.preventDefault();
  let product;
  let baseFileProduct;
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
        productname: $("#productname").val(),
        category: $("#category").val(),
        price: $("#price").val(),
        pcs: $("#pcs").val(),
        max: $("#max").val(),
        min: $("#min").val(),
        file_product: $("#file_product_base64").val(),
      },
    ];

    if (isOnline) {
      console.log("Online");
      //old from table
      itemsArray.push(arr_product);
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
          } else {
          }
        },
      });
    } else {
      console.log("Offline");
      //old from table
      itemsArray.push(arr_product);
      localStorage.setItem("productsOld", JSON.stringify(itemsArray));

      // new
      itemsArrayOffline.push(arr_product);
      localStorage.setItem("productsNew", JSON.stringify(itemsArrayOffline));

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
