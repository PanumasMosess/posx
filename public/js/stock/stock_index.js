var itemsArray;
var isOnline;
(function ($) {
  isOnline = window.navigator.onLine;
  itemsArray = localStorage.getItem("products")
    ? JSON.parse(localStorage.getItem("products"))
    : [];

  insertLocalProduct();
})(jQuery);
if (isOnline) {
  console.log("Online");
} else {
  console.log("Offline");
}

function insertLocalProduct() {
  localStorage.removeItem("products");
  //   itemsArray = [];

  arr_product = [{ name: "A", price: "B", unit: "C" }];

  itemsArray.push(arr_product);
  localStorage.setItem("products", JSON.stringify(itemsArray));

  let product = JSON.parse(localStorage.products);

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
}

function openModalProduct()
{
    $(".bd-add-product").modal("show");
}

function closeModalAddStock()
{
    $(".bd-add-product").modal("hide");
    $("#addStock")[0].reset();
    $("#addStock").parsley().reset();
    $("#addStock .parsley-required").hide();
}