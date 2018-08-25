@extends('layouts.app')

@section('title', 'Forgot Password |')

@section('content')
    <div id="particles-js" class="auth-section vh-100">
        <div id="login-register" class="container-fluid mobile-padding-none">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default m-0">

                        <div class="panel-heading text-center">
                         <a href="{{ route('home') }}"><img class="login_pic" src="{{ URL::asset('images/logo-icon.png') }}"></a>
                            <h3 class="login-heading">Reset Password</h3>
                        </div>

                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}

                                <div class="padding-login-fields">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label class="display-block">
                                                Email
                                            </label>
                                            <div class="input-group margin-bottom-10">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="email" class="form-control input-lg login-inputs" name="email" placeholder="Email" required>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-login">
                                    <button type="submit" class="btn form-custom-buttons btn-primary create-account-button btn-lg btn-block margin-bottom-10"><i class="fa fa-key fa-fw"></i> Send Password Reset Link</button>
                                </div>

                                <div class="col-md-12 padding-none">
                                    <a href="{{ route('login') }}" class="btn form-buttons btn-default form-button-color btn-lg btn-block btn-register"><i class="fa fa-sign-in fa-fw"></i> SIGN IN</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @if (session('error'))
        <script>
            jQuery(document).ready(function ($) {
                new Noty({
                    timeout: 2000,
                    type: 'error',
                    text: '{!! session('error') !!}'
                }).show();
            });
        </script>
    @endif
@endsection
