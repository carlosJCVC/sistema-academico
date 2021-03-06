
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Swal = require('sweetalert2');
window.toastr = require("toastr");
window.tilt = require('tilt.js');
// window.CKEDITOR = require('ckeditor');
// window.DateRangePicker = require('tiny-date-picker/dist/date-range-picker');

// require('yearpicker.js/dist/yearpicker');
require('select2');
require('./custom');


import { TinyDatePicker, DateRangePicker } from 'tiny-date-picker/dist/date-range-picker';
window.TinyDatePicker = TinyDatePicker;
window.DateRangePicker = DateRangePicker;

// import TinyDatePicker from 'tiny-date-picker';
// window.TinyDatePicker = TinyDatePicker;
// import { DateRangePicker } from 'tiny-date-picker/dist/date-range-picker';
// window.DateRangePicker = DateRangePicker;

// import * as FilePond from 'filepond';
// window.FilePond = FilePond;

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

//const app = new Vue({
//    el: '#app'
//});
