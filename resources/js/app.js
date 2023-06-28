import './bootstrap';
import Alpine from 'alpinejs';

import MicroModal from 'micromodal';  // es6 module
MicroModal.init({
  disableScroll: false,
});

window.Alpine = Alpine;

Alpine.start();
