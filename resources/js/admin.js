// AlpineJs ==================================================
// import Alpine from 'alpinejs'
// window.Alpine = Alpine


// Jquery ==================================================
import $ from 'jquery';
window.$ = $;
window.jQuery = $;


// SwiperJs==================================================
// core version + navigation, pagination modules:
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';


// SplideJs================================================

import Splide from '@splidejs/splide';
import '@splidejs/splide/css'; // default theme



//Filepond ===================================================START

import * as FilePond from 'filepond';
import 'filepond/dist/filepond.min.css';

import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

// Register plugins
FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType
);

// Initialize
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.filepond').forEach(input => {
        FilePond.create(input, {
            allowMultiple: true,
            acceptedFileTypes: ['image/*'],
        });
    });
});
// Filepond ===================================================END
//-------------------------------------------------------------
//-------------------------------------------------------------
//Sweetalert2==================================================START
import Swal from 'sweetalert2';

window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast;
document.addEventListener('livewire:init', () => {

    Livewire.on('show-delete-confirmation', () => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('deleteConfirmed');
            }
        });
    });

});

//Sweetalert2==================================================END
//-------------------------------------------------------------
//-------------------------------------------------------------
//Notyf==================================================START
import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';

window.notyf = new Notyf({
    duration: 3000,
    position: {
        x: 'right',
        y: 'top',
    },
});
document.addEventListener('livewire:init', () => {

    Livewire.on('notify', ({ type, message }) => {
        if (type === 'success') {
            notyf.success(message);
        } else {
            notyf.error(message);
        }
    });

});

//Notyf==================================================END
//-------------------------------------------------------------
//-------------------------------------------------------------
//FlatPickr==================================================START
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

window.flatpickr = flatpickr;

//FlatPickr==================================================END
//--    ====================================================
//Sortable==================================================START
import Sortable from 'sortablejs';

window.Sortable = Sortable;

//Sortable==================================================END
//--    ====================================================
//Boxicons==================================================START
// import 'boxicons/css/boxicons.min.css';

//Boxicons==================================================END
