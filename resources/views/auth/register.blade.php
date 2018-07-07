@extends('layouts.app')

@section('title', 'Registration | ')

@section('content')
    <div id="particles-js" class="auth-section vh2-100">
        <div id="login-register" class="container-fluid mobile-padding-none" style="padding-bottom:4rem !important;">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default m-0">
                        <div class="panel-heading text-center">
                            <a href="{{ route('home') }}"><img class="login_pic" src="/images/login-logo.jpg" alt=""></a>
                            <h3 class="login-heading">Create an Account</h3>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-signup" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="padding-login-fields">

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label class="display-block">
                                                Name
                                            </label>
                                            <div class="input-group margin-bottom-10">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control input-lg login-inputs" name="name" placeholder="Name" required>
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label class="display-block">
                                                Email
                                            </label>
                                            <div class="input-group margin-bottom-10">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="email" class="form-control input-lg login-inputs" name="email" placeholder="Email" required>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label class="display-block">
                                                Password
                                            </label>
                                            <div class="input-group margin-bottom-10">
                                                <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control input-lg login-inputs" name="password" placeholder="Password" required>
                                            </div>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label class="display-block">
                                                Password confirmation
                                            </label>
                                            <div class="input-group margin-bottom-10">
                                                <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control input-lg login-inputs" name="password_confirmation" placeholder="Password confirmation" required>
                                            </div>

                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('ethwalet') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label class="display-block">
                                                Ethereum address
                                            </label>
                                            <div class="input-group eth-input margin-bottom-10">
                                                <span class="input-group-addon"><i class="fa fa-remove"></i></span>
                                                <input type="text" class="form-control input-lg login-inputs" name="ethwalet" placeholder="Ethereum address" required>
                                            </div>

                                            @if ($errors->has('ethwalet'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ethwalet') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group hidden">
                                        <div class="col-md-12">
                                            <label class="display-block">
                                                Referral code
                                            </label>
                                            <div class="input-group eth-input margin-bottom-10 login-inputs-referral">
                                                <span class="input-group-addon"><i class="fa fa-share-square-o"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin:0">
                                        <div id="g-recaptcha" class="text-center" render="explicit" data-sitekey="{!! config('app.captcha') !!}"></div>
                                    </div>

                                    <div class="">
                                        <label style="line-height:1.5;">
                                            <input type="checkbox" name="terms" class="margin-checkbox" value="1" required><span class="agreed-text"> I have read and agree with <a class="form-anchor-tag-color term-conditions-color" target="_blank" href="{{ route('terms-and-conditions') }}">Token Sale Terms.</a></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="bg-login">
                                    <button type="button" class="btn form-custom-buttons btn-primary create-account-button btn-lg btn-block btn-signup margin-bottom-10"><i class="fa fa-user-plus fa-fw"></i> CREATE AN ACCOUNT</button>
                                </div>

                                <div class="col-md-12 padding-none">
                                    <a href="{{ route('login') }}" class="btn form-buttons  btn-default  btn-lg btn-block btn-register"><i class="fa fa-sign-in fa-fw"></i> Sign In</a>
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
