import './bootstrap';

import Alpine from 'alpinejs';
import 'select2';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    $('#items').select2();
});