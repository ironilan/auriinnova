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
									<li class="with-ul {{$cat->id == $categoria->id ? 'show' : ''}}">
										<a href="javascript:void(0)">{{$cat->titulo}}</a>
										<ul style="{{$cat->id == $categoria->id ? 'display: block' : 'display: none'}}">
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
            <a href="producto.php">
                <img src="{{$prod->imagen}}" alt="product" width="280" height="315">
            </a>
            @if ($prod->nuevo == 'si')
            <div class="product-label-group">
                <label class="product-label label-new">nuevo</label>
            </div>
            @endif
            
            <div class="product-action">
                <a href="producto.php" class="btn-product btn-quickview" title="Quick View">Ver más</a>
            </div>
        </figure>
        <div class="product-details">
            
            <div class="product-cat">
                <a href="#">{{$prod->categoria ? $prod->categoria->titulo : ''}}</a>
            </div>
            <h3 class="product-name">
                <a href="producto.php">{{$prod->nombre}}</a>
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
					{{-- <nav class="toolbox toolbox-pagination">
						<!-- <p class="show-info">mostr <span>12 of 56</span> Products</p> -->
						<ul class="pagination mx-auto">
							<li class="page-item disabled">
								<a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
									aria-disabled="true">
									<i class="d-icon-arrow-left"></i>Ant
								</a>
							</li>
							<li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
							<li class="page-item">
								<a class="page-link page-link-next" href="#" aria-label="Next">
									Prox<i class="d-icon-arrow-right"></i>
								</a>
							</li>
						</ul>
					</nav> --}}
				</div>
			</div>
		</div>
	</div>

	{{-- <section class="product-wrapper bg-white appear-animate  pt-10 pb-8" data-animation-options="{
	        'delay': '.3s'
	    }">
        <div class="container">
            <h2 class="title">Productos relacionados</h2>
            <div class="owl-carousel owl-theme row owl-nav-full cols-2 cols-md-3 cols-lg-4" data-owl-options="{
                'items': 5,
                'nav': false,
                'loop': false,
                'dots': true,
                'margin': 20,
                'autoplay': true,
                'responsive': {
                    '0': {
                        'items': 2
                    },
                    '768': {
                        'items': 3
                    },
                    '992': {
                        'items': 4,
                        'dots': false,
                        'nav': false
                    }
                }
            }">
                    <div class="product">
                        <figure class="product-media">
                            <a href="producto.php">
                                <img src="images/productos/1.JPG" alt="Blue Pinafore Denim Dress"
                                    width="280" height="315">
                            </a>
                            <div class="product-label-group">
                                <label class="product-label label-new">nuevo</label>
                            </div>
                            
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Ver más">Ver más</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            
                            <div class="product-cat">
                                <a href="#">Cierres</a>
                            </div>
                            <h3 class="product-name">
                                <a href="producto.php">Solid pattern in fashion summer dress</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">S/. 199.00</ins><del class="old-price">S/. 210.00</del>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <figure class="product-media">
                            <a href="producto.php">
                                <img src="images/productos/2.JPG" alt="Blue Pinafore Denim Dress"
                                    width="280" height="315">
                            </a>
                            
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Ver más">Ver más</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            
                            <div class="product-cat">
                                <a href="#">Cierres</a>
                            </div>
                            <h3 class="product-name">
                                <a href="producto.php">Mackintosh Poket backpack</a>
                            </h3>
                            <div class="product-price">
                                <span class="price">S/. 35.00</span>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <figure class="product-media">
                            <a href="producto.php">
                                <img src="images/productos/1.JPG" alt="Blue Pinafore Denim Dress"
                                    width="280" height="315">
                            </a>

                            <div class="product-label-group">
                                <label class="product-label label-new">Nuevo</label>
                            </div>
                            
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Ver más">Ver más</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            
                            <div class="product-cat">
                                <a href="#">Cierres</a>
                            </div>
                            <h3 class="product-name">
                                <a href="producto.php">Fashionablel women's-original-trucker</a>
                            </h3>
                            <div class="product-price">
                                <span class="price">S/. 19.00</span>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:60%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <figure class="product-media">
                            <a href="producto.php">
                                <img src="images/productos/2.JPG" alt="Blue Pinafore Denim Dress"
                                    width="280" height="315">
                            </a>
                            
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Ver más">Ver más</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            
                            <div class="product-cat">
                                <a href="#">Cierres</a>
                            </div>
                            <h3 class="product-name">
                                <a href="producto.php">Fashion dark obsidian EGT7 converse trainers</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">S/. 98.00</ins><del class="old-price">S/. 210.00</del>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <figure class="product-media">
                            <a href="producto.php">
                                <img src="images/productos/1.JPG" alt="Blue Pinafore Denim Dress"
                                    width="280" height="315">
                            </a>
                            
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Ver más">Ver más</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            
                            <div class="product-cat">
                                <a href="#">Cierres</a>
                            </div>
                            <h3 class="product-name">
                                <a href="producto.php">Women's Brown leather backpacks</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">S/. 98.00</ins><del class="old-price">S/. 210.00</del>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <figure class="product-media">
                            <a href="producto.php">
                                <img src="images/productos/2.JPG" alt="Blue Pinafore Denim Dress"
                                    width="280" height="315">
                            </a>
                            
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Ver más">Ver más</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            
                            <div class="product-cat">
                                <a href="#">Cierres</a>
                            </div>
                            <h3 class="product-name">
                                <a href="producto.php">Spon wide-striped shirt</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">S/. 98.00</ins><del class="old-price">S/. 210.00</del>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section> --}}

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