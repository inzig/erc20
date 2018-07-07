<section id="media-partners" class="wow bounceIn" data-wow-delay="0.2s">
    <div class="container-fluid mobile-padding-none">
        <h1 class="h-about text-center margin-none">Media Partners</h1>
        <div class="row margin-partner-sect">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center mobile-padding-none margin-top-50">
                @php
                    $partner = \BCES\Models\Partner::whereTitle('mediaPartner')->get();
                @endphp

                <div class="row display-mobile-off">
                    @foreach($partner as $partners)
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 margin-bottom-partners">
                            <div class="image-box">
                                <a href="{!!$partners->url!!}" target="_blank" data-etype="Home" data-etitle="{{$partners->name}}">
                                    <img class="partner-logos" src="{!!$partners->avatar!!}" alt="{{$partners->name}}"></a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="slick-partners display-mobile-on margin-top-30" data-slick='{"slidesToShow": 1, "slidesToScroll": 1}'>
                    @foreach($partner as $partners)
                        <div>
                            <div  class="image-box">
                            <a href="{!!$partners->url!!}" target="_blank" data-etype="Home" data-etitle="{{$partners->name}}"><img class="partner-logos" src="{!!$partners->avatar!!}" alt="{{$partners->name}}"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>