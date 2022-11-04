// require('./bootstrap');
// import './alpine'

// window.Alpine = Alpine


// require('./searchdrop');
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import swal from 'sweetalert';
// import NiceSelect from'./nice-select2';
// import './prism';
// import './fastclick';
// import  'searchdrop';
import Toastify from 'toastify-js';
import { Chart, registerables } from 'chart.js';
import ChartDataLabels from 'chartjs-plugin-datalabels';

Chart.register(...registerables);
Chart.register(ChartDataLabels);
window.Chart=Chart;
// window.NiceSelect=NiceSelect;
// import { getRelativePosition } from 'chart.js/helpers';



window.Alpine = Alpine;
window.swal = swal;
window.Toastify = Toastify;
// window.SelectSearch = searchdrop;

Alpine.plugin(focus);

Alpine.store('darkMode', {
    on: false,

    toggle() {
        this.on = ! this.on
    }
})
 // Stores variable globally
 Alpine.store('sidebar', {
    full: true,
    active: 'home',
    navOpen: false
});
// Creating component Dropdown
Alpine.data('dropdown', () => ({
    open: false,
    toggle(tab) {
        this.open = !this.open;
        Alpine.store('sidebar').active = tab;
    },
    activeClass: 'bg-gray-800 text-gray-200',
    expandedClass: 'border-l border-gray-400 ml-4 pl-4',
    shrinkedClass: 'sm:absolute top-0 left-20 sm:shadow-md sm:z-10 sm:bg-gray-900 sm:rounded-md sm:p-4 border-l sm:border-none border-red-400 ml-4 pl-4 sm:ml-0 w-28'
}));
// Creating component Sub Dropdown
Alpine.data('sub_dropdown', () => ({
    sub_open: false,
    sub_toggle() {
        this.sub_open = !this.sub_open;
    },
    sub_expandedClass: 'border-l border-gray-400 ml-4 pl-4',
    sub_shrinkedClass: 'sm:absolute top-0 left-28 sm:shadow-md sm:z-10 sm:bg-gray-900 sm:rounded-md sm:p-4 border-l sm:border-none border-red-800 ml-4 pl-4 sm:ml-0 w-28'
}));
// Creating tooltip
Alpine.data('tooltip', () => ({
    show: false,
    visibleClass:'block sm:absolute z-20 -top-2 sm:border border-gray-800 left-4 sm:text-sm sm:bg-gray-900 sm:px-2 sm:py-1 sm:rounded-md'
}))

Alpine.start()
// require('./main');
