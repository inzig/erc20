@extends('layouts.app')

@section('title', 'Login | ')

@section('content')
    <div id="particles-js" class="auth-section vh-100">
        <div id="login-register" class="container-fluid container-flex mobile-padding-none">
            <div class="row">
                <div class="col-md-4 col-md-offset-4  ">
                    <div class="panel panel-default m-0">

                        <div class="panel-heading text-center">
                           <a href="{{ route('home') }}"> <img class="login_pic" width="80%" src="/images/logo-icon.png"> </a>
                            <h3 class="login-heading">Login to your account</h3>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="padding-login-fields">

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <label class="display-block">
                                                Email
                                            </label>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif

                                            <div class="input-group margin-bottom-10">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="email" class="form-control input-lg login-inputs" name="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label class="display-block">
                                                Password
                                            </label>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                            <div class="input-group margin-bottom-10">
                                                <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control input-lg login-inputs" name="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-login">
                                    <button type="submit" class="btn btn-primary form-custom-buttons create-account-button btn-lg btn-block margin-bottom-10"><i class="fa fa-sign-in fa-fw"></i> SIGN IN</button>


                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label class="pull-left">
                                                    <input type="checkbox" name="remember"> Remember me
                                                </label>

                                                <a class="pull-right forgot-link" href="{{ route('password.request') }}">Forgot Password?</a>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 padding-none">
                                    <a href="{{ route('register') }}" class="btn btn-default form-buttons btn-lg btn-block btn-register"><i class="fa fa-user-plus fa-fw"></i> Create an Account</a>
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
