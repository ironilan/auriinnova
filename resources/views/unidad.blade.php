@extends('layouts.frontend')

@section('contenido')

<main class="main">
            <div class="page-header" style="background-image: url({{$unidad->banner}})">
                <h1 class="page-title">Unidades de negocio</h1>
            </div>
            <div class="page-content pt-10 bg-white">
                <section class=" pt-10 pb-10 appear-animate bg-white" data-animation-options="{
                    'delay': '.3s'
                }">
                    <div class="container">
                        <h2 class="title">
                            <img src="{{$unidad->logo}}" alt="" class="logo_manofactura">
                        </h2>
                        <div class=" unidad_content ">
                            <p class="text-grey ">{{$unidad->descripcion}}</p>
                            <div class="mx-auto">
                                <img src="{{$unidad->imagen}}" alt="brand"  />
                            </div>
                        </div>
                    </div>
                </section>


                <section class="contact-section pb-10 pt-10 bg_gray">
                    <div class="container">
                        <h2 class="title">Líneas de productos</h2>
                        <div class=" app_flex "
                            >
                            
                            @foreach ($unidad->lineas as $linea)
                            <div class="mr-lg-6 testimonial app_obj testimonial-centered bg-white">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-title">{!!$linea->titulo!!}</h3>
                                    <figure class="testimonial-author-thumbnail app_figure_unidad">
                                        <img src="{{$linea->imagen}}" alt="{{$linea->titulo}}" width="180" height="180" />
                                    </figure>
                                    
                                    
                                </div>
                            </div>
                            @endforeach
                            
                            
                        </div>
                    </div>
                </section>
                
                

                <section class=" pt-10 pb-10 appear-animate bg-white" data-animation-options="{
                    'delay': '.3s'
                }">
                    <div class="container">
                        <h2 class="title">Valor agregado</h2>
                        <div class=" row brand-carousel cols-xl-4 cols-lg-4 cols-md-4 cols-sm-3 cols-2" >
                            @foreach ($unidad->valoragregado as $valor)
                            <figure style="height: 200px;">
                                <img src="{{$valor->imagen}}" alt="brand" width="180" height="100" style="height: 150px;" />
                                <br>
                                <p>{!!$valor->titulo!!}</p>
                            </figure>
                            @endforeach
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


@endsection