jQuery(document).ready(function ($) {
    if (typeof WOW !== 'undefined' && !isMobile.any())
        new WOW({
            animateClass: 'animated',
            offset: 100
        }).init();
});

jQuery(document).ready(function ($) {
    $('.panel-collapse').on('show.bs.collapse', function () {
        $(this).siblings('.panel-heading').addClass('active');
    }).on('hide.bs.collapse', function () {
        $(this).siblings('.panel-heading').removeClass('active');
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 1500);
        return false;
    }).tooltip('show');

    // Start Btc Function
    var totalETH = 0;
    var totalBNE = 0;
    var loadCurrencies = [
        // ['btc_currency', '/api/btc'],
        // ['eth_currency', '/api/eth'],
        // ['ltc_currency', '/api/ltc'],
        // ['dash_currency', '/api/dash'],
    ];

    var loadCurrency = function (index) {
        if (index < loadCurrencies.length) {
            setTimeout(function () {
                var processVal = loadCurrencies[index];
                if (document.getElementById(processVal[0])) axios.post(processVal[1]).then(function (r) {
                    $('#' + processVal[0]).html(r.data);
                    axios.post(processVal[1] + '_eth', {eth: r.data}).then(function (res) {
                        totalETH += res.data;
                        loadCurrency(index + 1);
                        var progressBar = $('.progress-bar-completed');
                        progressBar.html(totalETH + ' ETH');
                        progressBar.css('width', ((totalETH / progressBar.data('hardcap')) * 100) + '%');
                        totalBNE = totalETH * 3000;
                    });
                });
            }, 200);
        }
    };
    loadCurrency(0);

    $('.btc-transaction').click(function () {
        axios.post('/api/btc').then(function (r) {
            var usd = r.data;
            $("#btc_currency").html(usd);
        });
    });

    $(".subscribe-form").submit(function (e) {
        e.preventDefault();

        var $form = $(this);
        var $b = $form.find('button[type="submit"]');
        $b.button('loading');

        axios.post('/api/subscribe', $form.serialize()).then(function (r) {
            new Noty({
                type: 'success',
                text: r.data.message
            }).show();
            $form[0].reset();
            $b.button('reset');

            ga('send', 'event', 'Home', 'Click', 'SUBSCRIBE NOW');
        });

        return false;
    });

    $(".contactUs-form").submit(function (e) {
        e.preventDefault();

        var $form = $(this);
        var $b = $form.find('button[type="submit"]');
        $b.button('loading');

        axios.post('/api/contactUs', $form.serialize()).then(function (r) {
            new Noty({
                type: 'success',
                text: r.data.message
            }).show();
            $form[0].reset();
            $b.button('reset');

            ga('send', 'event', 'Home', 'Click', 'CONTACT US');
        });

        return false;
    });


    // Time slot
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));

        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = ('0' + t.days).slice(-2);
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
                changeClockWithDates();
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var clockIndex = -1;
    var initClockWithDates = function () {
        var $e = $('#clockdiv');
        var dates = $e.data('dates');
        var index = $e.data('index');
        var labels = $e.data('labels');

        if (clockIndex === -1) {
            clockIndex = index;
            var date = dates[clockIndex];
            $e.prev().html(labels[clockIndex]);
            if (dates[clockIndex])
                initializeClock('clockdiv', new Date(Date.UTC(date[0], date[1], date[2], date[3], date[4], date[5])));
        }
    };

    var changeClockWithDates = function () {
        var $e = $('#clockdiv');
        var dates = $e.data('dates');
        var labels = $e.data('labels');

        clockIndex++;
        $e.prev().html(labels[clockIndex]);
        var date = dates[clockIndex];
        if (dates[clockIndex])
            initializeClock('clockdiv', new Date(date[0], date[1], date[2], date[3], date[4], date[5]));
    };

    if (document.getElementById('clockdiv')) initClockWithDates();

    $('#Carousel, #Carousel1').carousel({
        interval: 5000
    });

    [].forEach.call(document.querySelectorAll('[data-src]'), function (img) {
        img.setAttribute('src', img.getAttribute('data-src'));
        img.onload = function () {
            img.removeAttribute('data-src');
        };
    });
});


