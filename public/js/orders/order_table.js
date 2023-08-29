var area_id = "33";
var table_id = null;
var edit_id = null;
var itemsArrayTableOffline = [];
(function ($) {
  interact(".resize-drag")
    .on("doubletap", function (event) {
      console.log(event.currentTarget.id);
      editItem(event.currentTarget.id);
      event.preventDefault();
    })
    .on("hold", function (event) {
      if (confirm("Delete this table")) {
        deleteTable(event.currentTarget.id);
      }

      event.preventDefault();

      //event.currentTarget.classList.toggle('rotate')
      //event.currentTarget.classList.remove('large')
    })
    .resizable({
      // resize from all edges and corners
      edges: { left: false, right: true, bottom: true, top: false },

      listeners: {
        move(event) {
          // console.log(event.target);
          var target = event.target;
          var x = parseFloat(target.getAttribute("data-x")) || 0;
          var y = parseFloat(target.getAttribute("data-y")) || 0;

          // update the element's style
          target.style.width = event.rect.width + "px";
          target.style.height = event.rect.height + "px";

          // translate when resizing from top or left edges
          x += event.deltaRect.left;
          y += event.deltaRect.top;

          target.style.webkitTransform = target.style.transform =
            "translate(" + x + "px," + y + "px)";

          target.setAttribute("data-x", x);
          target.setAttribute("data-y", y);
          // console.log(
          //   " h --->" +
          //     Math.round(event.rect.width) +
          //     " h->" +
          //     Math.round(event.rect.height)
          // );
          //target.textContent = Math.round(event.rect.width) + '\u00D7' + Math.round(event.rect.height)
        },
      },
      modifiers: [
        // keep the edges inside the parent
        interact.modifiers.restrictEdges({
          outer: "parent",
        }),

        // minimum size
        interact.modifiers.restrictSize({
          min: { width: 100, height: 50 },
        }),
      ],

      inertia: true,
    })
    .draggable({
      listeners: { move: dragMoveListener },
      inertia: true,
      modifiers: [
        interact.modifiers.restrictRect({
          restriction: "parent",
          endOnly: true,
        }),
      ],
    });

  drowTableLoad();
})(jQuery);

function dragMoveListener(event) {
  var target = event.target;
  // console.log(event.target);
  // keep the dragged position in the data-x/data-y attributes
  var x = (parseFloat(target.getAttribute("data-x")) || 0) + event.dx;
  var y = (parseFloat(target.getAttribute("data-y")) || 0) + event.dy;

  // translate the element
  target.style.webkitTransform = target.style.transform =
    "translate(" + x + "px, " + y + "px)";

  // update the posiion attributes
  target.setAttribute("data-x", x);
  target.setAttribute("data-y", y);

  // console.log("x:" + x + " y:" + y);
}
// this function is used later in the resizing and gesture demos
window.dragMoveListener = dragMoveListener;

function deleteTable(itemid) {
  var element = $("#" + itemid);
  element.hide();
  element.attr("data-deleted", "yes");
}

function editItem(itemid) {
  // reset();
  var element = $("#" + itemid);
  $("#table_name").val(element.attr("data-name"));
  $("#table_size").val(element.attr("data-size"));
  if (element.attr("data-rounded") == "yes") {
    $("#table_round").prop("checked", true);
  } else {
    $("#table_round").prop("checked", false);
  }

  edit_id = itemid;

  if (element.attr("data-id")) {
    table_id = element.attr("data-id");
  } else {
    table_id = true; //Since it is edit
  }

  jQuery.noConflict();
  $("#tableModal").modal("toggle");
}

function reset() {
  closeModalTable();
  table_id = null;
  edit_id = null;
}

function saveTable() {
  if (table_id) {
    updateTable();
  } else {
    addTable();
  }
}

function addTable() {
  var tablename = $("#table_name").parsley();
  var table_size = $("#table_size").parsley();

  if (tablename.isValid() && table_size.isValid()) {
    $(".canva").append(
      '<div class="resize-drag ' +
        ($("#table_round").prop("checked") ? "circle" : "") +
        '" id="' +
        Math.floor(Math.random() * 10000 + 1) +
        '" data-rounded="' +
        ($("#table_round").prop("checked") ? "yes" : "no") +
        '" data-name="' +
        $("#table_name").val() +
        '" data-size="' +
        $("#table_size").val() +
        '"  data-x="0" data-y="0" class="resize-drag"><p>' +
        $("#table_name").val() +
        "</p><span>" +
        $("#table_size").val() +
        "ที่นั่ง" +
        "</span></div>"
    );
    reset();
  } else {
    tablename.validate();
    table_size.validate();
  }
}

function updateTable() {
  var element = $("#" + edit_id);
  element.attr("data-name", $("#table_name").val());
  element.attr("data-size", $("#table_size").val());
  $("span:first", element).html($("#table_size").val());
  $("p:first", element).html($("#table_name").val());

  if ($("#table_round").prop("checked")) {
    element.attr("data-rounded", "yes");
    element.addClass("circle");
  } else {
    element.attr("data-rounded", "no");
    element.removeClass("circle");
  }

  reset();
}

function saveFloor() {
  let searchParams = window.location.pathname;
  var searchParams_ = searchParams.split("/order/pageArea/");
  isOnline = window.navigator.onLine;

  $.each($(".canva"), function (i, element) {
    $("div", element).each(function (it, item) {
      var element = $("#" + item.id);
      var item = [
        {
          area_code: searchParams_[1],
          table_id: element.attr("id"),
          x: element.attr("data-x"),
          y: element.attr("data-y"),
          w: element.width() + 44,
          h: element.height() + 44,
          name: element.attr("data-name"),
          deleted: element.attr("data-deleted"),
          rounded: element.attr("data-rounded"),
          size: element.attr("data-size"),
        },
      ];
      itemsArrayTableOffline.push(item);
    });
  });

  if (isOnline) {
    // new
    localStorage.setItem("tablesNew", JSON.stringify(itemsArrayTableOffline));

    tableNew = JSON.parse(localStorage.tablesNew);

    if (itemsArrayTableOffline.length != 0) {
      $.ajax({
        type: "post",
        data: { data: tableNew },
        url: serverUrl + "order/floorplansave/",
        success: function (response) {
          if (response.message == "เพิ่มรายการสำเร็จ") {
            localStorage.removeItem("tablesNew");
            tableNew = [];
            itemsArrayTableOffline = [];
            notif({
              type: "success",
              msg: "เพิ่มรายการสำเร็จ!",
              position: "right",
              fade: true,
              time: 300,
            });
            drowTableLoad();
          } else {
            alert(response.message);
          }
        },
        error: function (response) {
          alert("Error on save");
        },
      });
    } else {
      notif({
        type: "warning",
        msg: "กรุณาเพิ่มโต๊ะ!",
        position: "right",
        fade: true,
        time: 300,
      });
    }
  } else {
  }
}

function openModalAddTable() {
  $(".bd-add-table").modal("show");
  $("#update_table_btn").hide();
  $("#addTable")[0].reset();
  $("#addTable").parsley().reset();
}

function closeModalTable() {
  $(".bd-add-table").modal("hide");
  $("#update_table_btn").hide();
  $("#addTable")[0].reset();
  $("#addTable").parsley().reset();
  $("#nameFormTable").html("<h3>เพิ่มโต๊ะ</h3>");
  $("#addTable .parsley-required").hide();
}

function drowTableLoad() {
  // interact.removeDocument(document);
  let searchParams = window.location.pathname;
  var searchParams_ = searchParams.split("/order/pageArea/");
  isOnline = window.navigator.onLine;

  if (isOnline) {
    $.ajax({
      url: serverUrl + "/order/getTableInArea/" + searchParams_[1],
      method: "get",
      success: function (response) {
        $("#canvaHolder").html("");
        var dataTable = response.data;
        for (var i = 0; i < dataTable.length; i++) {
          
          $(".canva").append(
            '<div class="resize-drag ' +
              (dataTable[i].rounded === 'yes' ? "circle" : "") +
              '" id="' +
              dataTable[i].div_id +
              '" data-rounded="' +
              dataTable[i].rounded +
              '" data-name="' +
              dataTable[i].table_name +
              '" data-size="' +
              dataTable[i].size_table +
              '"  data-x="' +
              dataTable[i].x +
              '" data-y="' +
              dataTable[i].y +
              '" style="transform: translate(' +
              dataTable[i].x +
              "px, " +
              dataTable[i].y +
              "px); width: " +
              dataTable[i].width_div +
              "px; height: " +
              dataTable[i].hight_div +
              'px;" ><p>' +
              dataTable[i].table_name +
              "</p><span>" +
              dataTable[i].size_table +
              " ที่นั่ง" +
              "</span></div>"
          );
        }
      },
    });
  } else {
  }
}
