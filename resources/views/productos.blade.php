@extends('layouts.frontend')

@section('contenido')

<main class="main">
	<section class="intro-section" style="height: 40rem;">
        <div class="" id="responseBanner">
            
        
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
										class="d-icon-arrow-left"></i>
								</a>
							</div>
							<div class="widget widget-collapsible">
								<h3 class="widget-title">Categorías</h3>
								<ul class="widget-body filter-items search-ul">
									@foreach ($categorias as $cat)
									@if (isset($categoria))
									<li class="with-ul {{$cat->id == $categoria->id ? 'show' : ''}}">
										<a href="javascript:void(0)" onclick="getBannerCategoria({{$cat->id}})">{{$cat->titulo}}</a>
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
					<div id="responseProductos"></div>
					
				</div>
			</div>
		</div>
	</div>

	<section class="product-wrapper bg-white appear-animate  pt-10 pb-8">
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
            setTimeout(() => {
            	$(".carousel_relacionados").owlCarousel({
					'items': 5,
				        'nav': true,
				        'loop': true,
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
				                'items': 5,
				                'dots': true,
				                'nav': true
				            }
				        }
				});
            }, 1000)
        });
    }


    const getBanner = () => {
    	let url = '{{ url('getBannerProductos') }}'

    	$.get(url, res => {
    		$('#responseBanner').html(res);
    	});
    }

    const getBannerCategoria = (idcategoria) => {
    	let url = `{{ url('getBannerCategorias') }}?categoria_id=${idcategoria}`;
    	//console.log('ssddddddddd');
    	$.get(url, res => {
    		$('#responseBanner').html(res);
    	});
    }


    const getProductosAll = () => {
    	let url = '{{ url('getProductosAll') }}';
    	$.get(url, res => {
    		$('#responseProductos').html(res);
    	});
    }


	$(document).ready(() =>{
		@if (Request::path() == 'productos')
			getProductosAll();
		@else
			@if(isset($categoria))
			getProductosCategoria('{{$categoria->id}}');
			@else
			getSubcategoriaMedidas('{{$subcategoria->id}}');
			@endif
		@endif
		

        
        getProductosRelacionados();
        

        getBanner();
	});



	//***** paginacion ****************/
	$(document).on('click', '.productosAll nav .pagination a', function(e){
		e.preventDefault();

		let page = $(this).attr('href').split('page=')[1];
		let route = `{{ url('getProductosAll') }}?page=${page}`;

		$.get(route, res => {
			$('#responseProductos').html(res);
		});
	});

	$(document).on('click', '.paginateSubctegoria nav .pagination a', function(e){
		e.preventDefault();

		let page = $(this).attr('href').split('page=')[1];
		let subcategoria = $('.paginateSubctegoria').attr('data-id');
		let route = `{{ url('getProductosSubcategoria') }}?idsubcategoria=${subcategoria}&page=${page}`;


		$.get(route, res => {
			$('#responseProductos').html(res);
		});
	});


</script>
@endsection