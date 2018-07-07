<section id="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center margin-top-20 padding-contact">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 padding-0-40 wow fadeInLeft"
                         data-wow-delay="0.2s">
                        <h1 class="contact-us-h">@lang('welcome.CONTACT_US')</h1>
                        <form class="contactUs-form">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="@lang('welcome.Enter_your_name')" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="@lang('welcome.Enter_your_e-mail')" required>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control message-style" type="textarea" id="message" name="message" placeholder="@lang('welcome.Enter_your_message')" maxlength="140" rows="5"></textarea>
                            </div>

                            <button type="submit" data-loading-text="{{'<i class="fa fa-refresh fa-spin fa-fw"></i> contacting to support ...'}}" class="btn btn-send">@lang('welcome.SEND')</button>
                        </form>


                        <div>
                            <div class="row">
                            <div class="col-md-12 text-center  margin-top-60 mobile-margin-social-icons">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-15 social-media-home">
                            <a target="_blank" data-etype="Home" data-etitle="Telegram" href="{{ $settings->where('name', 'telegram_page')->first()->value }}"><i class="fa fa-telegram"></i></a>
                            <a target="_blank" data-etype="Home" data-etitle="Facebook" href="{{ $settings->where('name', 'facebook_page')->first()->value }}"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" data-etype="Home" data-etitle="Twitter" href="{{ $settings->where('name', 'twitter_page')->first()->value }}"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" data-etype="Home" data-etitle="Bitcoin Talk" href="{{ $settings->where('name', 'bitcoin_talk_page')->first()->value }}"><i class="fa fa-btc"></i></a>
                            <a target="_blank" data-etype="Home" data-etitle="Medium" href="{{ $settings->where('name', 'medium_page')->first()->value }}"><i class="fa fa-medium"></i></a>
                            <a target="_blank" data-etype="Home" data-etitle="Reddit" href="{{ $settings->where('name', 'reddit_page')->first()->value }}"><i class="fa fa-reddit"></i></a>
                            <a target="_blank" data-etype="Home" data-etitle="Github" href="{{ $settings->where('name', 'github_page')->first()->value }}"><i class="fa fa-github"></i></a>
                            </div>
                            </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
