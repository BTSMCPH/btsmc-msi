import './bootstrap';
import Alpine from 'alpinejs';
import $ from 'jquery';
import Swal from 'sweetalert2';
import 'datatables.net';
import 'datatables.net-dt';
import 'datatables.net-responsive';
import '../css/datatables.css';
// import 'datatables.net-dt/css/dataTables.dataTables.css';
import 'datatables.net-responsive-dt/css/responsive.dataTables.css';


window.Swal = Swal;
window.Alpine = Alpine;
Alpine.start();

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
            url: '/admin/job',
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


