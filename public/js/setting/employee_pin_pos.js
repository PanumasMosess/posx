$(document).ready(function () {
  loadTableEmployeePinPos();

  $("#tableEmployeePinPos").on("change", "#checkbox_All", function () {
    var isCheckedPinPos = $(this).prop("checked");
    var $currentRowPinPos = $(this).closest("tr");
    var PinPosrowId = $currentRowPinPos.data("pos-id"); // รหัสแถวปัจจุบัน
    // console.log(PinPosrowId+'p');
    var checkboxesPinPosToToggle = $(
      '[data-pos-id ="' +
        PinPosrowId +
        '"] .custom-control:not(.custom-control-All)'
    );

    if (isCheckedPinPos) {
      // ถ้า checkbox "All" ถูกติ๊กให้ซ่อน checkbox อื่น ๆ ในแถวนี้
      checkboxesPinPosToToggle.hide();
      $(".custom-control-All").show(); // แสดงเฉพาะ checkbox "All"
    } else {
      // ถ้า checkbox "All" ถูกยกเลิกให้แสดง checkbox ทั้งหมดในแถวนี้
      checkboxesPinPosToToggle.show();
    }
  });
});

function openModalAddEmployeePinPos() {
  $(".add-employee-pin-pos").modal("show");
}

function closeModalAddEmployeePinPos() {
  $(".add-employee-pin-pos").modal("hide");
  $("#addEmployeePinPos")[0].reset();
  $("#addEmployeePinPos").parsley().reset();
  $("#addEmployeePinPos .parsley-required").hide();
}

// ModalAddEmployeePinPos
let $ModalAddEmployeePinPos = $(".add-employee-pin-pos");
let $formAddEmployeePinPos = $ModalAddEmployeePinPos.find("form");

$formAddEmployeePinPos
  // บันทึกข้อมูล
  .on("click", ".btnAddEmployeePinPos", function (e) {
    e.preventDefault();

    const tablePinPos = document.querySelector("#tableEmployeePinPos tbody");
    const rowCount = tablePinPos.querySelectorAll("tr").length;

    let maxPinPos = 0;

    if (accountType === "1") {
      maxPinPos = 0;
    } else if (accountType === "2") {
      maxPinPos = 20;
    } else if (accountType === "3") {
      maxPinPos = Infinity;
    }

    if (rowCount >= maxPinPos) {
      alert(`คุณไม่สามารถเพิ่ม PIN ได้มากกว่า ${maxPinPos} PIN`);
    } else {
      // เช็คข้อมูล
      if (
        $formAddEmployeePinPos
          .find("input[name=username_employee_pos]")
          .val() == ""
      ) {
        alert("กรุณาระบุชื่อ");
        return false;
      } else if (
        $formAddEmployeePinPos
          .find("input[name=new_password_employee_pos]")
          .val() == ""
      ) {
        alert("กรุณากรอกรหัสผ่าน");
        return false;
      } else if (
        $formAddEmployeePinPos
          .find("input[name=confirm_password_employee_pos]")
          .val() == ""
      ) {
        alert("กรุณากรอกยืนยันรหัสผ่าน");
        return false;
      } else if (
        $formAddEmployeePinPos
          .find("input[name=new_password_employee_pos]")
          .val() !=
        $formAddEmployeePinPos
          .find("input[name=confirm_password_employee_pos]")
          .val()
      ) {
        alert("รหัสผ่านไม่ตรงกัน กรุณากรอกยืนยันรหัสผ่านใหม่");
        return false;
      }
      // ผ่าน
      else {
        let $me = $(this);

        $me.attr("disabled", false);

        let formData = new FormData($formAddEmployeePinPos[0]);

        formData.append(
          "content",
          $formAddEmployeePinPos.find(".ql-editor").html()
        );

        $.ajax({
          type: "POST",
          url: `${serverUrl}/setting/addEmployeePinPos`,
          data: formData,
          processData: false,
          contentType: false,
        })
          .done(function (res) {
            //กรณี: บันทึกสำเร็จ
            if ((res.success = 1)) {
              Swal.fire({
                text: "เพิ่ม พนักงาน POS สำเร็จ",
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
              $(".add-employee-pin-pos").modal("hide");
              $("#addEmployeePinPos")[0].reset();
              $("#addEmployeePinPos").parsley().reset();
              $("#addEmployeePinPos .parsley-required").hide();
              loadTableEmployeePinPos();
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
      }
    }
  });

//When click saveEditEmployeePinPos
$("body").on("click", ".saveEditEmployeePinPos", function () {
  var editUserID = $(this).attr("data-id");

  var $row = $('tr[data-pos-id="' + editUserID + '"]'); // ใช้ data-pos-id เพื่อหาแถวที่ต้องการแก้ไข

  var All = $row.find("#checkbox_All").prop("checked");
  var Move = $row.find("#checkbox_Move").prop("checked");
  var Discount = $row.find("#checkbox_Discount").prop("checked");
  var Set_Price = $row.find("#checkbox_Set_Price").prop("checked");
  var Void = $row.find("#checkbox_Void").prop("checked");
  var Hide_Cahsier = $row.find("#checkbox_Hide_Cahsier").prop("checked");

  console.log(Move);

  $.ajax({
    type: "POST",
    url: "/setting/updateEmployeePinPos", // Replace with the actual URL
    data: {
      editUserID: editUserID,
      All: All,
      Move: Move,
      Discount: Discount,
      Set_Price: Set_Price,
      Void: Void,
      Hide_Cahsier: Hide_Cahsier,
    },
  })
    .done(function (res) {
      //กรณี: บันทึกสำเร็จ
      if ((res.success = 1)) {
        Swal.fire({
          text: "แก้ไข พนักงาน POS สำเร็จ",
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

//btnDeleteEmployeePinPos alert
$("body").on("click", ".btnDeleteEmployeePinPos", function () {
  var Employee_Pin_Pos_ID = $(this).attr("data-id");

  // let $me = $(this)
  // let $url = $me.data('url')
  // alert ($me);
  // exit();
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
        url: "/setting/deleteEmployeePinPos/" + Employee_Pin_Pos_ID,
        method: "get",
        success: function (response) {
          Swal.fire("ลบสำเร็จ", response.message, "success");
          loadTableEmployeePinPos();
        },
      });
    }
  });
});

function loadTableEmployeePinPos() {
  $("#tableEmployeePinPos").DataTable().clear().destroy();
  $("#tableEmployeePinPos").DataTable({
    oLanguage: {
      sInfo:
        "กำลังแสดง _START_ ถึง _END_ จาก _TOTAL_ แถว หน้า _PAGE_ ใน _PAGES_",
      sLengthMenu: "แสดง _MENU_ แถว",
      sSearch: "",
      sSearchPlaceholder: "ค้นหา...",
      sZeroRecords: "ไม่เจอข้อมูลที่ค้นหา",
      oPaginate: {
        sFirst: "เิริ่มต้น",
        sPrevious: "ก่อนหน้า",
        sNext: "ถัดไป",
        sLast: "สุดท้าย",
      },
    },
    // "autoWidth": true,
    stripeClasses: [],
    pageLength: 5,
    lengthMenu: [
      [5, 15, 25, 10000],
      [5, 15, 25, "ทั้งหมด"],
    ],
    columnDefs: [
      {
        className: "text-center",
        targets: [0],
      },
      {
        className: "text-left",
        targets: [1],
      },
      {
        className: "text-center",
        targets: [2],
      },
      {
        className: "text-left",
        targets: [3],
      },
      {
        className: "text-center",
        targets: [4],
      },
      {
        className: "text-center",
        targets: [5],
      },
    ],
    processing: true,
    serverSide: true,
    order: [], //init datatable not ordering
    ajax: {
      type: "POST",
      url: "/setting/ajax-datatableEmployeePinPos",
    },
    createdRow: function (row, data, dataIndex) {
      // กำหนด id ให้กับแต่ละ <tr> โดยใช้ dataIndex แทน
      $(row).attr("data-pos-id", data["id"]);
    },
    columns: [
      {
        data: null,
        sortable: false,
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        },
      },
      {
        data: "username",
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          return "******";
        },
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          var all = data["pin_pos_all"] == 1 ? "checked" : "";
          var move = data["pin_pos_move"] == 1 ? "checked" : "";
          var discount = data["pin_pos_discount"] == 1 ? "checked" : "";
          var set_price = data["pin_pos_set_price"] == 1 ? "checked" : "";
          var pin_pos_void = data["pin_pos_void"] == 1 ? "checked" : "";

          if (all === "checked") {
            return (
              '<label class="custom-control-All custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input checkbox_All" name="checkbox_All" id="checkbox_All" ' +
              all +
              '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">All</span></label>' +
              '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;display: none;"><input type="checkbox" class="custom-control-input" name="checkbox_Move" id="checkbox_Move" ' +
              move +
              '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Move</span></label>' +
              '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;display: none;"><input type="checkbox" class="custom-control-input" name="checkbox_Discount" id="checkbox_Discount" ' +
              discount +
              '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Discount</span></label>' +
              '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;display: none;"><input type="checkbox" class="custom-control-input" name="checkbox_Set_Price" id="checkbox_Set_Price" ' +
              set_price +
              '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Set price</span></label>' +
              '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;display: none;"><input type="checkbox" class="custom-control-input" name="checkbox_Void" id="checkbox_Void" ' +
              pin_pos_void +
              '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Void</span></label>'
            );
          }

          return (
            '<label class="custom-control-All custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input checkbox_All" name="checkbox_All" id="checkbox_All" ' +
            all +
            '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">All</span></label>' +
            '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input" name="checkbox_Move" id="checkbox_Move" ' +
            move +
            '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Move</span></label>' +
            '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input" name="checkbox_Discount" id="checkbox_Discount" ' +
            discount +
            '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Discount</span></label>' +
            '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input" name="checkbox_Set_Price" id="checkbox_Set_Price" ' +
            set_price +
            '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Set price</span></label>' +
            '<label class="custom-control custom-checkbox custom-control-md mb-1" style="margin-right: 10px;"><input type="checkbox" class="custom-control-input" name="checkbox_Void" id="checkbox_Void" ' +
            pin_pos_void +
            '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Void</span></label>'
          );
        },
      },
      {
        data: "pin_pos_hide_cahsier",
        render: function (data, type, row, meta) {
          var isChecked = data == 1 ? "checked" : "";

          return (
            '<label class="custom-control-hide-cahsier custom-checkbox custom-control-md mb-1"><input type="checkbox" class="custom-control-input" name="checkbox_Hide_Cahsier" id="checkbox_Hide_Cahsier" ' +
            isChecked +
            '><span class="custom-control-label custom-control-label-md ms-1" style="vertical-align: text-bottom;">Hide Cahsier</span></label>'
          );
        },
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          return (
            '<div class="action_btns d-flex" style="justify-content: center;"><button type="button" class="btn btn-primary f_s_14 saveEditEmployeePinPos me-2" data-id="' +
            data["id"] +
            '"><i class="ti-save f_s_13 me-2"></i>Save</button><button type="button" class="btn btn-danger f_s_14 btnDeleteEmployeePinPos" data-id="' +
            data["id"] +
            '"><i class="fas fa-trash f_s_13 me-2"></i>Remove</button></div>'
          );
        },
      },
    ],
    bFilter: true, // to display datatable search
  });
}
