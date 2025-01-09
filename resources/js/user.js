import $ from 'jquery';

$(document).ready(function() {
    $('#user-table').DataTable({
        responsive: true,
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        processing: true,
        serverSide: true,
        order: 'asc',
        ajax: {
            url: '/admin/admin-settings/users',
            type: 'GET',
            dataSrc: 'data',
            error: function(xhr, error, code) {
                console.error('AJAX Error: ', error);
            },
        },
        columns: [
            { data: 'name', orderable: true, searchable: true },
            { data: 'email', orderable: true, searchable: true },
            { data: 'position', orderable: true, searchable: true },
            { data: 'department', orderable: true, searchable: true },
            { data: 'status', orderable: true, searchable: true },
            { data: 'actions', orderable: false, searchable: false }
        ],
        drawCallback: function(settings) {
            if (settings.json.data.length === 0) {
                $(this).closest('.dataTables_wrapper').find('.dataTables_paginate').hide();
            } else {
                $(this).closest('.dataTables_wrapper').find('.dataTables_paginate').show();
            }
        }
    });
});

// STATUS TOGGLE FOR JOBS ACTIVE AND INACTIVE
$(document).on('change', '.status-toggle-user', function() {
    const userId = $(this).data('user-id');
    const status = $(this).prop('checked') ? 'active' : 'inactive';

    console.log("User ID: " + userId);
    console.log("Status: " + status);

    $.ajax({
        url: `/admin/admin-settings/users/${userId}/update-status`,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token for security
        },
        data: {
            status: status
        },
        success: function(response) {
            console.log('User status updated to ' + status);
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'User status updated successfully!',
                timer: 2000,
                showConfirmButton: false
            });
        },
        error: function(xhr, status, error) {
            console.error('Error updating user status: ' + error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to update user status. Please try again later.',
                timer: 2000,
                showConfirmButton: false
            });
        }
    });
});




