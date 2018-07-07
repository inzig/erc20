<!doctype html>
<html lang="en">
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110945392-1"></script>
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
            var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WWXVFHB');</script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-110945392-1');
    </script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- Title of page -->
    <title>@yield('title') {{config('app.name')}} ICO</title>
    <meta name="description" content="Benebit is a global decentralized ecosystem built on blockchain technology that enables interaction without borders between brands, companies and consumers.">
    <meta name="keywords" content="Benebit, ICO, Benebit ICO, cryptocurrency, Initial Coin Offering, smart contract, ethereum, bitcoin, blockchain, investments, decentralised">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
    <link href="/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/global/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css">
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="/assets/layout/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/layout/css/themes/blue.css" rel="stylesheet" type="text/css">
    <link href="/assets/layout/css/custom.min.css" rel="stylesheet" type="text/css">
    <!-- END THEME LAYOUT STYLES -->

    <!-- BEGIN VUEJS STYLES -->
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/custom-fonts/Glyphter.css">
    <!-- END VUEJS STYLES -->
@yield('css')

    <style>
        .page-header.navbar .page-top,
        .page-header.navbar .top-menu .navbar-nav > li.dropdown > .dropdown-toggle,
        .page-header.navbar .bg-logo,
        .page-sidebar-wrapper,
        .admin-side-menu ,
        .page-sidebar-menu > li > a ,
        .page-content-wrapper,
        .admin-top-menu
        {
            background: #0f193a !important;
        }
        .page-sidebar-menu > li > a:hover ,
        .page-sidebar-menu > li.active > a {
            background: #fc5b1b !important;
        }
        .page-container-bg-solid .page-content {
            background: #DFE2E7;
        }
    </style>   

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WWXVFHB" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <div id="icoAdmin">
        @include('admin.layouts.header')

        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"></div>
        <!-- END HEADER & CONTENT DIVIDER -->

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            @include('admin.layouts.menu')

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                @yield('content')
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

            @include('admin.layouts.quick-sidebar')
        </div>
        <!-- END CONTAINER -->

        @include('admin.layouts.footer')
    </div>

    <!-- BEGIN CORE PLUGINS -->
    <script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="/assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="/assets/layout/scripts/layout.min.js" type="text/javascript"></script>
    <script src="/assets/layout/scripts/demo.min.js" type="text/javascript"></script>
    <script src="/assets/layout/global/scripts/quick-nav.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->

    <!-- BEGIN VUE SCRIPTS -->
    <script src="{!! mix('js/admin.js') !!}" type="text/javascript"></script>
    <!-- END VUE SCRIPTS -->

@yield('js')
</body>
</html>