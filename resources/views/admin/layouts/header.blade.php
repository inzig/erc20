
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo bg-logo ">
            <a href="{{ route('admin.index') }}"><img src="/images/logo-icon.png" alt="logo" class="margin-top-5 logo-default"/></a>
            <div class="menu-toggler sidebar-toggler"></div>
        </div>
        <a href="javascript:" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <div  class="page-top admin-top-menu">
            <div class=" top-menu" >
                <ul class="nav navbar-nav pull-right">
                    @php
                        $notifications = auth()->user()->notifications;
                    @endphp
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            @if($notifications->where('read_at', null)->count())
                                <span class="badge badge-default"> {{$noti=$notifications->where('read_at', null)->count()}} </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3><span class="bold">{{isset($noti)?$noti:0}} pending</span> notifications</h3>
                                <a href="javascript:">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    @foreach($notifications as $notification)

                                        <li>
                                            <a href="javascript:" class="link-click" data-id="{{$notification->id}}" data-href="{{route('admin.kyc',['verifykyc'=>$notification->data['kyc']])}}">
                                                <span class="time">{{$notification->created_at->diffForHumans()}}</span>
                                                <span class="details">
                                                        <span class="label label-sm label-icon label-{{$notification->read_at==null?'success':'default'}}">
                                                            <i class="fa fa-plus"></i>
                                                        </span> {{$notification->data['message']}} </span>
                                            </a>
                                        </li>

                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle auth-anchor" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ auth()->user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu auth-icons" role="menu">
                            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-tachometer fa-fw"></i> Dashboard</a></li>
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
        </div>
    </div>
</div>
