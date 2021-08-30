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
</div>
@endforeach

@else
<div class="product-wrap">
	<div class="product shadow-media">
		No se encontraron productos...
	</div>
</div>
@endif