<div class="row owl-carousel owl-theme" data-owl-options="{
        'items': 4,
        'dots': 'true',
        'nav': true,             
        'responsive': {
            '0': {
                'items': 2
            },
            '768': {
                'items': 3
            },
            '992': {
                'items': 4
            }
        }
    }">
    @foreach ($categorias as $categoria)
    <div class="mr-2 mb-4">
        <div
            class="category category-default category-default-1 category-absolute overlay-zoom">
            <a href="{{ route('categorias.show', $categoria) }}">
                <figure class="category-media">
                    <img src="{{$categoria->imagen}}" alt="category"
                        width="280" height="280" />
                </figure>
            </a>
            <div class="category-content">
                <h4 class="category-name"><a href="{{ route('categorias.show', $categoria) }}">{{$categoria->titulo}}</a></h4>
            </div>
        </div>
    </div>
    @endforeach
    
</div>