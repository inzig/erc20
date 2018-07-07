<template>
    <transition name="slide-fade">
        <div key="qr-code-view" v-if="viewQR==null">
            <div class="panel panel-primary margin-top-50 margin-bottom-50 sm-top-30-p">
                <div class="panel-heading">Choose a payment method</div>
                <div class="panel-body padding-80" :class="isMobile?'text-center':''">
                    <button @click="switchView('bitcoin', 'btc')" :class="{active:viewType==='bitcoin'}" class="btn btn-primary ar-icons"><i class="fa fa-btc"></i> Bitcoin Address</button>
                    <button @click="switchView('ethereum', 'eth')" :class="{active:viewType==='ethereum'}" class="btn btn-primary ar-icons"><span class="custom-icon custom-icon-3"></span> Ethereum Address</button>
                    <button @click="switchView('litecoin', 'ltc')" :class="{active:viewType==='litecoin'}" class="btn btn-primary ar-icons"><span class="custom-icon custom-icon-1"></span> Litecoin Address</button>
                    <button @click="switchView('dashcoin', 'dash')" :class="{active:viewType==='dashcoin'}" class="btn btn-primary ar-icons"><span class="custom-icon custom-icon-2"></span> Dashcoin Address</button>
                </div>
            </div>

            <div key="amount-form" v-if="viewType!==''" class="panel panel-primary margin-bottom-50" id="calculation-container">
                <div class="panel-heading">
                    Buy ARTZ  tokens with {{viewSlug.toUpperCase()}}
                    <i v-if="loading" class="fa fa-refresh fa-spin m-l-20"></i>
                    <div class="panel-action"><a href="javascript:" @click="closeTokenBuy"><i class="ti-close"></i></a></div>
                </div>

                <div class="panel-body form-material padding-80">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group m-t-20 margin-bottom-50">
                                <label for="input4" class="text-white-color">Amount ({{viewSlug.toUpperCase()}})</label>
                                <input class="form-control" id="input4" type="number" :placeholder="'Amount for '+viewType.toUpperCase()" @keyup="updateICO" v-model="amount">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <span class="help-block dark-text-color"><small><span v-if="minimum"> Minimum transaction amount is {{minimum}} {{viewSlug.toUpperCase()}} </span></small></span>
                            </div>

                            <p class="m-b-20">
                                <span class="font-2x text-white-color">{{viewSlug.toUpperCase()}}/USD exchange rate</span>
                                <br>
                                <span class="help-block dark-text-color">1 {{viewSlug.toUpperCase()}} = {{usdCal}} USD</span>
                            </p>

                            <p class="margin-bottom-50">
                                <span class="font-2x text-white-color">Amount of ARTZ  tokens</span>
                                <br>
                                <span class="help-block dark-text-color">Including bonus <span class="text-default">({{dataList.discount}}%): {{bonus}}</span> ARTZ  </span>
                            </p>

                            <p class="text-white-color">This is an estimated amount of ARTZ  tokens which you will receive.</p>

                            <div class="form-group margin-bottom-50">
                                <p class="form-control-static" v-html="total"></p>
                            </div>

                            <button :disabled="!this.total" class="btn  ar-icons" type="button" @click="showQRCode"><span class="btn-label"><i class="fa fa-check "></i></span>Click to Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div key="qr-code-input" id="qr-panel-container" class="panel panel-primary qr-panel-body margin-top-50 margin-bottom-70" v-else>
            <div class="panel-heading">
                Pay with {{viewSlug.toUpperCase()}}
                <div class="panel-action"><a href="javascript:" @click="viewQR=null;closeTokenBuy();"><i class="ti-close"></i></a></div>
            </div>
            <div class="panel-body padding-80 qr-code-bg ">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-8 col-xs-12">
                                <div class="form-group qr-code-input">
                                    <p class="text-left qr-minimum-text">Please send exactly <span class="font-w-btc"> {{amount}} {{viewSlug.toUpperCase()}} </span> to</p>
                                    <div class="input-group">
                                        <input type="text" class="form-control qr-copy light" :value="viewQR.address" :placeholder="'Token for '+viewType.toUpperCase()" id="copy-input-box">
                                        <span class="input-group-addon"><button type="button" class="btn btn-primary btn-copy" data-clipboard-action="copy" data-clipboard-target="#copy-input-box" @click="changeToCopied"><i class="fa fa-clone fa-fw"></i> copy</button></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <p class="form-control-static text-center qr-amount">You will receive <b>{{total}}</b> ARTZ  tokens</p>
                                </div>

                                <div v-if="!isMobile" class="margin-top-30">
                                    <a class="btn btn-block btn-copy btn-payments" href="/dashboard/home">I have made the payment</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="showcode text-center">
                                    <div>
                                        <qrcode :text="viewQR.address" :size="200"></qrcode>
                                        <div class="text-right btc-exchange">
                                            1 {{viewSlug.toUpperCase()}} <i class="fa fa-exchange" aria-hidden="true"></i> {{usdCal}} USD
                                        </div>
                                    </div>
                                </div>

                                <div v-if="isMobile">
                                    <a class="btn btn-block btn-copy btn-payments" href="/dashboard/home">I have made the payment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        data() {
            return {
                amount: '',
                minimum: '',
                viewType: '',
                viewSlug: '',
                viewQR: null,
                dataList: {},
                ratesInterval: '',
                rates: {},
                bonus: 0,
                total: 0,
                loading: false
            };
        },

        computed: {
            usdCal() {
                if (typeof this.rates.USD === 'undefined')
                    return 0;
                else
                    return this.rates.USD;
            },

            icoCal() {
                if (typeof this.rates.ETH === 'undefined')
                    return 0;
                else
                    return this.rates.ETH;
            },

            isMobile() {
                return window.isMobile.any();
            }
        },

        mounted() {
            axios.get('/api/purchase/config').then(r => {
                this.dataList = r.data;
            });
        },

        methods: {
            closeTokenBuy() {
                this.viewType = '';
                this.viewSlug = '';
                clearInterval(this.ratesInterval);
            },

            switchView(view, slug) {
                if (view === this.viewType)
                    this.closeTokenBuy();
                else {
                    this.viewType = view;
                    this.viewSlug = slug;
                    this.amount = '';
                    this.updateRates();
                    this.scrollToCal();
                }
            },

            scrollToCal() {
                if (this.isMobile)
                    setTimeout(function () {
                        $('html, body').animate({
                            scrollTop: $('#calculation-container').offset().top - 75
                        }, 600);
                    }, 350);
            },

            scrollToQR() {
                if (this.isMobile)
                    setTimeout(function () {
                        $('html, body').animate({
                            scrollTop: $('#qr-panel-container').offset().top - 75
                        }, 600);
                    }, 650);
            },

            updateICO() {
                let timer = 0;
                clearTimeout(timer);
                timer = setTimeout(() => {
                    if (this.amount >= this.minimum) {
                        this.total = Math.round((this.dataList.bneRateDis * this.icoCal * this.amount) * 100000000) / 100000000;
                        this.bonus = Math.round((((this.dataList.discount / 100) * this.dataList.bneRate) * (this.icoCal * this.amount)) * 100000000) / 100000000;
                        let amtSplit = this.amount.split('.');
                        if (typeof amtSplit[1] !== 'undefined' && amtSplit[1].length > 8)
                            this.amount = Math.round(this.amount * 100000000) / 100000000;
                    } else {
                        this.total = 0;
                        this.bonus = 0;
                    }
                }, 300);
            },

            updateRates() {
                this.updateFetchedRates();
                this.ratesInterval = setInterval(this.updateFetchedRates, 60000);
            },

            updateFetchedRates() {
                this.loading = true;
                $.ajax({
                    url: 'https://min-api.cryptocompare.com/data/price?fsym=' + this.viewSlug.toUpperCase() + '&tsyms=ETH,USD',
                    method: 'get'
                }).then(r => {
                    this.rates = r;
                    this.loading = false;
                    this.minimum = Math.round(((1 / r.ETH) * this.dataList.ethAddress.minimum) * 100000000) / 100000000;
                    this.updateICO();
                });
            },

            showQRCode() {
                axios.get('/api/contract/address/' + this.viewType.toLowerCase()).then((r) => {
                    this.viewQR = r.data;
                    this.scrollToQR();
                });
            },

            changeToCopied(e) {
                $(e.target).html('<i class="fa fa-clipboard fa-fw"></i> copied');
            }
        }
    }
</script>
