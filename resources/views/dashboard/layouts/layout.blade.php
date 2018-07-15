<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
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
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title of page -->
    <title>@yield('title') | {{config('app.name')}}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('custom-fonts/Glyphter.css') }}">
    <link href="{{ URL::asset('css/noty.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/dashboard.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            background: #752627;
        }
    </style>

    @yield('page-styles')
    <style>
        #page-wrapper > nav > div,
        #wrapper > div.navbar-default.sidebar,
        #page-wrapper,
        .footer-bg-dash,
        .panel.panel-primary,
        .social-media-bg,
        .panel.panel-default,
        .panel.panel-default > div.panel-heading
        {
            background: #0f193a !important;
        }
        .panel-darkblue .panel-heading, .panel-primary .panel-heading
        {
            background: #fc5b1b !important;
        }
        .dash-bg{
            background: #DFE2E7;
        }
        .admin-logo {
    height: 100%;
    margin-top: 0;
}
    </style>  
</head>
<body class="fix-sidebar investor-panel">

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WWXVFHB" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <div id="wrapper">
        <!-- .header -->
        @include('dashboard.layouts.header')
        <!-- /.header -->

        <!-- .left-sidebar -->
        @include('dashboard.layouts.left-sidebar')
        <!-- /.left-sidebar -->

        <div id="page-wrapper">
            <!-- .container-fluid -->
            @include('dashboard.layouts.breadcrumb')
            <div class="container-fluid dash-bg">
                <!-- .breadcrumb -->

                <!-- /.breadcrumb -->

                @yield('content')

                <!-- .right-sidebar -->
                @include('dashboard.layouts.right-sidebar')
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-left footer-bg-dash">
                <p>Have any questions? Please contact us at  </p>
                <p>&copy; {!! date('Y') !!} All rights reserved</p>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ URL::asset('js/dashboard.js') }}"></script>

    @if (session('status'))
        <script>
            jQuery(document).ready(function ($) {
                new Noty({
                    type: 'success',
                    text: '{!! session('status') !!}'
                }).show();
            });
        </script>
    @endif

    @php
        $noties=auth()->user()->notifications()->whereNull('read_at')->get()
    @endphp
    @if ($noties->count())
        <script>
            jQuery(document).ready(function ($) {
                @foreach($noties as $noty)
                new Noty({
                    type: 'success',
                    timeout: 8000,
                    text: '{!! $noty->data['message'] !!}'
                }).show();
                axios.post('/api/notification/read/{{$noty->id}}');
                @endforeach
            });
        </script>
    @endif

    @if (session('warning'))
        <script>
            jQuery(document).ready(function ($) {
                new Noty({
                    type: 'warning',
                    text: '{!! session('warning') !!}'
                }).show();
            });
        </script>
    @endif

    @yield("page-scripts")
</body>
</html>
