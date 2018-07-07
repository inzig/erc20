String.prototype.toCapitalizeCase = function () {
    return this.charAt(0).toUpperCase() + this.slice(1);
};

window._ = require('lodash');

window.Noty = require('noty');

Noty.overrideDefaults({
    layout: 'topRight',
    theme: 'mint',
    timeout: 2000
});

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token.content
        }
    });
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

axios.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    if (error.response && (error.response.status === 422 || error.response.status === 400 )) {
        $.each(error.response.data.errors, function (k, v) {
            new Noty({
                type: 'error',
                text: '<div><p class="m-0"><b>' + k.toCapitalizeCase() + ' : </b></p><p class="m-0">' + v + '</p></div>'
            }).show();
        });
    }

    $('#sideLoader').hide();

    return Promise.reject(error);
});

// window.Vue = require('vue');
// Vue.component('modal', require('./components/Modal.vue'));
// Vue.component('login-register', require('./components/LoginRegister.vue'));
// const admin = new Vue({
//     el: '#icoAdmin'
// });

jQuery(document).ready(function ($) {
    $('.ajax-form-submit').submit(function (e) {
        e.preventDefault();

        var $e = $(this);
        var $s = $e.find('.ajaxFormSpinner');

        $s.show();

        axios[$e.attr('method')]($e.attr('action'), $e.serialize()).then(function (r) {
            if (typeof r.data === 'object')
                new Noty({
                    type: r.data.type,
                    text: '<div><p class="m-0">' + r.data.message + '</p></div>'
                }).show();

            $s.hide();
        });

        return false;
    });

    $('.add-week').click(function () {
        var $input = $('.bonus-add').slideDown(function () {
            $('html, body').animate({scrollTop: $(document).height()}, 1000, function () {
                $input.find('input[name="week"]').focus();
            });
        });
    });

    $('.bonus-add .close-add').click(function () {
        $('.bonus-add').slideUp().find('form')[0].reset();
    });

    $('.bonus-inputs .close-inputs').click(function () {
        $(this).parents('.bonus-inputs').slideUp(function () {
            $(this).prev().slideDown();
        });
    });

    $('.bonus-values .edit-values').click(function () {
        $(this).parents('.bonus-values').slideUp(function () {
            $(this).next().slideDown();
        });
    });

    $('.bonus-add form').submit(function (e) {
        e.preventDefault();

        var $f = $(this);
        var $b = $f.find('button[type="submit"]');
        $b.html('<i class="fa fa-repeat fa-spin"></i>');

        axios.post($f.attr('action'), $f.serialize()).then(function (r) {
            new Noty({
                type: r.data.type,
                text: '<div><p class="m-0">' + r.data.message + '</p></div>'
            }).show();

            $('.bonus-add .close-add').click();
            $b.html('<i class="fa fa-save"></i> save');
            window.location.reload();
        });
    });

    $('.bonus-inputs form').submit(function (e) {
        e.preventDefault();

        var $f = $(this);
        var $b = $f.find('button[type="submit"]');
        $b.html('<i class="fa fa-repeat fa-spin"></i>');

        axios.post($f.attr('action'), $f.serialize()).then(function (r) {
            new Noty({
                type: r.data.type,
                text: '<div><p class="m-0">' + r.data.message + '</p></div>'
            }).show();

            $b.html('<i class="fa fa-save"></i> save');
            $updateFormValues($f, r.data.data);
        });
    });

    $('.bonus-values .delete-values').click(function () {
        var $f = $(this);
        $f.html('<i class="fa fa-repeat fa-spin"></i>');

        axios.delete($f.data('route')).then(function (r) {
            new Noty({
                type: r.data.type,
                text: '<div><p class="m-0">' + r.data.message + '</p></div>'
            }).show();
            $f.html('Delete');
            $f.parents('.bonus-values').slideUp(function () {
                var $v = $(this);
                var $i = $(this).next();
                $v.remove();
                $i.remove();
            });
        });
    });

    var $updateFormValues = function ($f, data) {
        var $in = $f.parents('.bonus-inputs');
        var $v = $in.prev();
        $f.find('input').each(function (i, e) {
            var $e = $(e);
            var atr = $e.attr('name');
            $e.val(data[atr]);
            $v.find('.' + atr).html(data[atr]);
        });
        $in.slideUp(function () {
            $v.slideDown();
        });
    };

    $('#header_notification_bar .link-click').click(function () {
        var $e = $(this);
        axios.post('/admin/notification/read/' + $e.data('id')).then(function (r) {
            window.location.href = $e.data('href');
        });
    });
});
