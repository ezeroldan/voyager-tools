<div class="slideshow">
    
    @if ($slides)
        <b-carousel id="{{ $id }}" controls indicators fade background="#ababab" img-width="1024" img-height="480">
            @foreach ($slides as $slide)
                <b-carousel-slide
                    text="{{ $slide->texto }}"
                    caption="{{ $slide->titulo }}"
                    img-src="{{ asset(theme_url('home_bg.jpg')) }}"
                    @if ($slide->color) background="{{ $slide->color }}" @endif
                ></b-carousel-slide>
            @endforeach
        </b-carousel>
    @endif
    
    @if ($slot)
        <div class="slot">
            <div class="container">
                {{ $slot }}
            </div>
        </div>
    @endif
    
</div>