<section id="token-sale">
    <div class="container-fluid padding-token">
        <div class="row">
            <div class="mobile-margin-heading">
                <h1 class="about-heading text-center token-heading">@lang('welcome.Token') <span class="about-heading-2 token-heading">@lang('welcome.Sale')</span></h1>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 padding-token-sale margin-top-50">
                <div class="row">
                    <div class="col-md-4 col-sm-4 token-details width-31 padding-20 wow fadeInLeft"
                         data-wow-delay="0.2s">
                        <h2 class="details-heading">@lang('welcome.Details')</h2>
                        <div class="line-height-details">
                            <div class="details-p">@lang('welcome.Token_Name'): @lang('welcome.Goldiam_(GOL)')</div>
                            <div class="details-p">Token Symbol: ARTZ</div>
                            <div class="details-p">@lang('welcome.Token_Type'): @lang('welcome.ERC-20')</div>
                            <div class="details-p">@lang('welcome.Total_Token_Supply'): 700,000,000 (700 Million)</div>
                            {{--<div class="details-p">@lang('welcome.Available_For_Sale'): {{number_format($ethAddress->hard_cap, 0, '.', ',')}}</div>--}}
                            {{--<div class="details-p">@lang('welcome.Token_Price'): 0.1 ETH = {{$bneRate}} GOL</div>--}}
                            <div class="details-p">Minimum Sending Amount: 0.1 ETH </div>
                            <div class="details-p">Maximum Sending Amount: 10 ETH</div>
                            {{--<div class="details-p">Decimal Places(Default: 18): 18</div>--}}
                            <div class="details-p">ICO Token Price (ETH): 1 ARTZ = 0.0000125 ETH
                            </div>

                            {{--<div class="details-p">@lang('welcome.Minimum_Transactions'): {{$ethAddress->minimum}} ETH</div>--}}
                            <div class="details-p">@lang('welcome.Minimum_Goals'): 5000  ETH</div>
                            <div class="details-p">@lang('welcome.Maximum_Goals'): 37,500 ETH</div>
                            <div class="details-p">Purchase Methods Accepted: BTC, ETH, LTC, DASH</div>
                            <div class="details-p">Tokens available in PRE-Sale: 14,000,000 ARTZ </div>
                            <div class="details-p">Bonus in PRE-Sale ICO: 40% ARTZ</div>

                            <div class="details-p">@lang('welcome.PRESALE_STARTS_IN'): {{$ethAddress->pre_sale_at->toFormattedDateString()}}</div>
                            <div class="details-p">@lang('welcome.PRESALE_ENDS_IN'): {{$ethAddress->pre_sale_end_at->toFormattedDateString()}}</div>


                            <div class="details-p">@lang('welcome.PREICO_SALE_IN'): {{$ethAddress->pre_ico_at->toFormattedDateString()}}</div>
                            <div class="details-p">@lang('welcome.PREIC0_ENDS_IN'): {{$ethAddress->pre_ico_end_at->toFormattedDateString()}}</div>

                            <div class="details-p">@lang('welcome.Main_ICO_Starts'): {{$ethAddress->main_ico_at->toFormattedDateString()}}</div>
                            <div class="details-p">@lang('welcome.Main_ICO_Ends'): {{$ethAddress->ico_expire_at->toFormattedDateString()}}</div>
                            {{--<div class="benebit-details">  @lang('welcome.No_tokens_will_be_generated_after_ICO')--}}
                            {{--</div>--}}
                            {{--<div class="benebit-details">  @lang('welcome.Undistributed_tokens_will_be_destroyed_after_ICO')--}}
                            {{--</div>--}}
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 width-31 background">
                        <h2 class="details-heading-2">TOKEN DISTRIBUTION</h2>
                        <div id="container" style="width: 100%; height: 350px;  margin: 0 auto"></div>
                        <div class="margin-top-30">
                            <div>
                                <p class="progress-p">Company Founders, Management & Investor 15%</p>
                                <div class="progress height-p">
                                    <div class="progress-bar p-c1" role="progressbar" style="width: 10%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>

                            <div>
                                <p class="progress-p">Public Allocation 50%</p>
                                <div class="progress height-p">
                                    <div class="progress-bar p-c2" role="progressbar" style="
                                    width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>

                            <div>
                                <p class="progress-p">BARTVault Developer Team 13%</p>
                                <div class="progress height-p">
                                    <div class="progress-bar p-c3" role="progressbar" style="width: 12%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>
                            <div>
                                <p class="progress-p">Advisors and Early Supporters 3%</p>
                                <div class="progress height-p">
                                    <div class="progress-bar p-c4" role="progressbar" style="width: 3%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>

                            <div>
                                <p class="progress-p">Bounty Program: 5%</p>
                                <div class="progress height-p">
                                    <div class="progress-bar p-c5" role="progressbar" style="width: 5%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>

                            <div>
                                <p class="progress-p">Reserve Allocation 14%</p>
                                <div class="progress height-p">
                                    <div class="progress-bar p-c6" role="progressbar" style="width: 10%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>





                        </div>

                    </div>

                    <div class="col-md-4 col-sm-4 width-31 background wow fadeInRight" data-wow-delay="0.2s">
                        <h2 class="details-heading-2">FUNDS Allocation</h2>
                        <div id="container1" style="width: 100%; height: 350px;  margin: 0 auto"></div>

                        <div class="margin-top-30">
                            <div>
                                <p class="progress-p">Research & Development 40%</p>
                                <div class="progress height-p">
                                    <div class="progress-bar p-c1" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>

                            <div>
                                <p class="progress-p">Marketing & Sales 25%</p>
                                <div class="progress height-p">
                                    <div class="progress-bar p-c2" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>

                            <div>
                                <p class="progress-p">Admin & Operations 17%</p>
                                <div class="progress height-p">
                                    <div class="progress-bar p-c3" role="progressbar" style="width: 17%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>

                            <div>
                                <p class="progress-p">Legal & Compliance 6%</p>
                                <div class="progress height-p">
                                    <div class="progress-bar p-c4" role="progressbar" style="width: 6%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>

                            <div>
                                <p class="progress-p">Contingency 12%</p>
                                <div class="progress height-p">
                                    <div class="progress-bar p-c5" role="progressbar" style="width: 12%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>

        {{--<div class="row padding-55-0">--}}
            {{--<div class="col-md-12 text-center">--}}
                {{--<a href="{{ route('login') }}" class="btn-crowdsale-2">@lang('welcome.CONTRIBUTE_NOW')</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</section>