import $ from 'jquery';
// window.$ = window.jQuery = $;
import './bootstrap';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import 'datatables.net';
import 'datatables.net-dt';
import 'datatables.net-responsive';
import '../css/datatables.css';
// import 'datatables.net-dt/css/dataTables.dataTables.css';
import 'datatables.net-responsive-dt/css/responsive.dataTables.css';
import './datatable';
import './job';
import './user';
import './role-permission';
// import './toggle-status';

window.Swal = Swal;
window.Alpine = Alpine;
Alpine.start();

import './datatable';

$(document).on('click', '.delete-btn', function (e) {
    e.preventDefault(); // Prevent the default button action

    // Display confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to undo this action!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the form if confirmed
            $(this).closest('form').submit();
        }
    });
});
