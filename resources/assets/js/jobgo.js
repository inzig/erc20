jQuery(document).ready(function ($) {
    $('.preloader').fadeOut(1000);

    (new WOW()).init();

    $('.template-nav').singlePageNav({
        offset: 70
    });

    /* Hide mobile menu after clicking on a link
    -----------------------------------------------*/
    $('.navbar-collapse a').click(function () {
        $(".navbar-collapse").collapse('hide');
    });

    $(document).on('click', '.dropdown-language a', function () {
        window.location.href = $(this).attr('href');
    });


    // Start Of Timer
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            total: t,
            days: days,
            hours: hours,
            minutes: minutes,
            seconds: seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector(".days");
        var hoursSpan = clock.querySelector(".hours");
        var minutesSpan = clock.querySelector(".minutes");
        var secondsSpan = clock.querySelector(".seconds");

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
            minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
            secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
    initializeClock("clockdiv", deadline);
    // End of Timer

    $("#pieChart").drawPieChart([
        {title: "Founders & Team", value: 10, color: "#139FC0"},
        {title: "Presale & Main ICO", value: 80, color: "#5058AB"},
        {title: "Advisors", value: 6, color: "#02CC9C"},
        {title: "Bounty Campaign", value: 4, color: "#7CE214"}
    ]);


    $(".subscribe-form").submit(function (e) {
        e.preventDefault();

        var $form = $(this);

        axios.post('/api/subscribe', $form.serialize()).then(function (r) {
            new Noty({
                type: 'success',
                text: r.data.message
            }).show();
            $form[0].reset();
        });

        return false;
    });




});
