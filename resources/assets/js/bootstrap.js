

window._ = require('lodash');

window.MediumEditor = require('medium-editor');


try {
    window.$ = window.jQuery = require('jquery');
    require('./bootstrap.min');
    require('./theme');
    window.preloader = require('./jquery.preloader.min');
} catch (e) {}

let token = document.head.querySelector('meta[name="csrf-token"]');

