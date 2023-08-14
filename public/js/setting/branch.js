

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

                $me.attr('disabled', true)

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
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {

                                setTimeout(function () {
                                    window.location = '/setting/branch'
                                }, 1 * 1500)

                            }
                        })
                        setTimeout(function () {
                            window.location = '/setting/branch'
                        }, 1 * 1500)
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

                $me.attr('disabled', true)

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
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                setTimeout(function () {
                                    window.location = '/setting/branch'
                                }, 1 * 1500)
                            }
                        })

                        setTimeout(function () {
                            window.location = '/setting/branch'
                        }, 1 * 1500)
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
                        setTimeout(function () {
                            window.location = '/setting/branch'
                        }, 1 * 1500)
                    }
                });
            }
        })
    });
    $(".tableBranch").DataTable({
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
        "order": [],
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
        ]
    });
});
