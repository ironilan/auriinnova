<div class="owl-carousel owl-theme carousel_relacionados">
    
    @foreach ($productos as $prodRel)
    <div class="product">
        <figure class="product-media">
            <a href="{{ route('productos.show', $prodRel) }}">
                <img src="{{$prodRel->imagen}}" alt="{{$prodRel->nombre}}"
                    width="280" height="315">
            </a>
            @if ($prodRel->nuevo == 'si')
            <div class="product-label-group">
                <label class="product-label label-new">nuevo</label>
            </div>
            @endif
            
            <div class="product-action">
                <a href="{{ route('productos.show', $prodRel) }}" data-id="{{$prodRel->id}}" class="btn-product btn-quickview" title="Ver más">Ver más</a>
            </div>
        </figure>
        <div class="product-details">
            
            <div class="product-cat">
                <a href="#">{{$prodRel->categoria ? $prodRel->categoria->titulo : ''}}</a>
            </div>
            <h3 class="product-name">
                <a href="{{ route('productos.show', $prodRel) }}">{{$prodRel->nombre}}</a>
            </h3>
            <div class="product-price">
                <del class="old-price">{{$prodRel->precio_antes}} </del>
                <ins class="new-price"> S/. {{$prodRel->precio_final}}</ins>
                
            </div>
            <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width:{{$prodRel->estrellas}}"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
               
            </div>
        </div>
    </div>
    @endforeach
    
</div>