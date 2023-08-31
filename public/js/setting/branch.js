

function openModalAddBranch() {
    $(".bd-add-branch").modal("show");
}

function closeModalAddBranch() {
    $(".bd-add-branch").modal("hide");
    $("#addBranch")[0].reset();
    $("#addBranch").parsley().reset();
    $("#addBranch .parsley-required").hide();
}

$(document).ready(function () {
    loadTableBranch();
});

// ModalAddBranch
let $ModalAddBranch = $(".bd-add-branch")
let $formAddBranch = $ModalAddBranch.find('form')

$formAddBranch
    // บันทึกข้อมูล
    .on('click', '.btnSaveBranch', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formAddBranch.find('input[name=branch_name]').val() == '') {
            alert('กรุณาระบุชื่อสาขา')
            return false;
        }
        // ผ่าน
        else {

            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formAddBranch[0])

            formData.append('content', $formAddBranch.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: `${serverUrl}/setting/addBranch`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                //กรณี: บันทึกสำเร็จ
                if (res.success = 1) {

                    Swal.fire({
                        text: "เพิ่ม สาขา สำเร็จ",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "ตกลง",
                        timer: "1000",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {

                        }
                    })
                    $(".bd-add-branch").modal("hide");
                    $("#addBranch")[0].reset();
                    $("#addBranch").parsley().reset();
                    $("#addBranch .parsley-required").hide();
                    loadTableBranch();
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
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            // LANDING_PROMOTION.reloadPage()
                        }
                    })

                    $me.attr('disabled', false)
                }

            }).fail(function (context) {
                let messages = context.responseJSON?.messages || 'ไม่สามารถบันทึกได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ'
                // Show error message.
                Swal.fire({
                    text: messages,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "ตกลง",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })

                $me.attr('disabled', false)
            })
        }
    });

//When click edit Branch
$('body').on('click', '.btnEditBranch', function () {
    var Branch_id = $(this).attr('data-id');
    //    alert(employee_id);
    //    exit();
    $.ajax({
        url: '/setting/editBranch/' + Branch_id,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            // let $data = res.data
            $('.bd-edit-branch').modal('show');
            $('#editBranch #BranchId').val(res.data.id);
            $('#editBranch #branch_name').val(res.data.branch_name);
            // console.log(res.data.branch_name)
        },
        error: function (data) { }
    });
});

//modalUpdateBranch
let $modalEditBranch = $(".bd-edit-branch")
let $formEditBranch = $modalEditBranch.find('form')

$formEditBranch
    // บันทึกข้อมูล
    .on('click', '.btnEditSaveBranch', function (e) {
        e.preventDefault()

        // เช็คข้อมูล
        if ($formEditBranch.find('input[name=branch_name]').val() == '') {
            alert('กรุณาระบุชื่อสาขา')
            return false;
        }
        // ผ่าน
        else {
            let $me = $(this)

            $me.attr('disabled', false)

            let formData = new FormData($formEditBranch[0])

            formData.append('content', $formEditBranch.find('.ql-editor').html())

            $.ajax({
                type: "POST",
                url: '/setting/updateBranch',
                data: formData,
                processData: false,
                contentType: false,
            }).done(function (res) {

                if (res.success = 1) {

                    Swal.fire({
                        text: "แก้ไข สาขา สำเร็จ",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "ตกลง",
                        timer: "1000",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {

                        }
                    })
                    $(".bd-edit-branch").modal("hide");
                    $("#editBranch")[0].reset();
                    $("#editBranch").parsley().reset();
                    $("#editBranch .parsley-required").hide();
                    loadTableBranch();
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
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            // LANDING_PROMOTION.reloadPage()
                        }
                    })

                    $me.attr('disabled', false)
                }

            }).fail(function (context) {
                let messages = context.responseJSON?.messages || 'ไม่สามารถบันทึกได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ'
                // Show error message.
                Swal.fire({
                    text: messages,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "ตกลง",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })

                $me.attr('disabled', false)
            })
        }
    });

//btnDeleteBranch alert
$('body').on('click', '.btnDeleteBranch', function () {
    var Branch_id = $(this).attr('data-id');

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
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/setting/deleteBranch/' + Branch_id,
                method: 'get',
                success: function (response) {
                    Swal.fire(
                        'ลบสำเร็จ',
                        response.message,
                        'success'
                    )
                    loadTableBranch();
                }
            });
        }
    })
});
function loadTableBranch() {
    $("#tableBranch").DataTable().clear().destroy();
    $("#tableBranch").DataTable({
        "oLanguage": {
            "sInfo": "กำลังแสดง _START_ ถึง _END_ จาก _TOTAL_ แถว หน้า _PAGE_ ใน _PAGES_",
            "sLengthMenu": "แสดง _MENU_ แถว",
            "sSearch": '',
            "sSearchPlaceholder": "ค้นหา...",
            "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
            "oPaginate": {
                "sFirst": "เิริ่มต้น",
                "sPrevious": "ก่อนหน้า",
                "sNext": "ถัดไป",
                "sLast": "สุดท้าย"
            },
        },
        "stripeClasses": [],
        "pageLength": 5,
        "lengthMenu": [[5, 15, 25, -1], [5, 15, 25, "ทั้งหมด"]],
        "columnDefs": [
            {
                'className': 'text-center',
                "targets": [0],
            },
            {
                'className': 'text-left',
                "targets": [1],
            },
            {
                'className': 'text-center',
                "targets": [2],
            },
            {
                'className': 'text-center',
                "targets": [3],
            },
            {
                'className': 'text-center',
                "targets": [4],
            }
        ],
        "processing": true,
        "serverSide": true,
        "order": [], //init datatable not ordering
        "ajax": {
            'type': 'POST',
            'url': "/setting/ajax-datatableBranch",
        },
        "columns": [{
            data: null,
            "sortable": false,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: "branch_name"
        },
        {
            data: "date_created"
        },
        {
            data: "date_updated"
        },
        {
            data: null,
            render: function (data, type, row, meta) {
                return (
                    '<div class="action_btns d-flex" style="justify-content: center;"><a href="#" class="action_btn btnEditBranch mr_10" data-id="' + data["id"] + '"> <i class="far fa-edit"></i> </a><a href="#" class="action_btn btnDeleteBranch" data-id="' + data["id"] + '"> <i class="fas fa-trash"></i> </a></div>'
                );
            },
        }
        ],
        "bFilter": true, // to display datatable search
    });
}

