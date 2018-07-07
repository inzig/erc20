<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110945392-1"></script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title of page -->
    <title>@yield('title'){{config('app.name')}} ICO</title>

    <!-- Styles -->
    <style>
        html, body {
            background: #762627;
        }
    </style>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
</head>
<body class="body-login @yield('body-override')">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WWXVFHB" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <noscript>Please enable javascript on your browser</noscript>

    <div id="BCES">
        @yield('content')
    </div>

    @include('subpages.footer')

    <div class="spinner-container side-loader" id="sideLoader">
        <div class="spinner-frame">
            <div class="spinner-cover"></div>
            <div class="spinner-bar"></div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>
    <script src="{{ mix('js/app.js') }}"></script>
@yield('js')
</body>
</html>
