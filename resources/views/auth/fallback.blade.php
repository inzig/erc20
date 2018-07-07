@extends('layouts.app')

@section('title', 'User Account | ')

@section('body-override', 'ok-alert')

@section('content')
    <div id="particles-js" class="auth-section vh-100">
        <div id="login-register" class="container-fluid mobile-padding-none">
            <div class="Aligner">
                <div class="col-md-4 col-xs-12 Aligner-item Aligner-item--fixed">
                    <div class="panel panel-default m-0">
                        <div class="panel-heading text-center">
                            <a href="{{ route('home') }}"><img class="login_pic" src="/images/login-logo.jpg" alt=""></a>
                        </div>

                        <div class="panel-body">
                            <div style="padding:2rem 3rem">
                                <p class="{{session('error')?'text-danger':''}}">{!! session('status') !!}</p>
                                <p class="text-danger">{!! session('error') !!}</p>
                            </div>

                            <div class="col-md-12 padding-none">
                                <a href="{{ route('home') }}" class="btn btn-default btn-lg btn-block btn-register"><i class="fa fa-long-arrow-left fa-fw"></i> back to home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
