var itemsArray;
var itemsArrayOffline;
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
  var productname = $("#productname").parsley();
  var category = $("#category").parsley();
  var price = $("#price").parsley();
  var pcs = $("#pcs").parsley();
  var max = $("#max").parsley();
  var min = $("#min").parsley();

  if (
    productname.isValid() &&
    category.isValid() &&
    price.isValid() &&
    pcs.isValid() &&
    max.isValid() &&
    min.isValid()
  ) {
    localStorage.removeItem("productsNew");
    //   itemsArray = [];
    arr_product = [
      {
        name_product: $("#productname").val(),
        category: $("#category").val(),
        price: $("#price").val(),
        pcs: $("#pcs").val(),
        max: $("#max").val(),
        min: $("#min").val(),
      },
    ];

    if (isOnline) {
      itemsArray.push(arr_product);
      localStorage.setItem("productsOld", JSON.stringify(itemsArray));
      product = JSON.parse(localStorage.productsOld);
      console.log("Online");
    } else {
      itemsArrayOffline.push(arr_product);
      localStorage.setItem("productsNew", JSON.stringify(itemsArrayOffline));
      product = JSON.parse(localStorage.productsNew);
      console.log("Offline");
    }

    //   var fields__product = $(this).serialize();

    $.ajax({
      url: serverUrl + "/stock/insertProduct",
      method: "post",
      data: {
        data: product,
      },
      cache: false,
      success: function (response) {},
    });
  } else {
    productname.validate();
    category.validate();
    price.validate();
    pcs.validate();
    max.validate();
    min.validate();
  }
});
