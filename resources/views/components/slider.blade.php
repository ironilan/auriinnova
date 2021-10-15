<section class="intro-section">
    <div class="">
            <div class="owl-carousel owl-theme row owl-dot-inner owl-dot-white intro-slider animation-slider cols-1 gutter-no"
            data-owl-options="{
            'nav': false,
            'dots': true,
            'loop': true,
            'items': 1,
            'autoplay': true,
            'autoplayTimeout': 10000
        }">
            @foreach ($banners as $banner)
            <div class="banner banner-fixed app_banner_principal {{$banner->tipo == 'imagen' ? 'intro-slide1 ' : 'video-banner intro-slide3'}}" >
                @if ($banner->tipo == 'imagen')
                <img src="{{$banner->image}}" alt="{{$banner->title}}" style="height: 450px; width: 100%;"> 
                @else                
                    <video autoplay loop  style="height: 450px; width: 100%;" class="myVideo">
                        <source src="{{$banner->image}}" type="video/mp4" />
                    </video>                
                @endif          
            </div>
            @endforeach
        </div>

    
    </div>
</section>
