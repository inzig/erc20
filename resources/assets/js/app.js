
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('qrcode', require('vue-qrcode-component'));
// Vue.component('token', require('./components/ShowToken.vue'));
// Vue.component('load', require('./components/LoadData.vue'));
// Vue.component('modal', require('./components/Modal.vue'));
// Vue.component('login-register', require('./components/LoginRegister.vue'));

// const BCES = new Vue({
//     el: '#BCES'
// });

require('./isMobile');

require('./benebit');

require('particles.js');

require('./partial-config');

require('./verify-eth');
