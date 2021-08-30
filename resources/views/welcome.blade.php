@extends('layouts.frontend')

@section('contenido')

<main class="main">
    <div class="page-content">
        
        @include('components.slider')


        <section class="grey-section pt-10 pb-10 appear-animate" data-animation-options="{
		    'delay': '.3s'
		}">
		    <div class="container pt-3">
		        <h2 class="title">Nuestras Categorías</h2>
		        <div id="responseCategorias"></div>
		    </div>
		</section>

        

        <section class="product-wrapper bg-white appear-animate  pt-10 pb-8" data-animation-options="{
            'delay': '.3s'
        }">
            <div class="container">
                <h2 class="title">Novedades</h2>
                <div id="responseNovedades"></div>
            </div>
        </section>

        <section class="banner-group mb-9 container text-uppercase appear-animate pt-10">
            <div class="row owl-carousel owl-theme" data-owl-options="{
                'items': 3,
                'dots': 'true',
                'autoplay': true,            
                'responsive': {
                    '0': {
                        'items': 2
                    },
                    '768': {
                        'items': 3,
                        'autoplay': true
                    },
                    '992': {
                        'items': 3,
                        'autoplay': true
                    }
                }
            }">
                @foreach ($bannergroup as $bg)
                <div class=" mb-4 mr-2">
                    <div class="banner banner-3 banner-fixed content-middle" data-animation-options="{
                        'name': 'fadeInLeftShorter',
                        'delay': '.5s'
                    }">
                        <figure>
                            <img src="{{$bg->imagen}}" alt="banner" width="380"
                                height="207" />
                        </figure>
                        <div class="banner-content">
                            <h3 class="banner-title font-weight-bold mb-0">{!!$bg->titulo!!}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <section class="product-wrapper pt-10 pb-10  appear-animate bg-white" data-animation-options="{
		    'delay': '.6s'
		}">
		    <div class="container">
		        <h2 class="title">Nuestros Productos</h2>
		        <div class=" row cols-2 cols-md-3 cols-lg-4 cols-xl-5" >
		            @foreach ($productos as $prod)
		            <div class="product">
		                <figure class="product-media">
							<a href="{{ route('productos.show', $prod) }}">
								<img src="{{$prod->imagen}}" alt="product" width="280" height="315">
							</a>
							@if ($prod->nuevo == 'si')
							<div class="product-label-group">
								<label class="product-label label-new">nuevo</label>
							</div>
							@endif
							
							<div class="product-action">
								<a href="{{ route('productos.show', $prod) }}" data-id="{{$prod->id}}" class="btn-product btn-quickview" title="Quick View">Ver más</a>
							</div>
						</figure>
						<div class="product-details">
							
							<div class="product-cat">
								<a href="#">{{$prod->categoria ? $prod->categoria->titulo : ''}}</a>
							</div>
							<h3 class="product-name">
								<a href="{{ route('productos.show', $prod) }}">{{$prod->nombre}}</a>
							</h3>
							<div class="product-price">
								<ins class="new-price">S/. {{$prod->precio_final}}</ins>
								@if ($prod->precio_antes)
				                <del class="old-price">S/. {{$prod->precio_antes}}</del>
				                @endif
							</div>
							<div class="ratings-container">
								<div class="ratings-full">
									<span class="ratings" style="width:{{$prod->estrellas}}"></span>
									<span class="tooltiptext tooltip-top"></span>
								</div>
								
							</div>
						</div>
		            </div>
		            @endforeach		            
		        </div>
		    </div>
		</section>

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
                    @foreach ($bannerinferior as $bi)
                    <div class="banner banner-fixed intro-slide1" style="background-color: #dddee0;">
                        <img src="{{$bi->imagen}}" alt="">
                    </div>
                    @endforeach
                    {{-- <div class="banner banner-fixed intro-slide1" style="background-color: #cacaca;">
                        <img src="images/bg/banner2.jpg" alt="">
                    </div> --}}
                    
                </div>
            
            </div>
        </section>

        <section class=" pt-10 pb-10 appear-animate bg-white" data-animation-options="{
            'delay': '.3s'
        }">
            <div class="container">
                <h2 class="title">Nuestros Clientes</h2>
                <div class="owl-carousel owl-theme row brand-carousel cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2"
                    data-owl-options="{
                    'nav': false,
                    'dots': false,
                    'autoplay': true,
                    'margin': 20,
                    'loop': true,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '576': {
                            'items': 3
                        },
                        '768': {
                            'items': 4
                        },
                        '992': {
                            'items': 5
                        },
                        '1200': {
                            'items': 5
                        }
                    }
                }">
                    @foreach ($clientes as $cliente)
                    <figure><img src="{{$cliente->logo}}" alt="{{$cliente->titulo}}" width="180" height="100" />
                    </figure>
                    @endforeach
                </div>
            </div>
        </section>

     

    </div>
</main>


@endsection

@section('scripts')

<script>
    const getCategorias = () => {
        let url = '{{ url('getCategorias') }}';
        $.get(url, res => {
            $('#responseCategorias').html(res);
        });
    }

    const getNovedades = () => {
        let url = '{{ url('getNovedades') }}';
        $.get(url, res => {
            $('#responseNovedades').html(res);
        });
    }


    $(document).ready(() => {
        getNovedades();
        getCategorias();
    });
</script>

@endsection