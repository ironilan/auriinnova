@extends('layouts.frontend')

@section('contenido')

<main class="main">
    <div class="page-header" style="background-image: url({{$nosotros->banner}})">
        <h1 class="page-title">{{$nosotros->titulo}}</h1>
    </div>
    <div class="page-content mt-10 pt-7">
        <section class="about-section">
            <div class="container">
                <h2 class="title mb-lg-9">{{$nosotros->subtitulo}}</h2>
                <div class="row mb-10">
                    <div class="col-md-6">
                        <img class="w-100 mb-4 appear-animate"
                            data-animation-options="{'name':'fadeInLeftShorter'}"
                            src="{{$nosotros->imagen}}" alt="Donald Store" width="587" height="517"
                            style="position: sticky; top: 2rem;">
                    </div>
                    <div class="col-md-6 order-md-first ">
                        <div class=" text-grey mb-0 text-justify">{!!$nosotros->descripcion!!}</div>
                        
                    </div>
                    <div class="col-md-12 col-12">
                        <div class=" text-grey mb-0 text-justify">{!!$nosotros->descripcion2!!}</div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section-->

        <section class="reviews-section grey-section pt-10 pb-10">
            <div class="container appear-animate" data-animation-options="{'name':'fadeInRightShorter'}">
                <h2 class="title mt-2">Objetivos de la empresa</h2>
                <div class=" app_flex "
                    >
                    
                    <div class="app_margen_mision testimonial app_obj testimonial-centered bg-white">
                        <div class="testimonial-info">
                            <h3 class="testimonial-title">Misión</h3>
                            <figure class="testimonial-author-thumbnail">
                                <img src="{{$nosotros->icono_mision}}" alt="user" width="140" height="140" />
                            </figure>
                            <blockquote>{{$nosotros->mision}}</blockquote>
                            
                        </div>
                    </div>
                    <div class="testimonial app_obj testimonial-centered bg-white">
                        <div class="testimonial-info">
                            <h3 class="testimonial-title">Visión</h3>
                            <figure class="testimonial-author-thumbnail">
                                <img src="{{$nosotros->icono_vision}}" alt="user" width="140" height="140" />
                            </figure>
                            <blockquote>{{$nosotros->vision}}</blockquote>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

    

        <section class="clients-section grey-section pt-10 pb-10">
            <div class="container">
                <h2 class="title mt-3">Valores</h2>
                <div class="owl-carousel owl-theme row brand-carousel cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2 gutter-no pt-1"
                    data-owl-options="{
                    'items': 7,
                    'nav': false,
                    'dots': false,
                    'autoplay': true,
                    'margin': 30,
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
                            'items': 6
                        }
                    }
                }">
                    @foreach ($valores as $valor)
                    <figure>
                        <img src="{{$valor->imagen}}" alt="brand" width="180" height="100" style="height: 158px;" /><br>
                        <p class="">{{$valor->titulo}}</p>
                    </figure>
                    @endforeach
                    
                </div>
            </div>
        </section>
        <!-- End Clients Section -->
    </div>
</main>


@endsection

@section('scripts')


@endsection