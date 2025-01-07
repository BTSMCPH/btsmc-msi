import $ from 'jquery';

var messagesFetchUrl = "/admin/messages/fetch";

    $(document).ready(function () {
        $('#messages-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            order: 'asc',
            ajax: {
                url: messagesFetchUrl,
                type: 'GET',
                dataSrc: 'data',
                error: function (xhr, error, code) {
                    console.error('AJAX Error: ', error);
                }
            },
            columns: [
                { data: 'id', orderable: true, searchable: false },
                { data: 'name', orderable: true, searchable: true },
                { data: 'email', orderable: true, searchable: true },
                { data: 'phone', orderable: true, searchable: true },
                { data: 'message', orderable: false, searchable: true },
                { data: 'actions', orderable: false, searchable: false }
            ]
        });
    });
