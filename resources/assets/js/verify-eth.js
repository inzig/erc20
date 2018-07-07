jQuery(document).ready(function ($) {

    var recaptchaId;
    var $input = $('input[name="ethwalet"]');
    var ethereumAddress = require('ethereum-address');
    var pageURL = new URL(window.location.href);

    if (pageURL.searchParams.get('ref') && document.querySelector('.login-inputs-referral')) {
        var $ref = $('.login-inputs-referral'); //
        $ref.append('<input type="text" class="form-control input-lg login-inputs" name="referral" placeholder="Referral code" value="' + pageURL.searchParams.get('ref') + '" readonly>');
        $ref.parent().parent().removeClass('hidden');
    }

    if (ethereumAddress.isAddress($input.val()))
        $input.prev().children().addClass('fa-check').removeClass('fa-remove');

    $('.btn-signup').click(function () {
        if (!$input.val())
            new Noty({
                type: 'error',
                text: 'Please add ethereum address.'
            }).show();
        else if (ethereumAddress.isAddress($input.val())) {
            $(this).prop('type', 'submit');
            $input.prev().children().addClass('fa-check').removeClass('fa-remove')
        }
    });

    // Ethereum Address
    $input.focusout(function () {
        if (ethereumAddress.isAddress($input.val())) {
            $input.prev().children().addClass('fa-check').removeClass('fa-remove');
            axios.post('/api/verify/eth/address', {ethwalet: $input.val()}).then(function (r) {
                new Noty({
                    type: r.data.type,
                    text: r.data.message
                }).show();

                if (r.data.same) {
                    $input.val('');
                    $input.focus();
                    $input.prev().children().addClass('fa-remove').removeClass('fa-check');
                }
            });
        }
    });

    // Captcha verification
    setTimeout(function () {
        if (window.grecaptcha) {
            recaptchaId = grecaptcha.render('g-recaptcha', {sitekey: $('#g-recaptcha').data('sitekey')});

            $('.form-signup').submit(function (e) {
                var g_recaptcha_response = grecaptcha.getResponse(recaptchaId);
                if (g_recaptcha_response.length === 0) {
                    e.preventDefault();

                    new Noty({
                        type: 'warning',
                        text: '<div><p class="m-0">Please check the captcha form</p></div>'
                    }).show();

                    return false;
                }
            });
        }
    }, 1000);
});
