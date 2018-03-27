$(document).ready(function () {
    $('#example').DataTable({
        select: true,
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        }],
        order: [[1, 'asc']]
    });

});