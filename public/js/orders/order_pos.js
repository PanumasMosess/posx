var isOnline;
var itemsArrayAreaOffline= [];
var itemsArrayUpdateArea = [];
var itemsArrayDeleteArea = [];
(function ($) {
  isOnline = window.navigator.onLine;
  loadTableAear();
})(jQuery);

function loadTableAear() {
  $("#areaTable").DataTable().clear().destroy();
  if (isOnline) {
    $("#areaTable").DataTable({
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
        url: serverUrl + "/order/dataArea",
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
          data: "area_name",
        },
        {
          data: "updated_at",
        },
        {
          data: null,
          render: function (data, type, row, meta) {
            return (
              "<a herf='" + serverUrl +
              "order/pageArea/" +
              data["area_code"] +
              "' target='popup' onclick=window.open('" +
              serverUrl +
              "order/pageArea/" +
              data["area_code"] + "','popup','width=850,height=700'); type='button' class='action_btn' data-toggle='tooltip' data-placement='top' title='เพิ่มโต๊ะ'><i class='ti-panel'></i></a><a herf='javascript:void(0);' type='button' class='action_btn' onclick='updateAreaData(this.id);' id='" +
              data["id"] +
              "' data-toggle='tooltip' data-placement='top' title='แก้ไขข้อมูล'><i class='ti-pencil-alt'></i></a><a herf='javascript:void(0);' class='action_btn' data-toggle='tooltip' data-placement='top' id='" +
              data["id"] +
              "' onclick='deleteArea(this.id)' title='ลบข้อมูล'><i class='ti-trash'></i></a>"
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
  }
}

function openModalAddArea() {
  $(".bd-add-area").modal("show");
  $("#save_area_btn").show();
  $("#update_area_btn").hide();
}

function closeModalAddArea() {
  $(".bd-add-area").modal("hide");
  $("#update_area_btn").hide();
  $("#addArea")[0].reset();
  $("#addArea").parsley().reset();
  $("#nameFormArea").html("<h3>เพิ่มรายการพื้นที่</h3>");
  $("#addArea .parsley-required").hide();
}

$("#addArea").submit(function (e) {
  e.preventDefault();
  var areaname = $("#areaname").parsley();

  if (
    areaname.isValid() 
  ) {
    isOnline = window.navigator.onLine;

    arr_area = [
      {
        id: "",
        area_code: "",
        area_name: $("#areaname").val(),
        updated_at: "",
      },  
    ];

    if (isOnline) {
      console.log("Online");
      //old from table
      // itemsArrayArea.push(arr_order[0]);
      // localStorage.setItem("areaDataOld", JSON.stringify(itemsArrayArea));

      // new
      itemsArrayAreaOffline.push(arr_area);
      localStorage.setItem("areasNew", JSON.stringify(itemsArrayAreaOffline));

      areaNew = JSON.parse(localStorage.areasNew);

      $.ajax({
        url: serverUrl + "order/insertArea",
        method: "post",
        data: {
          data: areaNew,
        },
        cache: false,
        success: function (response) {
          if ((response.message = "เพิ่มรายการสำเร็จ")) {
             localStorage.removeItem("areasNew");
             areaNew = [];
            itemsArrayAreaOffline = [];
            notif({
              type: "success",
              msg: "เพิ่มรายการสำเร็จ!",
              position: "right",
              fade: true,
              time: 300,
            });
            $(".bd-add-area").modal("hide");
            $("#addArea")[0].reset();
            $("#addArea").parsley().reset();
            $("#addArea .parsley-required").hide();
            loadTableAear();
          } else {
          }
        },
      });
    } else {
      console.log("Offline");
      //old from table
      // itemsArrayOrder.push(arr_order[0]);
      // localStorage.setItem("orderDataOld", JSON.stringify(itemsArrayOrder));

      // new
      // itemsArrayOrderOffline.push(arr_order);
      // localStorage.setItem("ordersNew", JSON.stringify(itemsArrayOrderOffline));

      // $(".bd-add-order").modal("hide");
      // $("#addOrder")[0].reset();
      // $("#addOrder").parsley().reset();
      // $("#addOrder .parsley-required").hide();

      // notif({
      //   type: "success",
      //   msg: "เพิ่มรายการสำเร็จ!",
      //   position: "right",
      //   fade: true,
      //   time: 300,
      // });

      // loadTableOrder();
    }

    //   var fields__product = $(this).serialize();
  } else {
    areaname.validate();
  }
});

function updateAreaData(id) 
{
  $("#update_area_btn").show();
  $("#save_area_btn").hide();
  isOnline = window.navigator.onLine;
  if(isOnline){
    $.ajax({
      url: serverUrl + "/order/getTempUpdateArea/" + id,
      method: "get",
      success: function (response) {
        $(".bd-add-area").modal("show");
        $("#nameFormArea").html("<h3>แก้ไขข้อมูล</h3>");
        $("#areaname").val(response.data.area_name);
        $("#id_db_area").val(response.data.id);
      },
    });
  }else{

  }
}

function submitDataUpdateArea() {
  isOnline = window.navigator.onLine;

  arr_area_update = [
    {
      id: $("#id_db_area").val(),    
      area_name: $("#areaname").val()
    },
  ];

  itemsArrayUpdateArea.push(arr_area_update);

  if (isOnline) {
    $.ajax({
      url: serverUrl + "order/updateArea",
      method: "post",
      data: {
        data: itemsArrayUpdateArea,
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
          itemsArrayUpdateArea = [];
          $(".bd-add-area").modal("hide");
          $("#addArea")[0].reset();
          $("#addArea").parsley().reset();
          $("#nameFormArea").html("<h3>เพิ่มสต็อก</h3>");
          $("#addArea .parsley-required").hide();

          loadTableAear();
        } else {
        }
      },
    });
  } else {}

}

function deleteArea(id)
{
  isOnline = window.navigator.onLine;
  Swal.fire({
    title: "ยกเลิกรายการ",
    text: "คุณต้องยกเลิกพื้นที่นี้ !",
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

      itemsArrayDeleteArea.push(itemsArrayDeleteTemp);

      if (isOnline) {
        $.ajax({
          url: serverUrl + "order/deleteArea",
          method: "post",
          data: {
            data: itemsArrayDeleteArea,
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
              itemsArrayDeleteArea = [];
              itemsArrayDeleteTemp = [];
              // localStorage.removeItem("orderOldDelete");
              loadTableAear();
            } else {
            }
          },
        });
      } else {
        // itemsArrayDelete.push(itemsArrayDeleteTemp);
        // localStorage.setItem(
        //   "orderOldDelete",
        //   JSON.stringify(itemsArrayDelete)
        // );
        // loadTableOrder();
      }
    }
  });
}
