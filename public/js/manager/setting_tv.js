$(document).ready(function () {
  TVSetting();
  loadQRAllTable();
  //   $(".billReload").click();
  //   let searchParams = window.location.pathname;
  //   var searchParams_ = searchParams.split("/stock/show/");

  //   const base_url = "https://carforyou.space";

  //   $("#file_picture_id").val(searchParams_[1]);

  //get picture other by stock code
  $.ajax({
    url: serverUrl + "/manager/fetchPicture",
    method: "get",
    async: false,
    success: function (response) {
      $("#other_picture").html(response.message);
    },
  });

  //   new SmartPhoto(".js-img-viewer", {
  //     resizeStyle: "fit",
  //   });

  //   new SmartPhoto(".js-img-viewer-other", {
  //     resizeStyle: "fit",
  //   });

  $(".input-images").imageUploader();
});

function loadPictureTab2() {
  //get picture other by stock code
  $.ajax({
    url: serverUrl + "/manager/fetchPicture",
    method: "get",
    success: function (response) {
      $("#other_picture").html(response.message);
      // new SmartPhoto(
      //     $(".brick").find($(".brick").find(".js-img-viewer-other")),
      //     {
      //         resizeStyle: "fit",
      //     }
      // );
    },
  });
}
// function deleteImage(button) {
//     // หา DOM element ของรูปภาพที่เกิดเหตุการณ์ (คลิกปุ่มลบ)
//     var imageElement = button.previousElementSibling;

//     // ตรวจสอบว่าคุณต้องการลบรูปภาพจริงหรือไม่
//     if (confirm("คุณต้องการลบรูปภาพนี้หรือไม่?")) {
//         // ทำการลบรูปภาพ
//         imageElement.remove();
//         button.remove();
//     }
// }

function upload_img_update() {
  $("#file_img_update").click();
}
function enlargeImage(image) {
  // สร้าง div ใหม่เพื่อแสดงรูปภาพใหญ่
  var enlargedDiv = document.createElement("div");
  enlargedDiv.style.position = "fixed";
  enlargedDiv.style.top = "0";
  enlargedDiv.style.left = "0";
  enlargedDiv.style.width = "100%";
  enlargedDiv.style.height = "100%";
  enlargedDiv.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
  enlargedDiv.style.display = "flex";
  enlargedDiv.style.alignItems = "center";
  enlargedDiv.style.justifyContent = "center";
  enlargedDiv.style.zIndex = "9999";

  // สร้างรูปภาพใหญ่
  var enlargedImage = document.createElement("img");
  enlargedImage.src = image.src;
  enlargedImage.style.maxWidth = "90%";
  enlargedImage.style.maxHeight = "90%";
  enlargedImage.style.objectFit = "contain";

  // เพิ่มรูปภาพใหญ่เข้าใน div และเพิ่ม div เข้าใน body
  enlargedDiv.appendChild(enlargedImage);
  document.body.appendChild(enlargedDiv);

  // เมื่อคลิกที่รูปภาพใหญ่ให้ปิดรูปภาพใหญ่
  enlargedDiv.onclick = function () {
    enlargedDiv.style.display = "none";
    enlargedDiv.remove();
  };
}
// save แก้ไข stock tab2 piture car
$("#updatePicture").submit(function (e) {
  e.preventDefault();
  const formData = new FormData(this);
  $("#updated_btn_picture").text("กำลังเพิ่มรูปภาพ...");
  $.ajax({
    url: serverUrl + "/manager/update_piture",
    method: "post",
    data: formData,
    contentType: false,
    // cache: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      if (response.error) {
      } else {
        $(".input-images").html("");
        $(".input-images").imageUploader();

        loadPictureTab2();
        $("#updated_btn_picture").text("เพิ่มรูปภาพ");

        Swal.fire({
          text: "เพิ่มรูปภาพสำเร็จ",
          icon: "success",
          buttonsStyling: false,
          confirmButtonText: "ตกลง",
          timer: "1000",
          customClass: {
            confirmButton: "btn btn-primary",
          },
        }).then(function (result) {
          if (result.isConfirmed) {
          }
        });
        // notif({
        //     type: "success",
        //     msg: "เพิ่มรูปภาพสำเร็จ!",
        //     position: "right",
        //     fade: true,
        //     time: 300,
        // });
      }
    },
  });
});

function deletePicture(id) {
  Swal.fire({
    text: `คุณต้องการลบ`,
    icon: "warning",
    buttonsStyling: false,
    confirmButtonText: "ตกลง",
    showCloseButton: true,
    customClass: {
      confirmButton: "btn btn-primary",
    },
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: serverUrl + "/manager/delete_picture/" + id,
        method: "get",
        success: function (response) {
          if (response.error) {
          } else {
            $.ajax({
              url: serverUrl + "/manager/fetchPicture",
              method: "get",
              success: function (response) {
                $("#other_picture").html(response.message);
                // new SmartPhoto(".js-img-viewer-other", {
                //     resizeStyle: "fit",
                // });
              },
            });

            Swal.fire({
              text: "ลบรูปภาพสำเร็จ",
              icon: "success",
              buttonsStyling: false,
              confirmButtonText: "ตกลง",
              timer: "1000",
              customClass: {
                confirmButton: "btn btn-primary",
              },
            }).then(function (result) {
              if (result.isConfirmed) {
              }
            });
            // notif({
            //     type: "success",
            //     msg: "ลบรูปภาพสำเร็จ!",
            //     position: "right",
            //     fade: true,
            //     time: 300,
            // });
          }
        },
      });
    }
  });
}

//When click add Email
$("body").on("click", "#EditTVSetting", function () {
  var SettingTime = document.querySelector("#setting_time");
  var SettingTime = SettingTime.value;
  $.ajax({
    type: "POST",
    url: "/manager/updateTVSetting", // Replace with the actual URL
    data: { SettingTime: SettingTime },
  })
    .done(function (res) {
      //กรณี: บันทึกสำเร็จ
      if ((res.success = 1)) {
        Swal.fire({
          text: "แก้ไข TV Setting สำเร็จ",
          icon: "success",
          buttonsStyling: false,
          confirmButtonText: "ตกลง",
          timer: "1000",
          customClass: {
            confirmButton: "btn btn-primary",
          },
        }).then(function (result) {
          if (result.isConfirmed) {
          }
        });
      }
      // กรณี: Server มีการตอบกลับ แต่ไม่สำเร็จ
      else {
        // Show error message.
        Swal.fire({
          text: res.message,
          icon: "error",
          buttonsStyling: false,
          confirmButtonText: "ตกลง",
          customClass: {
            confirmButton: "btn btn-primary",
          },
        }).then(function (result) {
          if (result.isConfirmed) {
            // LANDING_PROMOTION.reloadPage()
          }
        });

        $me.attr("disabled", false);
      }
    })
    .fail(function (context) {
      let messages =
        context.responseJSON?.messages ||
        "ไม่สามารถบันทึกได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ";
      // Show error message.
      Swal.fire({
        text: messages,
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "ตกลง",
        customClass: {
          confirmButton: "btn btn-primary",
        },
      });

      $me.attr("disabled", false);
    });
});

function TVSetting() {
  $.ajax({
    url: "/manager/TVSetting",
    type: "GET",
    dataType: "json",
    success: function (res) {
      if (res.data != null) {
        $("#setting_time").val(res.data.tv_time);
      }
    },
  });
}

// var upics = [];

// //set for dowload picture
// function download(item) {
//     var fileName = item.split(/(\\|\/)/g).pop();

//     var image = new Image();
//     image.crossOrigin = "anonymous";
//     image.src = item;
//     image.onload = function () {

//         // use canvas to load image
//         var canvas = document.createElement('canvas');
//         canvas.width = this.naturalWidth;
//         canvas.height = this.naturalHeight;
//         canvas.getContext('2d').drawImage(this, 0, 0);

//         // grab the blob url
//         var blob;
//         if (image.src.indexOf(".jpg") > -1) {
//             blob = canvas.toDataURL("image/jpeg");
//         } else if (image.src.indexOf(".png") > -1) {
//             blob = canvas.toDataURL("image/png");
//         } else if (image.src.indexOf(".gif") > -1) {
//             blob = canvas.toDataURL("image/gif");
//         } else {
//             blob = canvas.toDataURL("image/png");
//         }

//         // create link, set href to blob
//         var a = document.createElement('a');
//         a.title = fileName;
//         a.href = blob;
//         a.style.display = 'none';
//         a.setAttribute("download", fileName);
//         a.setAttribute("target", "_blank");
//         document.body.appendChild(a);

//         // click item
//         a.click();
//     }
// }

// function downloadOther(item) {
//     let searchParams = window.location.pathname;
//     var searchParams_ = searchParams.split("/stock/show/");
//     $.ajax({
//         url: serverUrl + "/stock/dowloadPictureOther/" + searchParams_[1],
//         method: "get",
//         success: function (response) {
//             upics = [];
//             $.each(response.message, function (index, item) {
//                 if (item.car_stock_picture_other_src != null || item.car_stock_picture_other_src != '') {
//                     upics.push(CDN_IMG + "/uploads/stock_img/" + item.car_stock_picture_other_src);
//                 }
//             });

//             for (var i in upics) {
//                 download(upics[i]);
//             }
//         },
//     });
// }

function loadQRAllTable() {
  $.ajax({
    url: "/manager/loadQR",
    type: "GET",
    dataType: "json",
    success: function (res) {
      let html_qr = "";
      for (var i = 0; i < res.data.length; i++) {
        html_qr +=
          "<div class='col-lg-4 col-md-6 mb_30'><div class='single_wow_amin wow fadeInUp' data-wow-duration='1s' data-wow-delay='.1s' style='visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;'>" +
          "<div id='qrcode" +
          i +
          "' ></div>" +
          "</div></div>";
      }
      $("#qr_table").html(html_qr);
      qrDrow(res.data);
    },
  });
}

function qrDrow(data) {
  var qrcodeConfig = {
    // width: 100,
    // height: 100,
    correctLevel: 0,
  };
  for (var i = 0; i < data.length; i++) {
    
    if (serverUrl != "http://localhost:8080/") {
      let split_host =  serverUrl.split("https://app.");
        console.log(split_host);
    //   $("#qrcode" + i + "").qrcode(
    //     $.extend(qrcodeConfig, {
    //       text: "https://localhost:8080/upload/",
    //     })
    //   );

    } else {
      $("#qrcode" + i + "").qrcode(
        $.extend(qrcodeConfig, {
          text: "https://localhost:8080/upload/",
        })
      );
    }
  }
}
