/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./isMobile');

require('metismenu');
require('./admin/jquery.slimscroll');
require('./admin/waves');
require('./admin/layout');
require('bootstrap-switch');
require('dropify');

window.Vue = require('vue');
window.Clipboard = require('clipboard');

ethereumAddress = require('ethereum-address');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('qrcode', require('vue-qrcode-component'));
Vue.component('kyc-form', require('./components/KYCForm.vue'));
Vue.component('purchase-tokens', require('./components/PurchaseTokens.vue'));

const admin = new Vue({
    el: '#wrapper'
});

jQuery(document).ready(function ($) {
    new Clipboard('.btn-copy');

    var delay = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $('#amount').keyup(function () {
        var $e = $(this);
        delay(function () {
            var amount = $e.val();
            $('.calculate-values > div').each(function (i, e) {
                var $e = $(e).find('button');
                var amt = Math.round((amount / $e.data('value')) * 100000000) / 100000000;
                $e.text(amt);
                $('.' + $e.data('action') + '-value').text(amt);
            });
        }, 300);
    });

    $(".wallet-value-form").submit(function (e) {
        e.preventDefault();

        var $form = $(this);
        var type = $form.find('input[name="type"]').val();

        if (type === 'ethereum' && !ethereumAddress.isAddress($form.find('#walletAddress').val())) {
            new Noty({
                type: 'warning',
                text: type.toCapitalizeCase() + ' address is not valid.'
            }).show();

            return false;
        }

        axios.post($form.attr('action'), $form.serialize()).then(function (r) {
            new Noty({
                type: r.data.type,
                text: r.data.message
            }).show();

            if (r.data.updated) {
                $form.find('button[type="submit"]').remove();
                $form.find('input[name="address"]').prop('readonly', true);
            }
        });

        return false;
    });


    $('.BTCHistory').click(function () {
        axios.post('/api/transactionHistorybtc').then(function (r) {
        });
    });

    $('.LTCHistory').click(function () {
        axios.post('/api/transactionHistoryltc').then(function (r) {
        });
    });


    $('.DASHHistory').click(function () {
        axios.post('/api/transactionHistorydash').then(function (r) {
        });
    });


    $('.ETHEREUMHistory').click(function () {
        axios.post('/api/transactionHistoryeth').then(function (r) {
        });
    });

    $('.switch-chk').on('switchChange.bootstrapSwitch', function (event, state) {
        axios.post('/api/user/update/oauth', {oauth: state ? 1 : 0}).then(function (r) {
            new Noty({
                type: r.data.type,
                text: '<div><p class="m-0">' + r.data.message + '</p></div>'
            }).show();
        });
    }).bootstrapSwitch();
});
