<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg">Bienvenido a {{setting()->title}}</p>
            </div>
            <div class="header-right">
                
                <!-- End of DropDown Menu -->
                
                <!-- End of DropDown Menu -->
                <div class="dropdown dropdown-expanded d-lg-show">
                    <a href="#dropdown">Links</a>
                    <ul class="dropdown-box">
                        <li><a href="{{url('terminos-y-condiciones')}}">Términos y condiciones</a></li>
                        <li><a href="{{ url('politicas-de-privacidad') }}">Políticas de privacidad</a></li>
                    </ul>
                </div>
                <!-- End of DropDownExpanded Menu -->
            </div>
        </div>
    </div>
    <!-- End of HeaderTop -->
    <div class="header-middle sticky-header fix-top sticky-content has-center">
        <div class="container">
            <div class="header-left">
                <a href="#" class="mobile-menu-toggle">
                    <i class="d-icon-bars2"></i>
                </a>
                <a href="{{ url('/') }}" class="logo d-none d-lg-block">
                    <img src="{{Storage::url(setting()->logo)}}" alt="logo" width="163" height="39" />
                </a>
            </div>
            <div class="header-center">
                <a href="{{ url('/') }}" class="logo d-lg-none">
                    <img src="{{Storage::url(setting()->logo)}}" alt="logo" width="163" height="39" />
                </a>
                <!-- End of Logo -->
                <div class="header-search hs-expanded">
                    <form action="{{ url('buscar') }}" method="get" class="input-wrapper">
                        <div class="select-box">
                            <select id="category" name="idcategoria">
                                <option value="">Categorías</option>
                                @foreach (categorias() as $categ)
                                <option value="{{$categ->id}}">{{$categ->titulo}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        <input type="text" class="form-control" name="criterio" id="search"
                            placeholder="Ingresa el producto que estas buscando..." required="">
                        <button class="btn btn-sm btn-search" type="submit"><i
                                class="d-icon-search"></i></button>
                    </form>
                </div>
                <!-- End of Header Search -->

                <nav class="main-nav">
                    <ul class="menu app_menu_stick">
                        <li class="{{$pagina == 'inicio' ? 'active' : ''}}">
                            <a href="{{ url('/') }}">Inicio</a>
                        </li>
                        <li class="{{$pagina == 'nosotros' ? 'active' : ''}}">
                            <a href="{{ url('nosotros') }}">La empresa</a>
                        </li>
                        <li class="{{$pagina == 'productos' ? 'active' : ''}}">
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
                                        <li><a href="{{ route('categorias.show', $categoria) }}">Ver todo</a></li>
                                    </ul>
                                </li>
                                @endforeach
                                <br>
                                <li><a href="{{ route('productos.index') }}">Ver todo</a></li>
                            </ul>
                        </li>
                        <li class="{{$pagina == 'unidades' ? 'active' : ''}}">
                            <a href="#">Unidades de negocio</a>
                            <ul>
                                @foreach (unidades() as $unidad)
                                <li><a href="{{ route('unidades.show', $unidad) }}" class="text-uppercase">{{$unidad->titulo}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                       
                        <!-- End of Dropdown -->
                        <li class="{{$pagina == 'contacto' ? 'active' : ''}}">
                            <a href="{{ url('contacto') }}">Contacto</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                
                

                {{-- <div class="header-search hs-toggle mobile-search">
                    <a href="#" class="search-toggle">
                        <i class="d-icon-search"></i>
                    </a>
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off"
                            placeholder="Search your keyword..." required />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div> --}}
                <!-- End of Header Search -->
            </div>
        </div>
    </div>

    <div class="header-bottom d-lg-show">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-center">
                    <nav class="main-nav">
                        <ul class="menu">
                            <li class="{{$pagina == 'inicio' ? 'active' : ''}}">
                                <a href="{{ url('/') }}">Inicio</a>
                            </li>
                            <li class="{{$pagina == 'nosotros' ? 'active' : ''}}">
                                <a href="{{ url('nosotros') }}">La Empresa</a>
                            </li>
                            <li class="{{$pagina == 'productos' ? 'active' : ''}}">
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
                                            <li><a href="{{ route('categorias.show', $categoria) }}">Ver todo</a></li>
                                        </ul>
                                    </li>
                                    @endforeach
                                    
                                    <br>
                                    <br>
                                    <li><a href="{{ route('productos.index') }}">Ver todo</a></li>
                                </ul>
                            </li>
                            <li class="{{$pagina == 'unidades' ? 'active' : ''}}">
                                <a href="#">Unidades de negocio</a>
                                <ul>
                                    @foreach (unidades() as $unidad)
                                    <li><a href="{{ route('unidades.show', $unidad) }}" class="text-uppercase">{{$unidad->titulo}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                           
                            <!-- End of Dropdown -->
                            <li class="{{$pagina == 'contacto' ? 'active' : ''}}">
                                <a href="{{ url('contacto') }}">Contacto</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
</header>