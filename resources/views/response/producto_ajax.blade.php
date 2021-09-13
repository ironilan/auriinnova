<div class="product product-single row mb-4 product-popup">
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
						<img src="{{$producto->imagen}}" alt="product thumbnail" width="137"
							height="137">
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
		<div class="product-details scrollable">
			<h2 class="product-name"><a href="producto.php">{{$producto->nombre}}</a></h2>
			<div class="product-meta">
				SKU: <span class="product-sku">{{$producto->sku}}</span>
			</div>
			<small>{{$producto->precio_antes}}</small>
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
			
		

			<hr class="product-divider">

			


			<div class="product-footer">
				<div class="social-links mr-2">
					<a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
					<a href="#" class="social-link social-twitter fab fa-twitter"></a>
					<a href="#" class="social-link social-vimeo fab fa-vimeo-v"></a>
				</div>
				
			</div>
		</div>
	</div>
</div>