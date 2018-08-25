<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">

        <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <!-- <div class="pull-left">
            <a href="{{route('dashboard.purchased')}}">
                <button class="contribute-now-btn">Contribute Now</button>
            </a>
        </div> -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="total-bne-border">
                <div class="total-bne"> Ether Balance
                    <div class="total"><span id="ethBalance">0</span><span class="bne"> Ether</span></div>
                </div>
            </li>
            <li class="total-bne-border">
                <div class="total-bne"> Token Balance
                    <div class="total"><span id="balance">{{ \Auth::user()->history()->sum('bnes') }}</span>
                    <span class="bne"> FURT</span></div>
                </div>
            </li>
            <li class="dropdown hide-dash-mobile">
                <a href="#" class="dropdown-toggle auth-anchor" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fa fa-user-o fa-dash-style" aria-hidden="true"></i> {{ \Auth::user()->name }} <span class="glyphicon glyphicon-menu-down caret-down" aria-hidden="true"></span>
                </a>
                <ul class="dropdown-menu auth-icons" role="menu">
                    @if(\Auth::user()->isAdmin())
                        <li><a href="/admin"><i class="fa fa-bar-chart fa-fw"></i> Admin Panel</a></li>
                    @endif
                    <li><a href="{{ route('dashboard.settings') }}"><i class="fa fa-cog fa-fw"></i> Settings</a></li>
                    <li>
                        <a href="{{ route('dashboard.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
