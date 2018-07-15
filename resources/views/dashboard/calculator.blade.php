@extends('dashboard.layouts.layout')

@section('title', 'FURT Price Calculation')

@section('content')
    <div class="panel panel-primary margin-top-50 margin-bottom-70 sm-top-30-p">
        <div class="panel-heading">FURT Price Calculation</div>
        <div class="panel-body padding-80">
            <div class="input-group">
                <input id="amount" type="number" class="form-control" placeholder=" Please Enter Amount" aria-describedby="basic-addon2">
                <span class="input-group-addon buy-token" id="basic-addon2">FURT</span>
            </div>
            <h2 class="card-text text-center arrow-down" style="color:#9442e0;"> &uarr;</h2>
            <div class="form-group dash-mobile-view-off">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-outline-secondary buy-token">BTC</button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-outline-secondary buy-token">ETH</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-outline-secondary buy-token">LTC</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-outline-secondary buy-token">DASH</button>
                    </div>
                </div>
                <div class="btn-group btn-group-justified calculate-values">
                    <div class="btn-group">
                        <button type="button" data-action="btc" class="btn btn-default btn-outline-secondary" data-value="{!! \BCES\Models\CCRate::where('type', 'bitcoin')->first()->btc !!}">0.00</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" data-action="eth" class="btn btn-default btn-outline-secondary" data-value="{!! \BCES\Models\CCRate::where('type', 'ethereum')->first()->btc !!}">0.00</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" data-action="ltc" class="btn btn-default btn-outline-secondary" data-value="{!! \BCES\Models\CCRate::where('type', 'litecoin')->first()->btc !!}">0.00</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" data-action="dash" class="btn btn-default btn-outline-secondary" data-value="{!! \BCES\Models\CCRate::where('type', 'dashcoin')->first()->btc !!}">0.00</button>
                    </div>
                </div>
            </div>

            <div class="form-group dash-mobile-view-on">
                <div class="row">
                    <div class="col-xs-12 margin-bottom-5">
                        <div class="col-xs-3 dash-calc-btc">BTC</div>
                        <div class="col-xs-9 dash-calc-value btc-value">0.00</div>
                    </div>
                    <div class="col-xs-12 margin-bottom-5">
                        <div class="col-xs-3 dash-calc-btc">ETH</div>
                        <div class="col-xs-9 dash-calc-value eth-value">0.00</div>
                    </div>
                    <div class="col-xs-12 margin-bottom-5">
                        <div class="col-xs-3 dash-calc-btc">LTC</div>
                        <div class="col-xs-9 dash-calc-value ltc-value">0.00</div>
                    </div>
                    <div class="col-xs-12 margin-bottom-5">
                        <div class="col-xs-3 dash-calc-btc">DASH</div>
                        <div class="col-xs-9 dash-calc-value dash-value">0.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
