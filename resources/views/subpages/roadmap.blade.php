<section id="roadmap" class="section intro">
    <div class="text-center">
        <h1 class="about-heading-2 token-heading">Roadmap</h1>
    </div>


    <div class="timeline">
        <ol>
            @foreach(\BCES\Models\Roadmap::all() as $key => $roadmap)
                @if($key % 2 == 0 )
                    <li>
                        <div>
                            <time>{!! $roadmap->year !!}</time>{!! $roadmap->description !!}
                        </div>
                    </li>
                @endif
                @if($key % 2 == 1)
                    <li>
                        <div>
                            <time>{!! $roadmap->year !!}</time>
                            {!! $roadmap->description !!}
                        </div>
                    </li>
                @endif
            @endforeach
        </ol>


    </div>
</section>