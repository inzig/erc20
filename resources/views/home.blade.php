<?php exit("IN Progress"); ?>

@extends('layouts.app')

@section('title', 'Dashboard of application | ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-lg dashboard-counter">
                    <div class="informer">
                        <div class="informer-right">
                        <span class="countdown-compact is-countdown">
                            <span class="countdown-row">
                                <span class="countdown-section">
                                    <span id="countdownDays" class="countdown-amount">00</span>
                                    <span class="countdown-period">Days</span>
                                </span>
                                <span class="countdown-section">
                                    <span id="countdownHours" class="countdown-amount">00</span>
                                    <span class="countdown-period">Hours</span>
                                </span>
                                <span class="countdown-section">
                                    <span id="countdownMins" class="countdown-amount">00</span>
                                    <span class="countdown-period">Minutes</span>
                                </span>
                                <span class="countdown-section">
                                    <span id="countdownSeconds" class="countdown-amount">00</span>
                                    <span class="countdown-period">Seconds</span>
                                </span>
                            </span>
                        </span>
                            <span class="informer-exchange">
                            <span>Amount raised so far:</span><br>
                            <span><i class="fa fa-btc"></i> BTC {!! $bitcoin->earnings !!}</span>&nbsp; &nbsp; &nbsp; &nbsp;
                            <span><img src="/images/svgs/ETH.svg" alt=""> ETH {!! $ethereum->earnings !!}</span>
                            <br><br><br>
                            <load url="/api/rates/cc"></load>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">View ICO Tokens</div>
                    <div class="panel-body">
                        <token token="{!! $bitcoin->address !!}"
                               type='<i class="fa fa-btc"></i> show BTC Token'
                               minBtc="{!! $bitcoin->minimum !!} BTC"></token>

                        <token token="{!! $ethereum->address !!}"
                               type='<img src="/images/svgs/ETH.svg" alt=""> show ETH Token'
                               minbtc="{!! $ethereum->minimum !!} ETH"></token>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="col-ms-6">
                <h2 class="block-title">Earnings</h2>
                <div class="pie-chart" style="padding:0;width:350px;height:350px;">
                    <canvas id="bar-chart-dashboard" data-titles="{{ json_encode(['Purchasers'=>68,'Early adopters & founders'=>10,'Team'=>12,'Fund'=>10]) }}" width="260" height="260"></canvas>
                </div>
                <div id="bar-chart-dashboard-legend" class="pie-chart-legend" style="width:550px;padding:0;"></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
