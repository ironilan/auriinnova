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
									@if (isset($categoria))
									<li class="with-ul {{$cat->id == $categoria->id ? 'show' : ''}}">
										<a href="javascript:void(0)">{{$cat->titulo}}</a>
										<ul style="{{$cat->id == $categoria->id ? 'display: block' : 'display: none'}}">
									@else
									<li class="with-ul ">
										<a href="javascript:void(0)">{{$cat->titulo}}</a>
										<ul style="display: none">
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

	<section class="product-wrapper bg-white appear-animate  pt-10 pb-8" data-animation-options="{
            'delay': '.3s'
        }">
        <div class="container">
            <h2 class="title">Productos relacionados</h2>
            <div id="responseProductosRelacionados"></div>
        </div>
    </section>

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


    const getProductosRelacionados = () => {
        let url = `{{ url('getProductosRelacionados') }}`;
        $.get(url, res =>{
            $('#responseProductosRelacionados').html(res);
        });
    }


	$(document).ready(() =>{
		@if(isset($categoria))
		getProductosCategoria('{{$categoria->id}}');
		@else
		getSubcategoriaMedidas('{{$subcategoria->id}}');
		@endif

        getProductosRelacionados();
	});
</script>
@endsection