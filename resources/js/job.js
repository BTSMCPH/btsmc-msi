import $ from 'jquery';


/* The code you provided is using jQuery to initialize a DataTable on the element with the id
`vacancy-table`. */

$(document).ready(function () {
    // DataTable for Jobs
    $('#job-table').DataTable({
        responsive: true,
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: '/job',
            type: 'GET',
            dataSrc: 'data',
            error: function (xhr, error, code) {
                console.error('AJAX Error: ', error);
            },
        },
        columns: [
            { data: 'job_title', orderable: true, searchable: true },
            { data: 'job_type', orderable: true, searchable: true },
            { data: 'location', orderable: true, searchable: true },
            { data: 'schedule', orderable: true, searchable: true },
            { data: 'job_requirements', orderable: false, searchable: true },
            { data: 'job_description', orderable: false, searchable: true },
            { data: 'category', type: 'string', orderable: true, searchable: true },
            { data: 'status', orderable: true, searchable: true },
            // Remove the actions column from ordering
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
    // .columns.adjust()
    // .responsive.recalc();

});

// STATUS TOGGLE FOR JOBS ACTIVE AND INACTIVE
$(document).on('change', '.status-toggle', function() {
    var jobId = $(this).data('job-id');
    var status = $(this).prop('checked') ? 'active' : 'inactive';

    console.log("Job ID: " + jobId);
    console.log("Status: " + status);

    $.ajax({
        url: '/job/update-status/' + jobId,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            status: status
        },
        success: function(response) {
            console.log('Job status updated to ' + status);
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Job status updated successfully'
            });
        },
        error: function(xhr, status, error) {
            console.error('Error updating job status: ' + error);

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while updating job status'
            });
        }
    });
});
