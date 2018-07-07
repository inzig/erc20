@extends('dashboard.layouts.layout')

@section('content')
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Example Component</div>

            <div class="panel-body">
                I'm an example component!
            </div>
        </div>
        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
@endsection
