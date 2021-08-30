<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End of Overlay -->
    <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
    <!-- End of CloseButton -->
    <div class="mobile-menu-container scrollable">
        {{-- <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="Search your keyword..." required />
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form> --}}
        <!-- End of Search Form -->
        <ul class="mobile-menu mmenu-anim">
            <li class="active">
                <a href="{{ url('/') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ url('nosotros') }}">La empresa</a>
            </li>
            <li>
                <a href="#">Productos</a>
                <ul>
                    <li><strong class="text-uppercase">Categorías</strong></li>
                    @foreach (categorias() as $categoria)
                    <li>
                        <a href="#" class="text-uppercase">{{$categoria->titulo}}</a>
                        <ul class="">
                            @foreach ($categoria->subcategorias as $sub)
                            <li><a href="{{ route('subcategorias.show', $sub) }}">{{$sub->titulo}}</a></li>
                            @endforeach
                            <br>
                            <li><a href="{{ route('productos.index') }}">Ver todo</a></li>
                        </ul>
                    </li>
                    @endforeach
                    <br>
                    <li><a href="{{ route('productos.index') }}">Ver todo</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Unidades de negocio</a>
                <ul>
                    @foreach (unidades() as $unidad)
                    <li><a href="{{ route('unidades.show', $unidad) }}" class="text-uppercase">{{$unidad->titulo}}</a></li>
                    @endforeach
                </ul>
            </li>
            
            <li><a href="{{ url('contacto') }}">Contacto</a></li>
        </ul>
        <!-- End of MobileMenu -->
        <!-- <ul class="mobile-menu mmenu-anim">
            <li><a href="login.html">Login</a></li>
            <li><a href="cart.html">My Cart</a></li>
            <li><a href="wishlist.html">Wishlist</a></li>
        </ul> -->
        <!-- End of MobileMenu -->
    </div>
</div>