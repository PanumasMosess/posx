var isOnline;
(function ($) {
  selectArea();
  interact(".resize-drag")
    .on("tap", function (event) {
        console.log("Tab");
      event.preventDefault();
    })
    .resizable({
      // resize from all edges and corners
      edges: { left: false, right: false, bottom: false, top: false },

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
    .draggable(false, 
    //     {
    //   listeners: { move: dragMoveListener },
    //   inertia: true,
    //   modifiers: [
    //     interact.modifiers.restrictRect({
    //       restriction: "parent",
    //       endOnly: true,
    //     }),
    //   ],
    // }
    );
})(jQuery);

function selectArea() {
  $.ajax({
    url: serverUrl + "/order/areaData",
    method: "get",
    success: function (response) {
      //init order select
      var area_select = $("#area_select");
      area_select.html('<option value="">เลือกพื้นที่</option>');
      $.each(response.data, function (index, item) {
        area_select.append(
          $('<option style="color: #000;"></option>')
            .val(item.area_code + "###" + item.area_name)
            .html(item.area_name)
        );
      });
      $("#area_select").niceSelect("destroy");
      area_select.niceSelect();
    },
  });
}

var area_select = $("#area_select");
area_select.on("change", function () {
  let value = $("#area_select").val();
  if (value != "") {
    drowTableLoad(value);
  } else {
    $("#canvaHolder").html("");
  }
});

function drowTableLoad(data) {
  // interact.removeDocument(document);
  var str_split = data;
  var str_split_result = str_split.split("###");
  var area_code = str_split_result[0];
  isOnline = window.navigator.onLine;

  if (isOnline) {
    $.ajax({
      url: serverUrl + "/order/getTableInArea/" + area_code,
      method: "get",
      success: function (response) {
        $("#canvaHolder").html("");
        var dataTable = response.data;
        for (var i = 0; i < dataTable.length; i++) {
          $(".canva").append(
            '<div class="resize-drag' +
              (dataTable[i].rounded === "yes" ? " circle" : "") +
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
              'px;" ><p id="Action">' +
              dataTable[i].table_name +
              "</p><span  style='opacity: 0.7;'>" +
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
