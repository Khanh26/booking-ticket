const baseSite = 'http://127.0.0.1:8000/';
Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000
});

function loading(location) {
    document.querySelector(location).innerHTML = `
    <td colspan="6">
        <?xml version="1.0" encoding="utf-8"?>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            style="margin: auto; background: none; display: block; shape-rendering: auto;"
            width="40px" height="40px" viewBox="0 0 100 100"
            preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#1d3f72" stroke-width="10" r="35"
                stroke-dasharray="164.93361431346415 56.97787143782138">
                <animateTransform attributeName="transform" type="rotate"
                    repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50"
                    keyTimes="0;1"></animateTransform>
            </circle>
        </svg>
    </td>`;
}

function dataTablesLoad(table, col) {
    $(table).DataTable({
        "paging": true,
        "pageLength": 5,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [],
        "columns": col,
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

function dataTablesLoadShowTime(table, col) {
    $(table).DataTable({
        "paging": false,
        "pageLength": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [],
        "columns": col,
        "columnDefs": [{
            "targets": [0,1,2,3,4,5],
            "orderable": false
        }],
        "rowGroup": {
            dataSrc: 0,
        },
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


function desTroyDataTables(table) {
    if ($.fn.DataTable.isDataTable(table)) {
        $(table).DataTable().destroy();
    }
}
