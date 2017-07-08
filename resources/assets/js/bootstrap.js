
try {
    window.$ = window.jQuery = require('jquery');
    require('./bootstrap.min');
    require('./theme');
    window.preloader = require('./jquery.preloader.min');
    
    
} catch (e) {}

import dt from 'datatables.net';
import tinymce from 'tinymce/tinymce';

// A theme is also required
import 'tinymce/themes/modern/theme';

// Any plugins you want to use has to be imported
import 'tinymce/plugins/paste';
import 'tinymce/plugins/link';

let token = document.head.querySelector('meta[name="csrf-token"]');

