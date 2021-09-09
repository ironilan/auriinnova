<section class="intro-section">
    <div class="">
            <div class="owl-carousel owl-theme row owl-dot-inner owl-dot-white intro-slider animation-slider cols-1 gutter-no"
            data-owl-options="{
            'nav': false,
            'dots': true,
            'loop': true,
            'items': 1,
            'autoplay': true,
            'autoplayTimeout': 8000
        }">
            @foreach ($banners as $banner)
            <div class="banner banner-fixed {{$banner->tipo == 'imagen' ? 'intro-slide1 ' : 'video-banner intro-slide3'}}" >
                @if ($banner->tipo == 'imagen')
                <img src="{{$banner->image}}" alt="{{$banner->title}}"> 
                @else
                <figure>
                    <video src="{{$banner->image}}" width="1903" height="630"></video>
                </figure>
                @endif          
            </div>
            @endforeach
        </div>

    
    </div>
</section>
