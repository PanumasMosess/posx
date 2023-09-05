$(document).ready(function () {
    loadTableEmployeePinPos();
});

function loadTableEmployeePinPos() {
    $("#tableEmployeePinPos").DataTable().clear().destroy();
    $("#tableEmployeePinPos").DataTable({
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
        // "processing": true,
        // "serverSide": true,
        // "order": [], //init datatable not ordering
        // "ajax": {
        //     'type': 'POST',
        //     'url': "/setting/ajax-datatableBranch",
        // },
        // "columns": [{
        //     data: null,
        //     "sortable": false,
        //     render: function (data, type, row, meta) {
        //         return meta.row + meta.settings._iDisplayStart + 1;
        //     }
        // },
        // {
        //     data: "branch_name"
        // },
        // {
        //     data: "date_created"
        // },
        // {
        //     data: "date_updated"
        // },
        // {
        //     data: null,
        //     render: function (data, type, row, meta) {
        //         return (
        //             '<div class="action_btns d-flex" style="justify-content: center;"><a href="#" class="action_btn btnEditBranch mr_10" data-id="' + data["id"] + '"> <i class="far fa-edit"></i> </a><a href="#" class="action_btn btnDeleteBranch" data-id="' + data["id"] + '"> <i class="fas fa-trash"></i> </a></div>'
        //         );
        //     },
        // }
        // ],
        // "bFilter": true, // to display datatable search
    });
}