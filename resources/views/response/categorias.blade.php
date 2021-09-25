<div class=" owl-carousel owl-theme carousel_categorias" >
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