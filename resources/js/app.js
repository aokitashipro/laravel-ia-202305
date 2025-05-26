import './bootstrap';
import Alpine from 'alpinejs';
import Chart from "chart.js/auto";


import MicroModal from 'micromodal';  // es6 module
MicroModal.init({
  disableScroll: false,
});

window.Alpine = Alpine;
window.Chart = Chart;

Alpine.start();
