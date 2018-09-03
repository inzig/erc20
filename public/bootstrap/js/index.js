var strings = getStrings();

function updateCountdownLabels(deadlines) {
    var now = new Date();

    var deadline = null;

    for (var i = 0; i < deadlines.length; i++) {
        if (now < deadlines[i].date) {
            deadline = deadlines[i];
            break;
        }
    }

    if (deadline) {
        var secondsTillDeadline = Math.abs(deadline.date.getTime() - now.getTime()) / 1000;

        var daysLeft = Math.floor(secondsTillDeadline / (60 * 60 * 24));
        secondsTillDeadline = secondsTillDeadline % (60 * 60 * 24);

        var hoursLeft = Math.floor(secondsTillDeadline / (60 * 60));
        secondsTillDeadline = secondsTillDeadline % (60 * 60);

        var minutesLeft = Math.floor(secondsTillDeadline / 60);
        secondsTillDeadline = secondsTillDeadline % 60;

        daysLabel.innerText = daysLeft;
        hoursLabel.innerText = hoursLeft;
        minutesLabel.innerText = minutesLeft;
        secondsLabel.innerText = Math.floor(secondsTillDeadline);

        countdownLabel.innerText = deadline.label;
    } else {
        countdownLabel.innerText = strings.deadlines.ICOEnded;

        daysLabel.innerText = '0';
        hoursLabel.innerText = '0';
        minutesLabel.innerText = '0';
        secondsLabel.innerText = '0';
    }
}

function setupSmoothScroll() {
    $('#topNavbar a').on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();

            $('.navbar-collapse').collapse('hide');

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {
                window.location.hash = hash;
            });
        }
    });
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function setupContactForm() {
    var fullNameField = $('#contactFullName');
    var emailField = $('#contactEmail');
    var messageField = $('#contactMessage');
    var sendButton = $('#contactSendButton');
    var sendButtonText = $('#contactSendButton span');

    [fullNameField, messageField].forEach(function (field) {
        field.keyup(function (e) {
            var target = $(e.target);
            target.removeClass('is-invalid', target.val().trim().length > 0);
        });
    });

    emailField.keyup(function () {
        if (isEmail(emailField.val().trim())) {
            emailField.removeClass('is-invalid')
        }
    });

    sendButton.click(function () {
        fullNameField.toggleClass('is-invalid', fullNameField.val().trim().length === 0);
        emailField.toggleClass('is-invalid', !isEmail(emailField.val().trim()));
        messageField.toggleClass('is-invalid', messageField.val().trim().length === 0);

        var shouldSubmitForm = fullNameField.val().trim().length > 0
            && emailField.val().trim().length > 0
            && messageField.val().trim().length > 0;

        if (shouldSubmitForm) {
            sendButton.prop('disabled', true);
            sendButtonText.text('Sending...');

            var postBody = {
                full_name: fullNameField.val().trim(),
                email: emailField.val().trim(),
                message: messageField.val().trim()
            };

            $.post('/users/contact_us', postBody, function() {
                sendButtonText.text(strings.contactUs.sent);
            }).fail(function() {
                sendButtonText.text(strings.contactUs.error);
                setTimeout(function () {
                    sendButtonText.text(strings.contactUs.sendButton);
                }, 2500);
            }).always(function () {
                sendButton.prop('disabled', false);
            });
        }

        return false;
    });
}

function updateNavbar(topNavbar, navbarLogo, navbarToggler) {
    var hasScrolled = $(document).scrollTop() > topNavbar.height();
    var isCollapsed = navbarToggler.attr('aria-expanded') === 'false';

    var isTransparent = !hasScrolled && isCollapsed;

    topNavbar.toggleClass('scrolled', !isTransparent);
    topNavbar.toggleClass('navbar-dark', isTransparent);
    topNavbar.toggleClass('navbar-light', !isTransparent);

    navbarLogo.attr('src', !isTransparent ? 'bootstrap/img/logo.png' : 'bootstrap/img/logo.png')
}

function targetBlankOpen(url) {
    var newWindow = window.open('#', '_blank');
    newWindow.opener = null;
    newWindow.location = url;
}

function setupInstagramFeed() {
    var galleryFeed = new Instafeed({
        get: "user",
        userId: 7117188801,
        accessToken: "7117188801.551e406.aa2358eacd1448d388cc8b22903dc097",
        resolution: "standard_resolution",
        limit: 3,
        template: '<div class="col-12 col-sm-6 col-md-4 col-xl-3 my-3"><div class="row px-3"><div class="col-12 small-rounded-corners bg-white-shadow scale-on-hover pointer-cursor" onclick="targetBlankOpen(\'{{link}}\')"><div class="row"><img src="{{image}}" class="w-100 h-100"></div><div class="row mx-2 mt-2"><h5><i class="far fa-heart fa-fw"></i>{{likes}} <i class="far fa-comment fa-fw ml-1"></i>{{comments}}</h5></div><div class="row mx-2 my-auto"><p>{{caption}}</p></div></div></div></div>'
    });
    galleryFeed.run();
}

function checkSessionToken(callback) {
    $.get('/users/get_name', function (data) {
        callback(!!data.name);
    });
}

function updateEtherRaised() {
    $.get('https://dev.bitnautic.io/contributor/etherRaised', function (data) {
        var parts = data.ether_raised.split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        var usdRaised = parts.join(".");

        $('#crowdsaleRaisedLabel').text(usdRaised);
        $('#etherRaisedContainer').removeClass('d-none');
    });
}

function setupTransactionPopup() {
    var popup = $('#tokenSalePopup');

    popup.click(function () {
        popup.animate({left: -250, opacity: 0, specialEasing: {opacity: 'easeInBounce'}, duration: 100});
    });
}

function showRecentTransactionPopup() {
    var popup = $('#tokenSalePopup');
    var tokenAmountLabel = $('#popupTokenAmountLabel');
    var txHashLabel = $('#popupTxHashLabel');

    $.get('https://dev.bitnautic.io/contributor/last_transaction', function (data) {
        var parts = data.amount.split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        var tokenAmount;
        if (/^0+$/.test(parts[1])) {
            tokenAmount = parts[0];
        } else {
            tokenAmount = parts.join(".");
        }

        tokenAmountLabel.text(tokenAmount);
        txHashLabel.text(data.hash.substring(0, 10) + '...');
        popupTxFlag.className = 'flag-icon flag-icon-' + data.country.toLowerCase();
        popup.animate({left: 25, opacity: 1, specialEasing: {opacity: 'easeOutBounce'}, duration: 100});
        setTimeout(function () {
            popup.animate({left: -250, opacity: 0, specialEasing: {opacity: 'easeInBounce'}, duration: 100});
        }, 5000)
    });
}

$(function () {
    $('body').scrollspy({ target: '#topNavbar' });
    setupSmoothScroll();

    checkSessionToken(function (valid) {
        $('#loginNavButton').toggleClass('d-none', valid);
        $('#dashboardNavButton').toggleClass('d-none', !valid);
    });

    var topNavbar = $("#topNavbar");
    var navbarLogo = $('#navbarLogo');
    var navbarToggler = $('#navbarToggler');
    updateNavbar(topNavbar, navbarLogo, navbarToggler);

    navbarToggler.click(function () {
        setTimeout(function () {
            updateNavbar(topNavbar, navbarLogo, navbarToggler);
        }, 100)
    });

    $(document).scroll(function () {
        updateNavbar(topNavbar, navbarLogo, navbarToggler);
    });

    var deadlines = [
        {
            date: new Date(1527811200000),
            label: strings.deadlines.bonus30
        },
        {
            date: new Date(1528416000000),
            label: strings.deadlines.bonus20
        },
        {
            date: new Date(1529020800000),
            label: strings.deadlines.bonus15
        },
        {
            date: new Date(1529625600000),
            label: strings.deadlines.bonus10
        },
        {
            date: new Date(1530403200000),
            label: strings.deadlines.bonus5
        },
        {
            date: new Date(1532995200000),
            label: strings.deadlines.ICOEndsIn
        }
    ];

    updateCountdownLabels(deadlines);
    setInterval(function () {
        updateCountdownLabels(deadlines);
    }, 500);

    // updateEtherRaised();
    setupTransactionPopup();

    var timerFunction = function() {
        showRecentTransactionPopup();

        setTimeout(function () {
            timerFunction();
        }, 15000 + Math.random() * 5000 - 2500);
    };

    setTimeout(timerFunction, 15000 + Math.random() * 5000 - 2500);

    var shippersChallengesButton = $('#shippersChallengesButton');
    var shippersChallengesContainer = $('#shippersChallenges');
    var carriersChallengesButton = $('#carriersChallengesButton');
    var carriersChallengesContainer = $('#carriersChallenges');

    shippersChallengesButton.click(function () {
        shippersChallengesButton.addClass('active');
        carriersChallengesButton.removeClass('active');

        shippersChallengesContainer.removeClass('d-none');
        carriersChallengesContainer.addClass('d-none');
    });

    carriersChallengesButton.click(function () {
        carriersChallengesButton.addClass('active');
        shippersChallengesButton.removeClass('active');

        carriersChallengesContainer.removeClass('d-none');
        shippersChallengesContainer.addClass('d-none');
    });

    setupInstagramFeed();

    setupContactForm();

    particlesJS.load('particlesDiv', '/public/lib/particles-js/particlesjs-config.json', function() {
        console.log('particles.js loaded - callback');
    });
});
