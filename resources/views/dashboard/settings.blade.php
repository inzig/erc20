@extends('dashboard.layouts.layout')

@section('title', 'Update user\'s information')

@section('content')
    <div class="row margin-top-50 sm-top-30">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="form-group qr-code-input m-0">
                        <div class="input-group ">
                            <input type="text" class="form-control qr-copy" style="color:#fff !important;" value="{{config('app.url')}}/register?ref={{auth()->user()->referral->referral}}" id="copy-input-box">
                            <span class="input-group-addon"><button type="button" class="btn btn-primary btn-copy update-btn" data-clipboard-action="copy" data-clipboard-target="#copy-input-box"><i class="fa fa-clone fa-fw"></i> copy referral link</button></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Email confirmation when logging in</div>
                <div class="panel-body">
                    <input type="checkbox" {{ auth()->user()->oauth ? 'checked' : '' }} class="switch-chk">
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">Update your profile</div>
                <div class="panel-body">
                    @if(isset($profile))
                        <div class="alert alert-success" role="alert">{{ $profile }}</div>
                    @endif
                    <form action="/dashboard/user/update" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="inputName">Name <span class="text-danger red-text-color">*</span></label>
                            <input type="text" id="inputName" class="form-control" name="name" value="{{ auth()->user()->name }}" placeholder="Enter your complete name" required>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" disabled>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-primary btn-lg btn-block update-btn"><i class="fa fa-user-o fa-fw"></i> Update Profile</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Update your password</div>
                <div class="panel-body">
                    <form action="/dashboard/user/update/password" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="inputCurrentPassword">Current Password <span class="text-danger red-text-color">*</span></label>
                            <input type="password" id="inputCurrentPassword" class="form-control" name="current" placeholder="Enter your old password" required>
                        </div>

                        <div class="form-group">
                            <label for="inputNewPassword">New Password <span class="text-danger red-text-color">*</span></label>
                            <input type="password" id="inputNewPassword" class="form-control" name="password" placeholder="Enter your new password" required>
                        </div>

                        <div class="form-group">
                            <label for="inputConfirmPassword">Confirm Password <span class="text-danger red-text-color">*</span></label>
                            <input type="password" id="inputConfirmPassword" class="form-control" name="password_confirmation" placeholder="Confirm your new password" required>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-primary btn-lg btn-block update-btn "><i class="fa fa-key fa-fw"></i> Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
