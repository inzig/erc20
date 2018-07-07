<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse admin-side-menu">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu admin-side-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item {{ route('admin.index') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ route('admin.team') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.team') }}" class="nav-link nav-toggle">
                    <i class="icon-users "></i>
                    <span class="title">Team</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item {{ route('admin.advisor') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.advisor') }}" class="nav-link nav-toggle">
                    <i class="icon-users "></i>
                    <span class="title">Advisors</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item {{ route('admin.kyc') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.kyc') }}" class="nav-link nav-toggle">
                    <i class="icon-users "></i>
                    <span class="title">KYCS</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ route('admin.partner') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.partner') }}" class="nav-link nav-toggle">
                    <i class="icon-users "></i>
                    <span class="title">Partners</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item {{ route('admin.mediaPartner') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.mediaPartner') }}" class="nav-link nav-toggle">
                    <i class="icon-users "></i>
                    <span class="title">Media Partners</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ route('admin.roadmap') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.roadmap') }}" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-road"></i>
                    <span class="title">Roadmap</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ route('admin.other') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.other') }}" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-th-large"></i>
                    <span class="title">Faqs</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ route('admin.subscribe') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.subscribe') }}" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-user"></i>
                    <span class="title">Subscribers</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ route('admin.users.index') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Members &amp; Profile</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ (route('admin.transactions', 'known') == request()->url() || route('admin.transactions', 'unknown') == request()->url()) ? 'active open' : '' }}">
                <a href="javascript:" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Transactions</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ route('admin.transactions', 'known') == request()->url() ? 'active open' : '' }}">
                        <a href="{{ route('admin.transactions', 'known') }}" class="nav-link">
                            <span class="title">Transactions / States</span>
                        </a>
                    </li>
                    <li class="nav-item {{ route('admin.transactions', 'unknown') == request()->url() ? 'active open' : '' }}">
                        <a href="{{ route('admin.transactions', 'unknown') }}" class="nav-link">
                            <span class="title">Un-identified Transactions</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ route('admin.manual') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.manual') }}" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Manual Transactions</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ route('admin.referrals') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.referrals') }}" class="nav-link nav-toggle">
                    <i class="fa fa-share-square-o"></i>
                    <span class="title">Referral Transactions</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ route('admin.setting') == request()->url() ? 'active' : '' }}">
                <a href="{{ route('admin.setting') }}" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Settings</span>
                    <span class="selected"></span>
                </a>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->
