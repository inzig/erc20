@extends('dashboard.layouts.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="panel panel-primary margin-top-30">
        <div class="panel-heading">MY ETH WALLET</div>
        <div class="panel-body">
            <div style="position:relative;">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="post" class="wallet-value-form" action="{{ route('dashboard.profile.update') }}">
                            {{ csrf_field() }}

                            <p class="font-12 margin-bottom-30">Enter your Ethereum address below to receive ARTZ token:</p>

                            <div class="form-group" style="margin:0">
                                <label for="ethereumWallet">Ethereum Address:</label>
                                <input type="hidden" name="type" value="ethereum">
                                @php
                                    $usrEthereum = \Auth::user()->icos()->where('type', 'ethereum')->first();
                                @endphp
                                @if($usrEthereum)
                                    <input type="text" class="form-control" id="walletAddress" name="address" data-toggle="popover" data-html="true" data-placement="top" data-trigger="focus" title="<i class='fa fa-exclamation-triangle fa-fw'></i> Important Notice" @if(!$usrEthereum->updated_once) data-content="You can update your address only once."
                                           data-template='<div class="popover popover-danger" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>' @else readonly="readonly" data-content="You have already updated your ETH address. Please contact us if you want to change your address."
                                           data-template='<div class="popover popover-danger" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>' @endif value="{{ $usrEthereum->address }}">
                                @else
                                    <input type="text" class="form-control" id="walletAddress" name="address">
                                @endif
                                @if(!$usrEthereum->updated_once)
                                    <button type="submit" class="btn btn-primary update-btn"> Update</button>
                                @endif
                            </div>

                            <div class="row margin-top-50">
                                <ul class="line-height-dash">
                                    <li>Providing Ethereum ERC20 compatible address is necessary.</li>
                                    <li>DO NOT use a wallet from exchanges such as Bittrex, Coinbase or Poloniex.</li>
                                    <li>If you haven’t had any ETH address yet? Go to <a target="_blank" href="https://www.myetherwallet.com/">MyEtherWallet</a> and create yours.</li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary margin-top-30">
        <div class="panel-heading">CURRENT STATE</div>
        <div class="panel-body">
            <div class="row padding-30-0">
                <div class="col-sm-12">
                    <div class="col-md-6 col-sm-12">
                        <div class="col-sm-6 col-md-6">
                            <div class="state-h">Invested Total</div>
                            <div class="state-total border-right-dash"> <i class="cf cf-eth btc-style"></i> {{ number_format($totalInvestedEth,3) }}</div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="state-total border-right-dash margin-top-32"><i class="fa fa-usd btc-style" aria-hidden="true"></i> {{ number_format(($btcAddress->usd+$ethAddress->usd+$ltcAddress->usd+$dshAddress->usd), 2) }}</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 tab-margin-top-20">
                        <div class="col-sm-6 col-md-6 border-part">
                            <div class="state-h">Participants</div>
                            <div class="state-total border-right-dash"><i class="fa fa-user-o btc-style" aria-hidden="true"></i> {{ \BCES\Models\User::where('id','!=',1)->has('history')->count() }}</div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="state-h">Current Bonus</div>
                            <div class="state-total"><i class="fa fa-certificate btc-style" aria-hidden="true"></i> {{ $discount }}%</div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row padding-30-0">
                <div class="col-sm-12 col-md-12">
                    <div class="state-h margin-bottom-dash">Invested</div>
                    <div class="col-md-2 col-sm-3 text-center">
                        <i class="cf cf-btc cryptocurrencies-icons"></i>
                        <div class="cb-value">{{ number_format($btcAddress->earnings,3) }}</div>
                        <div class="btc-label">BTC</div>
                    </div>

                    <div class="col-md-2 col-sm-3 text-center">
                        <i class="cf cf-dash cryptocurrencies-icons"></i>
                        <div class="cb-value">{{ number_format($dshAddress->earnings,3) }}</div>
                        <div class="btc-label">DASH</div>
                    </div>

                    <div class="col-md-2 col-sm-3 text-center">
                        <i class="cf cf-ltc cryptocurrencies-icons"></i>
                        <div class="cb-value">{{ number_format($ltcAddress->earnings,3) }}</div>
                        <div class="btc-label">LTC</div>
                    </div>

                    <div class="col-md-2 col-sm-3 text-center">
                        <i class="cf cf-eth cryptocurrencies-icons"></i>
                        <div class="cb-value">{{ number_format($ethAddress->earnings,3) }}</div>
                        <div class="btc-label">ETH</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="panel panel-primary margin-top-30">
        <div class="panel-body social-media-bg">
            <div class="row seven-cols">
                @php
                    $settings = \BCES\Models\Setting::all();
                @endphp

                <div class="col-md-1 text-center">
                    <a class="social-a-dash" href="{{ $settings->where('name', 'facebook_page')->first()->value }}">
                        <img src="/images/icons/i.png">
                        <div class="margin-social-icons-dash">Facebook</div>
                    </a>
                </div>

                <div class="col-md-1 text-center">
                    <a class="social-a-dash" href="{{ $settings->where('name', 'twitter_page')->first()->value }}">
                        <img src="/images/icons/i2.png">
                        <div class="margin-social-icons-dash">Twitter</div>
                    </a>
                </div>

                <div class="col-md-1 text-center">
                    <a class="social-a-dash" href="{{ $settings->where('name', 'reddit_page')->first()->value }}">
                        <img src="/images/icons/i3.png">
                        <div class="margin-social-icons-dash">Reddit</div>
                    </a>
                </div>

                <div class="col-md-1 text-center">
                    <a class="social-a-dash" href="{{ $settings->where('name', 'github_page')->first()->value }}">
                        <img src="/images/icons/i4.png">
                        <div class="margin-social-icons-dash">Github</div>
                    </a>
                </div>

                <div class="col-md-1 text-center">
                    <a class="social-a-dash" href="{{ $settings->where('name', 'bitcoin_talk_page')->first()->value }}">
                        <img src="/images/icons/i5.png">
                        <div class="margin-social-icons-dash">Bitcoin Talk</div>
                    </a>
                </div>

                <div class="col-md-1 text-center">
                    <a class="social-a-dash" href="{{ $settings->where('name', 'medium_page')->first()->value }}">
                        <img src="/images/icons/i6.png">
                        <div class="margin-social-icons-dash">Medium</div>
                    </a>
                </div>

                <div class="col-md-1 text-center">
                    <a class="social-a-dash" href="{{ $settings->where('name', 'telegram_page')->first()->value }}">
                        <img src="/images/icons/i7.png">
                        <div class="margin-social-icons-dash">Telegram</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default margin-top-30 margin-bottom-70">
        <div class="panel-heading panel-heading-dash">Bonuses</div>
        <div class="panel-body">
            <div class="card-body padding-top-60">
                <div class="roadmap-container col-md-12">
                    <div class="mar_box__items">

                        @php
                            $bonuses = \BCES\Models\ICOBonus::orderBy('week')->get();
                        @endphp


                        <div class="mar_box__item tooltipster">
                            <div class="mar_box__item-in">
                                <div class="mar_box__item-numb">{{ $bonuses->where('type', 'Pre Sale')->first()->discount }}%</div>
                                <div class="mar_box__item-line" style="width: {{ $bonuses->where('type', 'Pre Sale')->first()->discount }}%;"></div>
                                <div class="mar_box__item-line dark" style="width: {{ 100-$bonuses->where('type', 'Pre Sale')->first()->discount }}%;"></div>
                                <div class="clearfix"></div>
                                <div class="mar_box__item-underlinenumb">{{ $bonuses->where('type', 'Pre Sale')->first()->type }}</div>
                            </div>
                        </div>


                        <div class="mar_box__item tooltipster">
                            <div class="mar_box__item-in">
                                <div class="mar_box__item-numb">{{ $bonuses->where('type', 'Pre ICO')->first()->discount }}%</div>
                                <div class="mar_box__item-line" style="width: {{ $bonuses->where('type', 'Pre ICO')->first()->discount }}%;"></div>
                                <div class="mar_box__item-line dark" style="width: {{ 100-$bonuses->where('type', 'Pre ICO')->first()->discount }}%;"></div>
                                <div class="clearfix"></div>
                                <div class="mar_box__item-underlinenumb">{{ $bonuses->where('type', 'Pre ICO')->first()->type }}</div>
                            </div>
                        </div>

                        @foreach($bonuses->where('week', '!=', 0) as $bonus)
                            <div class="mar_box__item tooltipster">
                                <div class="mar_box__item-in">
                                    <div class="mar_box__item-numb">{{ $bonus->discount }}%</div>
                                    <div class="mar_box__item-line" style="width: {{ $bonus->discount }}%;"></div>
                                    <div class="mar_box__item-line dark" style="width: {{ 100-$bonus->discount }}%;"></div>
                                    <div class="clearfix"></div>
                                    <div class="mar_box__item-underlinenumb">Week {{ $bonus->week }}</div>
                                </div>
                            </div>
                        @endforeach

                        <div class="mar_box__item tooltipster">
                            <div class="mar_box__item-in">
                                <div class="mar_box__item-numb">{{ $bonuses->where('type', 'Remaining days')->first()->discount }}%</div>
                                <div class="mar_box__item-line" style="width: {{ $bonuses->where('type', 'Remaining days')->first()->discount }}%;"></div>
                                <div class="mar_box__item-line dark" style="width: {{ 100-$bonuses->where('type', 'Remaining days')->first()->discount }}%;"></div>
                                <div class="clearfix"></div>
                                <div class="mar_box__item-underlinenumb">{{ $bonuses->where('type', 'Remaining days')->first()->type }}</div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
