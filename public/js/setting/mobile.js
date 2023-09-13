$(document).ready(function () {
    loadTableMobile();
});

function loadTableMobile() {
    // $("#tableMobile").DataTable().clear().destroy();
    $("#tableMobile").DataTable({
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
                'className': 'text-center',
                "targets": [1],
            },
            {
                'className': 'text-center',
                "targets": [2],
            },
            {
                'className': 'text-center',
                "targets": [3],
            }
        ],
        // "processing": true,
        // "serverSide": true,
        // "order": [],
    });
}