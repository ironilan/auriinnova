@extends('layouts.frontend')

@section('contenido')

<main class="main">
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
	                <div class="banner banner-fixed intro-slide1 app_banner" style="background-color: red;">
	                    <img src="{{asset('frontend/images/bg/banner2.jpg')}}" alt="">
	                   
	                </div>
	                <div class="banner banner-fixed intro-slide1 app_banner" style="background-color: #dddee0;">
	                    <img src="{{asset('frontend/images/bg/banner2.jpg')}}" alt="">
	                   
	                </div>
	            </div>
	        
	        </div>
	    </section>
	<!-- End PageHeader -->
	<div class="page-content mb-10 bg-white">
		<div class="container">
			<div class="row main-content-wrap gutter-lg">
				<aside
					class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
					<div class="sidebar-overlay">
						<a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
					</div>
					<div class="sidebar-content">
						<div class="sticky-sidebar" data-sticky-options="{'top': 10}">
							<div class="filter-actions">
								<a href="#"
									class="sidebar-toggle-btn toggle-remain btn btn-sm btn-outline btn-primary">Filtrar<i
										class="d-icon-arrow-left"></i></a>
								<a href="#" class="filter-clean text-primary">Limpiar</a>
							</div>
							<div class="widget widget-collapsible">
								<h3 class="widget-title">Categorías</h3>
								<ul class="widget-body filter-items search-ul">
									@foreach ($categorias as $cat)
                                    @if ($categoria)
                                    <li class="with-ul {{$cat->id == $categoria->id ? 'show' : ''}}">
                                        <a href="javascript:void(0)">{{$cat->titulo}}</a>
                                        <ul style="{{$cat->id == $categoria->id ? 'display: block' : 'display: none'}}">
                                    @else
                                    <li class="with-ul ">
                                        <a href="javascript:void(0)">{{$cat->titulo}}</a>
                                        <ul style="">
                                    @endif
									
											@if ($cat->subcategorias)
											@foreach ($cat->subcategorias as $subc)
											<li class="pd0 subca subca_{{$subc->id}}"><a href="javascript:void(0)" onclick="getSubcategoriaMedidas({{$subc->id}})">{{$subc->titulo}}</a></li>
											@endforeach
											@endif											
										</ul>
									</li>
									@endforeach
									
								</ul>
							</div>
						</div>
					</div>
				</aside>
				<div class="col-lg-9 main-content">
					<div class="mb-4 mt-4" id="responseMedidas">
						
					</div>
					<div class="row cols-2 cols-sm-3 cols-md-4 product-wrapper" id="responseProductos">
						
                        @if (count($productos) > 0)
                        @foreach ($productos as $prod)
                        <div class="product-wrap">
                            <div class="product shadow-media">
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
                                        <a href="{{ route('productos.show', $prod) }}" class="btn-product btn-quickview" data-id="{{$prod->id}}" title="Quick View">Ver más</a>
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
                        </div>
                        @endforeach

                        @else
                        <div class="product-wrap">
                            <div class="product shadow-media">
                                No se encontraron productos...
                            </div>
                        </div>
                        @endif
						
					</div>
					@php
						$idcat = $_GET['idcategoria'];
						$criterio = $_GET['criterio'];
					@endphp
					{{$productos->setPath("buscar?idcategoria=$idcat&criterio=$criterio")}}
				</div>
			</div>
		</div>
	</div>

	
</main>


@endsection

@section('scripts')

<script>
	const getProductosCategoria = (categoria) =>{
		let url = '{{ url('getProductosCategoria') }}?idcategoria='+categoria;
		$.get(url, res =>{
			$('#responseProductos').html(res);
		});
	}


	const getProductosSubcategoria = (subcategoria) =>{

		let url = '{{ url('getProductosSubcategoria') }}?idsubcategoria='+subcategoria;
		$.get(url, res =>{
			$('#responseProductos').html(res);
		});
	}

	//las medidas
	const getSubcategoriaMedidas = (idsubcategoria) =>{
		let url = '{{ url('getSubcategoriaMedidas') }}?idsubcategoria='+idsubcategoria;

		$('.subca').removeClass('show');
		$('.subca_'+idsubcategoria).removeClass('show').addClass('show');

		$.get(url, res =>{
			$('#responseMedidas').html(res);
		});

		getProductosSubcategoria(idsubcategoria);
	}


	//cuando haces click en una media se filtra lsas productos
	const getProductosMedida = (idmedida, idsubcategoria) => {
		let url = `{{ url('getProductosMedida') }}?idsubcategoria=${idsubcategoria}&idmedida=${idmedida}`;
		$.get(url, res =>{
			$('#responseProductos').html(res);
		});
	}


	
</script>
@endsection