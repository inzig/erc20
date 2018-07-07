<div class="row align-items-center justify-content-center mt-5">
    <div class="col-12">
        <div class="row justify-content-center">
            <h1 class="lato-font-regular">Our <strong class="lato-font-bold bitnautic-blue-text">Partners</strong></h1>
        </div>
            
            @php
                $partner = \BCES\Models\Partner::all();
            @endphp
            <div class="row justify-content-center position-relative">
            <div class="light-overlay"></div>
                @foreach($partner as $partners)               
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row">
                            <a href="{!!$partners->url!!}" target="_blank" data-etype="Home" data-etitle="{{$partners->name}}" rel="noreferrer">
                                <img class="w-100 h-100" src="{!!$partners->avatar!!}" alt="{{$partners->name}}" alt="partnerlogo" />
                            </a>
                        </div>
                    </div>
                            
                        
                @endforeach
            </div>
            
           
               
            </div>
        </div>
    </div>

                