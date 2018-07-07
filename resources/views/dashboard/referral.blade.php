@extends('dashboard.layouts.layout')

@section('title', trans('welcome.Currency').' Affiliate')

@section('content')
    <div class="row margin-top-50">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="form-group qr-code-input m-0">
                    <div class="input-group">
                        <input type="text" class="form-control qr-copy" value="{{config('app.url')}}/register?ref={{auth()->user()->referral->referral}}" id="copy-input-box">
                        <span class="input-group-addon"><button type="button" class="btn btn-primary btn-copy
update-btn" data-clipboard-action="copy" data-clipboard-target="#copy-input-box"><i class="fa fa-clone fa-fw"></i> copy referral link</button></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="row margin-top-50 referral">
        <div class="panel panel-primary margin-top-50 margin-bottom-70 sm-top-30-p">
            <div class="panel-heading">Affiliate User History</div>
            <div class="panel-body padding-80">
                @php
                    $referrers = \Auth::user()->referral->users;
                @endphp

                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($referrers as $referrer)
                            <tr>
                                <td>{!! $referrer->name !!}</td>
                                <td>{!! $referrer->email !!}</td>
                                <td>{!! $referrer->created_at !!}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    <h2 style="color: #fff">You have no users to show yet.</h2>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>



@endsection
