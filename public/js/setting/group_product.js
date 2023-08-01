var itemsArray = [];
var itemsArrayOffline = [];
var isOnline;
(function ($) {
    isOnline = window.navigator.onLine;

    if (isOnline) {
        itemsArray = localStorage.getItem("groupProductsOld")
            ? JSON.parse(localStorage.getItem("groupProductsOld"))
            : [];
    } else {
        itemsArrayOffline = localStorage.getItem("groupProductsNew")
            ? JSON.parse(localStorage.getItem("groupProductsNew"))
            : [];
    }
})(jQuery);

function openModalGroupProduct() {
    $(".bd-add-group-product").modal("show");
}

function closeModalAddGroupProduct() {
    $(".bd-add-group-product").modal("hide");
    $("#addGroupProduct")[0].reset();
    $("#addGroupProduct").parsley().reset();
    $("#addGroupProduct .parsley-required").hide();
}

$("#addGroupProduct").submit(function (e) {
    e.preventDefault();
    let product;
    var productunit = $("#productunit").parsley();
    var category_name = $("#category_name").parsley();

    if (
        productunit.isValid() &&
        category_name.isValid()
    ) {
        isOnline = window.navigator.onLine;

        arr_product = [
            {
                productunit: $("#productunit").val(),
                category_name: $("#category_name").val(),
            },
        ];

        if (isOnline) {
            console.log("Online");
            //old from table
            itemsArray.push(arr_product);
            localStorage.setItem("groupProductsOld", JSON.stringify(itemsArray));

            // new
            itemsArrayOffline.push(arr_product);
            localStorage.setItem("groupProductsNew", JSON.stringify(itemsArrayOffline));

            productNew = JSON.parse(localStorage.groupProductsNew);

            $.ajax({
                url: serverUrl + "setting/insertGroupProduct",
                method: "post",
                data: {
                    data: productNew,
                },
                cache: false,
                success: function (response) {
                    if (response.message = 'เพิ่มรายการสำเร็จ') {
                        localStorage.removeItem("groupProductsNew");
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
                        $("#addGroupProduct")[0].reset();
                        $("#addGroupProduct").parsley().reset();
                        $("#addGroupProduct .parsley-required").hide();
                    }
                    else {

                    }

                },
            });

        } else {
            console.log("Offline");
            //old from table
            itemsArray.push(arr_product);
            localStorage.setItem("groupProductsOld", JSON.stringify(itemsArray));

            // new
            itemsArrayOffline.push(arr_product);
            localStorage.setItem("groupProductsNew", JSON.stringify(itemsArrayOffline));
        }

        //   var fields__product = $(this).serialize();
    } else {
        productunit.validate();
        category_name.validate();
    }
});