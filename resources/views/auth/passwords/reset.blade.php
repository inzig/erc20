@extends('layouts.app')

@section('title', 'Password Reset | ')

@section('content')
    <div id="particles-js" class="auth-section vh-100">
        <div id="login-register" class="container-fluid mobile-padding-none">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default m-0">

                        <div class="panel-heading text-center">
                           <a href="{{ route('home') }}"> <img class="login_pic" src="{{ URL::asset('images/logo-icon.png') }}"></a>
                            <h3 class="login-heading">Reset Password</h3>
                        </div>

                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="token" value="{{ $token }}">

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
                                </div>

                                <div class="bg-login">
                                    <button type="submit" class="btn form-buttons btn-primary form-button-color btn-lg btn-block margin-bottom-10"><i class="fa fa-key fa-fw"></i> Reset Password</button>
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
