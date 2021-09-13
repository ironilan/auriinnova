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
                <a href="#" class="mobile-menu-toggle__">
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

    {{--  menu movil  --}}
    <div class="contenedor">
        <div class="">
            <i class="fas fa-times btn_close"></i>
            <nav class="">
                <ul class="nav_movil ">
                    <li class="{{$pagina == 'inicio' ? 'app_active_movil' : ''}}">
                        <a href="{{ url('/') }}" class="text-uppercase item_movil">Inicio</a>
                    </li>
                    <li class="{{$pagina == 'nosotros' ? 'app_active_movil' : ''}}">
                        <a href="{{ url('nosotros') }}" class="text-uppercase item_movil">La empresa</a>
                    </li>
                    <li class="">
                        <a href="#" class="text-uppercase list_pos item_movil {{$pagina == 'productos' ? 'app_active_movil' : ''}}" id="producto">
                            Productos
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <ul class="nav_movil max_heigh_menu" id="lista_productos">
                            {{-- <li><strong class="text-uppercase">Categorías</strong></li> --}}
                            @foreach (categorias() as $categoria)
                            <li class="categoria_item">
                                <a href="#" class="text-uppercase">{{$categoria->titulo}}</a>
                                <i class="fas fa-angle-down" onclick="verSubcategorias('cat_{{$categoria->id}}')"></i>
                                <ul class="nav_movil max_heigh_menu" id="cat_{{$categoria->id}}">
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
                    <li class="">
                        <a href="#" class="text-uppercase list_pos item_movil {{$pagina == 'unidades' ? 'app_active_movil' : ''}}" id="unidades">
                            Unidades de negocio 
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <ul class="nav_movil max_heigh_menu" id="lista_unidades">
                            @foreach (unidades() as $unidad)
                            <li><a href="{{ route('unidades.show', $unidad) }}" class="text-uppercase">{{$unidad->titulo}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                   
                    <!-- End of Dropdown -->
                    <li class="{{$pagina == 'contacto' ? 'app_active_movil' : ''}}">
                        <a href="{{ url('contacto') }}" class="text-uppercase item_movil">Contacto</a>
                    </li>
                </ul>
            </nav>
        </div>
        <hr>
        <div class="buscador">

            <form action="{{ url('buscar') }}" method="get" class="app_form_movil" autocomplete="off">
                <h5 class="titulo_buscador">Busca tu producto</h5>
                <div class="">
                    <select id="category" name="idcategoria" class="input_movil">
                        <option value="">Categorías</option>
                        @foreach (categorias() as $categ)
                        <option value="{{$categ->id}}">{{$categ->titulo}}</option>
                        @endforeach
                       
                    </select>
                </div>
                <input type="text" class="input_movil" name="criterio" id="search"
                    placeholder="Ingresa el producto que estas buscando..." required="">
                <button class="btn btn-sm btn-search btn_movil" type="submit">
                    Buscar
                </button>
            </form>
        </div>
    </div>
</header>