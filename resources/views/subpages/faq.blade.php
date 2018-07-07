<section id="faq" class="wow fadeInDown" data-wow-delay="0.2s">
    <div class="container-fluid padding-faq mobile-padding-20 mobile-padding-none">
        <h1 class="about-heading-2 text-center margin-none token-heading">@lang('welcome.FAQ')</h1>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 margin-top-40 mobile-padding-none">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="wrapper center-block">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                @foreach(\BCES\Models\Other::all() as $key=>$other)
                                    <div class="panel panel-default">
                                        <div class="panel-heading faq-panel active" role="tab">
                                            <h4 class="panel-title">
                                                <a class="panel-text" role="button" data-etype="Store" data-etitle="{{$other->name}}" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$loop->index}}" aria-expanded="true">
                                                    {{$other->title}}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_{{$loop->index}}" class="panel-collapse collapse " role="tabpanel">
                                            <div class="panel-body">
                                                {{$other->description}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--<div class="col-md-5 col-lg-5 col-sm-6 col-xs-12">--}}
                        {{--<img data-src="/images/FAQ.png" alt="">--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
</section>
