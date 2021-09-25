<div class="owl-carousel owl-theme row  cols-2 cols-md-3 cols-lg-4" data-owl-options="{
    'items': 4,
    'nav': false,
    'loop': false,
    'autoplay': true,
    'dots': true,
    'margin': 20,
    'responsive': {
        '0': {
            'items': 2
        },
        '768': {
            'items': 3
        },
        '992': {
            'items': 4,
            'dots': true,
            'nav': false
        }
    }
}">
    @foreach ($novedades as $novedad)
    <div class="product">
        <figure class="product-media">
            <a href="{{ route('productos.show', $novedad) }}">
                <img src="{{$novedad->imagen}}" alt="{{$novedad->titulo}}"
                    class="h250">
            </a>
           @if ($novedad->nuevo == 'si')
            <div class="product-label-group">
                <label class="product-label label-new">nuevo</label>
            </div>
            @endif
            
            <div class="product-action">
                <a href="{{ route('productos.show', $novedad) }}" data-id="{{$novedad->id}}" class="btn-product btn-quickview" title="Ver más">Ver más</a>
            </div>
        </figure>
        <div class="product-details">
            
            <div class="product-cat">
                <a href="#">{{$novedad->categoria ? $novedad->categoria->titulo : ''}}</a>
            </div>
            <h3 class="product-name">
                <a href="{{ route('productos.show', $novedad) }}">{{$novedad->nombre}}</a>
            </h3>
            <div class="product-price">
                <del class="old-price">{{$novedad->precio_antes}} </del>
                <ins class="new-price"> S/. {{$novedad->precio_final}}</ins>
                
            </div>
            <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width:100%"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
        
</div>