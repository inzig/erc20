
<nav class="navbar navbar-inverse navbar-fixed-top nav-background wow fadeInUp" data-spy="affix"
     data-offset-top="50" data-wow-delay="0.1s">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="img-logo-height" data-src="/images/logos.jpg" alt="">
            </a>

            {{--<div class="pc-display-none margin-top-10">--}}
                {{--<a href="{{ route('login') }}" data-etype="Home" data-etitle="Contribute Now" class="btn-c btn-c-m">Contribute</a>--}}
                {{--<a href="{{ $settings->where('name', 'telegram_page')->first()->value }}" data-etype="Home" data-etitle="Telegram" class="btn-c btn-c-t"><i class="fa fa-telegram fa-t" aria-hidden="true"></i>Telegram</a>--}}
            {{--</div>--}}
        </div>

        <div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav">
                    {{--<li><a href="#About">@lang('welcome.About_Benebit')</a></li>--}}
                    {{--<li><a href="#feature">@lang('welcome.Features')</a></li>--}}
                    {{--<li><a href="#token-sale">@lang('welcome.Token_Sale')</a></li>--}}
                    {{--<li><a href="#roadmap">@lang('welcome.Roadmap')</a></li>--}}
                    {{--<li><a href="#team">@lang('welcome.Team')</a></li>--}}
                    {{--<li><a href="#media-partners">Media Partners</a></li>--}}
                    {{--<li><a href="#faq">@lang('welcome.Faq')</a></li>--}}
                    {{--<li><a class="whitepaper-btn-header" data-etype="Home" data-toggle="modal" data-target="#download-modal" data-etitle="Whitepaper" href="#"> WHITEPAPER </a></li>--}}
                    @guest
                        <li><a class="login-btn" data-etype="Home" data-etitle="Log in" href="{{ route('login') }}"> @lang('welcome.LOGIN') </a></li>
                    @endguest
                    @auth
                        <li>
                            <a v-if="!!auth" href="#" class="dropdown-toggle auth-anchor" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ auth()->user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu auth-icons" role="menu">
                                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-tachometer fa-fw"></i> Dashboard</a></li>
                                <li><a href="{{ route('dashboard.settings') }}"><i class="fa fa-cog fa-fw"></i> Settings</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-fw"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>