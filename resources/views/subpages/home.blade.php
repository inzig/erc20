<section id="main">
    <div id="particles-js">
        <div class="overlay">
            <div class="container-fluid">
                <div class="row margin-top-50">
                    <div id="home-bg" class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 wow fadeIn padding-col-md-6" data-wow-delay="0.2s">

                        {{--Text Start--}}

                        <h2 class="text-upper wow bounceInLeft" data-wow-delay="0.3s"> ART PROVENANCE FOREVER </h2>

                        <p class="text-upper-2">
                            With Blockchain Art Toujours
                        </p>

                        {{--Text End--}}


{{--Buttons Start--}}

                        <div class="margin-top-50 margin-bottom-20 text-center mobile-text-center">
                            <a data-toggle="modal" data-target="#download-modal" data-etype="Home" data-etitle="Contribute Now" class="btn btn-info btn-whitepaper-2 wow slideInLeft" data-wow-delay="0.3s" type="submit">@lang('welcome.DOWNLOAD_WHITEPAPER')</a>
                            <a class="btn btn-info btn-crowdsale wow slideInRight" data-etype="Home" data-etitle="Download WhitePaper" data-wow-delay="0.3s" href="{{ route('login') }}">Join BARTVault </a>
                        </div>
{{--Buttons End--}}

                        <div class="modal fade" id="download-modal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">Download Whitepapers</h3>
                                    </div>
                                    <div class="modal-body">
                                        <a href="{{asset('storage/whitepaper-full.pdf')}}" class="btn btn-info btn-whitepaper-2"><i class="fa fa-download" aria-hidden="true"></i> Download full Whitepaper</a> <a href="{{asset('storage/whitepaper-min.pdf')}}" class="btn btn-info btn-whitepaper-2"><i class="fa fa-download" aria-hidden="true"></i> Download mini Whitepaper</a>

                                    </div>
                                </div>

                            </div>
                        </div>


                        {{--Timer start--}}

                        <div  class="countdown-padding margin-top-20 mobile-no-margin-padding">
                            <div class="wow fadeInUp" data-wow-delay="0div.col-sm-3:nth-child(1).3s">
                                <div>
                                    <h3 class="presale-heading">{{ $title }}</h3>
                                    <div id="clockdiv" data-dates="{{ json_encode($dates) }}" data-labels="{{ json_encode($labels) }}" data-index="{{ $index }}">
                                        <div class="timer">
                                            <span class="days">00</span>
                                            <div class="smalltext">Days</div>
                                        </div>
                                        <span class="dot-size">:</span>
                                        <div class="timer">
                                            <span class="hours">00</span>
                                            <div class="smalltext">Hours</div>
                                        </div>
                                        <span class="dot-size">:</span>
                                        <div class="timer">
                                            <span class="minutes">00</span>
                                            <div class="smalltext">Minutes</div>
                                        </div>
                                        <span class="dot-size">:</span>
                                        <div class="timer">
                                            <span class="seconds">00</span>
                                            <div class="smalltext">Seconds</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{--Timer End--}}




{{--Progress Bar Start--}}

                        <div class="row">
                            <div  class="col-md-12 text-center padding-progressbar margin-top-10 mobile-progressbar-margin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-15">
                                    <div class="progress progress-bar-style">
                                        <div class="zero progressbar-succes-color"></div>
                                        {{--<div class="one progressbar-succes-color"></div>--}}
                                        {{--<div class="two progress-bar-uncompleted"></div>--}}
                                        <div class="three progress-bar-uncompleted"></div>
                                        <div class="progress-bar progress-bar-completed" style="width: {{$bar>3?$bar:3}}%"></div>
                                        <div class="c1">
                                            <span><img src="/images/line-p.png"></span><br/>
                                            0 ETH
                                        </div>
                                        {{--<div class="c2">--}}
                                            {{--<span><img src="/images/line-p.png"></span><br/>--}}
                                            {{--000,000 USD--}}
                                        {{--</div>--}}
                                        {{--<div class="c3">--}}
                                            {{--<span><img src="/images/line-p.png"></span><br/>--}}
                                            {{--000,000 USD--}}
                                        {{--</div>--}}
                                        <div class="c4">
                                            <span><img src="/images/line-p.png"></span><br/>
                                            37,500 ETH
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Progress Bar End--}}

                        {{--Coins Start--}}

                        <div class="coins-raised margin-top-80 text-left">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="btc-transaction">
                                        <i class="custom-icon custom-icon-4 ci-pos" aria-hidden="true"></i><span class="coins-numbers" id="btc_currency"> {{ number_format($btcAddress->earnings,3) }} <span class="m-display-block">BTC</span></span>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="eth-transaction">
                                        <span class="custom-icon custom-icon-3 ci-pos" aria-hidden="true"></span><span class="coins-numbers" id="eth_currency"> {{ number_format($ethAddress->earnings,3) }} <span class="m-display-block">ETH</span></span>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="ltc-transaction">
                                        <span class="custom-icon custom-icon-1 ci-pos" aria-hidden="true"></span><span class="coins-numbers" id="ltc_currency"> {{ number_format($ltcAddress->earnings,3) }} <span class="m-display-block">LTC</span></span>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="dash-transaction">
                                        <i class="custom-icon custom-icon-2 ci-pos" aria-hidden="true"></i><span class="coins-numbers" id="dash_currency"> {{ number_format($dshAddress->earnings,3) }} <span class="m-display-block">DASH</span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{--Coins End--}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
