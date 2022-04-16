function dataTablesLoad() {
    $('#example1').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [],
        "columns": [
            { "width": "3%" },
            null,
            null,
            { "width": "15%" },
            { "width": "15%" },
            { "width": "15%" },
        ],
        "columnDefs": [{
            "targets": 0,
            "orderable": false
        }],
        // Vietsub notifications
        "language": {
            "emptyTable": "Hiện không có dòng nào",
            "info": "Hiển thị từ _START_ đến _END_ của _TOTAL_",
            "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
            "search": "Tìm kiếm",
            "paginate": {
                "previous": "Trở lại",
                "next": "Tiếp &nbsp",
                "last": "Trang cuối",
                "first": "Trang đầu",
            },
        }
    });
}

function desTroyDataTables() {
    $('#example1').DataTable().destroy();
}

dataTablesLoad();