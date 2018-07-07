<div class="navbar-default sidebar dash-mobile-view-off " role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="">
                <a href="{{ route('dashboard.index') }}">
                    <img class="admin-logo" src="/images/logo-icon.png" alt="logo">
                </a>
            </li>
            <li class="margin-top-100">
                <a href="{{ route('dashboard.index') }}" class="waves-effect">
                    <i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
                    <span class="hide-menu"> Dashboard </span>
                </a>
            </li>
            <li>
                <a href="{{\BCES\Models\Setting::whereName('payment_disabled')->first()->value=='no'?route('dashboard.purchased'):'javascript:;'}}" class="waves-effect">
                    <i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu"> Buy FURT Tokens </span>
                </a>
            </li>


            <li>
                <a href="{{route('dashboard.kyc')}}" class="waves-effect">
                    <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu">Know your customer </span>
                </a>
            </li>

            <li>
                <a href="{{route('dashboard.calculator')}}" class="waves-effect">
                    <i class="fa fa-calculator fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu"> Price Calculation </span>
                </a>
            </li>
            <li>
                <a href="{{route('dashboard.history')}}" class="waves-effect">
                    <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu"> Transaction History </span>
                </a>
            </li>
            <li>
                <a href="{{route('dashboard.referral')}}" class="waves-effect">
                    <i class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu"> Affiliates </span>
                </a>
            </li>
            <li class="text-center margin-top-50">
               <a href="/{{ app()->getLocale() }}#contact"> <button class="contribute-now-btn"> Contact Us</button></a>
                <div class="padding-0-20">
                    <hr class="hr-style-dash">
                </div>
                <a class="token-sale-terms" href="/{{ app()->getLocale() }}/terms-and-conditions">Token Sale Terms</a>
            </li>
        </ul>
    </div>
</div>

{{--mobile view--}}


<nav class="navbar navbar-inverse navbar-fixed-top dash-mobile-view-on">
    <div class="">
        <div class="navbar-header padding-m-10">
            <button type="button" class="navbar-toggle m-navbar-toggle" data-toggle="collapse" data-target="#myNavbar2">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand m-navbar-brand" href="{{ route('dashboard.index') }}">
                <img class="admin-logo" src="/images/logos.jpg" alt="logo">
            </a>
        </div>
        <div>
            <div class="collapse navbar-collapse navbar-right m-navbar-height dash-nav-padding-none" id="myNavbar2">
                <ul class="nav" id="side-menu">
                    <li class="dropdown hide-dash-mobilex text-center">
                        <a href="#" class="dropdown-toggle auth-anchor" data-toggle="dropdown" role="button" aria-expanded="false">
                             {{ \Auth::user()->name }}
                        </a>
                    </li>
                    <li class="text-center">
                        <a class="inline-center" href="{{ route('dashboard.settings') }}"><i class="fa fa-cog fa-fw"></i> Settings</a>
                        <a class="inline-center" href="{{ route('dashboard.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li class="margin-top-20">
                        <a href="{{ route('dashboard.index') }}" class="waves-effect">
                            <i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
                            <span class="hide-menu"> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{\BCES\Models\Setting::whereName('payment_disabled')->first()->value=='no'?route('dashboard.purchased'):'javascript:;'}}" class="waves-effect">
                            <i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>
                            <span class="hide-menu"> Buy ARTZ Tokens </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.kyc')}}" class="waves-effect">
                            <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                            <span class="hide-menu">KYC</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('dashboard.calculator')}}" class="waves-effect">
                            <i class="fa fa-calculator fa-fw" aria-hidden="true"></i>
                            <span class="hide-menu"> Price Calculation </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.history')}}" class="waves-effect">
                            <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>
                            <span class="hide-menu"> Transaction History </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.referral')}}" class="waves-effect">
                            <i class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                            <span class="hide-menu"> Affiliates </span>
                        </a>
                    </li>

                    <li class="text-center margin-top-20">
                        <a href="/{{ app()->getLocale() }}#contact"> <button class="contribute-now-btn"><b> Contact Us</b></button></a>
                        <div class="padding-0-20">
                            <hr class="hr-style-dash">
                        </div>
                        <a class="token-sale-terms" href="/{{ app()->getLocale() }}/terms-and-conditions">Token Sale Terms</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>



