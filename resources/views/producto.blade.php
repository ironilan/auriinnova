@extends('layouts.frontend')

@section('contenido')
<main class="main pt-4 bg-white">
	<div class="page-content mb-10 ">
		<div class="container">
			<div class="product product-single row mb-4">
				<div class="col-md-6">
					<div class="product-gallery pg-vertical">
						<div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
							<figure class="product-image">
								<img src="{{$producto->imagen}}"
									data-zoom-image="{{$producto->imagen}}"
									alt="Women's Brown Leather Backpacks" width="800" height="900">
							</figure>
							@foreach ($producto->imagesproductos as $img)
							<figure class="product-image">
								<img src="{{$img->imagen}}"
									data-zoom-image="{{$img->imagen}}"
									alt="Women's Brown Leather Backpacks" width="800" height="900">
							</figure>
							@endforeach	
						</div>
						<div class="product-thumbs-wrap">
							<div class="product-thumbs">
								<div class="product-thumb active">
									<img src="{{$producto->imagen}}" alt="product thumbnail"
										width="109" height="122">
								</div>
								@foreach ($producto->imagesproductos as $img)
								<div class="product-thumb">
									<img src="{{$producto->imagen}}" alt="product thumbnail"
										width="109" height="122">
								</div>
								@endforeach	
								
							</div>
							<button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
							<button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="product-details">
						<div class="product-navigation">
							<ul class="breadcrumb breadcrumb-lg">
								<li><a href="{{ url('/') }}"><i class="d-icon-home"></i></a></li>
								<li><a href="#" class="active">Productos</a></li>
								<li>Detalle</li>
							</ul>

							
						</div>

						<h1 class="product-name">{{$producto->nombre}}</h1>
						<div class="product-meta">
							SKU: <span class="product-sku">{{$producto->sku}}</span>
						</div>
						<div class="product-price">S/. {{$producto->precio_final}}</div>
						<div class="ratings-container">
							<div class="ratings-full">
								<span class="ratings" style="width:{{$producto->estrellas}}"></span>
								<span class="tooltiptext tooltip-top"></span>
							</div>
							
						</div>
						<p class="product-short-desc">{!!$producto->descripcion!!}</p>

						<div class="product-form product-color">
							<label>Color:</label>
							<div class="product-variations">
								@foreach ($colores as $color)
								<a class="color" href="{{route('productos.show', $color)}}"
									style="background-color: {{$color->codigo_color}}" title="{{$color->color}}"></a>
								@endforeach
								
							</div>
						</div>

						<hr class="product-divider mb-3">

						<div class="product-footer">
							<div class="social-links">
								<a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
								<a href="#" class="social-link social-twitter fab fa-twitter"></a>
								<a href="#" class="social-link social-vimeo fab fa-vimeo-v"></a>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="tab tab-nav-simple product-tabs mb-4">
				<ul class="nav nav-tabs" role="tablist">
					
					<li class="nav-item">
						<a class="nav-link active" href="#product-tab-additional">Ficha técnica</a>
					</li>
					
				</ul>
				<div class="tab-content">
					
					<div class="tab-pane active in" id="product-tab-additional">
						<ul class="list-none">
							<li><label>PROCEDENCIA:</label>
								<p>{{$producto->procedencia}}</p>
							</li>
							<li><label>LARGO APROX:</label>
								<p>{{$producto->largo}} </p>
							</li>
							<li><label>ANCHO APROX:</label>
								<p>{{$producto->ancho}}</p>
							</li>
							<li><label>ALTO ESPESOR APROX:</label>
								<p>{{$producto->alto}}</p>
							</li>
							<li><label>PESO APROX:</label>
								<p>{{$producto->peso}}</p>
							</li>
							<li><label>MATERIAL:</label>
								<p>{{$producto->material}}</p>
							</li>
							<li><label>COLOR:</label>
								<p>{{$producto->color}}</p>
							</li>
							<li><label>ATRIBUTOS:</label>
								<p>{{$producto->atributos}}</p>
							</li>
							<li><label>LIMPIEZA Y/O MANTENIMIENTO:</label>
								<p>{{$producto->limpieza}}</p>
							</li>
							<li><label>RECOMENDACIONES / ADVERTENCIAS:</label>
								<p>{{$producto->recomendaciones}}</p>
							</li>
						</ul>
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
		</div>
	</div>
</main>

@endsection


@section('scripts')
<script>
	const getProductosRelacionados = () => {
        let url = `{{ url('getProductosRelacionados') }}`;
        $.get(url, res =>{
            $('#responseProductosRelacionados').html(res);
        });
    }


	$(document).ready(() =>{
		

        getProductosRelacionados();
	});
</script>
@endsection