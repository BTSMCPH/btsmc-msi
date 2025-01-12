import $ from 'jquery';


$(document).ready(function () {
    $('#role-table').DataTable({
        responsive: true,
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        processing: true,
        serverSide: true,
        order: 'asc',
        ajax: {
            url: '/admin/admin-settings/roles',
            type: 'GET',
            dataSrc: 'data',
            error: function (xhr, error, code) {
                console.error('AJAX Error: ', error);
            },
        },
        columns: [
            { data: 'name', orderable: true, searchable: true },
            { data: 'guard_name', orderable: true, searchable: true },
            { data: 'permissions', orderable: false, searchable: false },
            { data: 'actions', orderable: false, searchable: false }
        ],
        drawCallback: function (settings) {
            if (settings.json.data.length === 0) {
                $(this).closest('.dataTables_wrapper').find('.dataTables_paginate').hide();
            } else {
                $(this).closest('.dataTables_wrapper').find('.dataTables_paginate').show();
            }
        }
    });

    $('#permission-table').DataTable({
        responsive: true,
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        processing: true,
        serverSide: true,
        order: 'asc',
        ajax: {
            url: '/admin/admin-settings/permissions',
            type: 'GET',
            dataSrc: 'data',
            error: function (xhr, error, code) {
                console.error('AJAX Error: ', error);
            },
        },
        columns: [
            { data: 'name', orderable: true, searchable: true },
            { data: 'guard_name', orderable: true, searchable: true },
            { data: 'actions', orderable: false, searchable: false }
        ],
        drawCallback: function (settings) {
            if (settings.json.data.length === 0) {
                $(this).closest('.dataTables_wrapper').find('.dataTables_paginate').hide();
            } else {
                $(this).closest('.dataTables_wrapper').find('.dataTables_paginate').show();
            }
        }
    });

});
