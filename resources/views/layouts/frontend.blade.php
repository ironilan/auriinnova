<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>{{setting()->title}} | {{$pagina}}</title>

    <meta name="keywords" content="{{setting()->keywords}}" />
    <meta name="description" content="{{setting()->description}}">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon.png') }}">

    <script>
        WebFontConfig = {
            google: { families: ['Open+Sans:400,600,700', 'Poppins:400,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{ asset('frontend/js/webfont.js') }}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>



    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/animate/animate.min.css')}}">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/magnific-popup/magnific-popup.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/demo3.min.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/demo1.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/estilos.css')}}">

    @yield('estilos')
</head>

<body class="home">
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
            <div class="bounce4"></div>
        </div>
    </div>
    <div class="page-wrapper">
        <h1 class="d-none">{{setting()->title}}</h1>
        
        @include('components.header')
        <!-- End of Header -->
        
        @yield('contenido')

        <!-- End of Main -->
        @include('components.footer')
        <!-- End of Footer -->
    </div>
    <!-- Sticky Footer -->
    {{-- <div class="sticky-footer sticky-content fix-bottom">
        <a href="demo1.html" class="sticky-link active">
            <i class="d-icon-home"></i>
            <span>Home</span>
        </a>
        <a href="shop.html" class="sticky-link">
            <i class="d-icon-volume"></i>
            <span>Categories</span>
        </a>
        <a href="wishlist.html" class="sticky-link">
            <i class="d-icon-heart"></i>
            <span>Wishlist</span>
        </a>
        <a href="account.html" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Account</span>
        </a>
        <div class="dropdown cart-dropdown dir-up">
            <a href="cart.html" class="sticky-link cart-toggle">
                <i class="d-icon-bag"></i>
                <span>Cart</span>
            </a>
            <!-- End of Cart Toggle -->
            <div class="dropdown-box">
                <div class="product product-cart-header">
                    <span class="product-cart-counts">2 items</span>
                    <span><a href="cart.html">View cart</a></span>
                </div>
                <div class="products scrollable">
                    <div class="product product-cart">
                        <div class="product-detail">
                            <a href="producto.php" class="product-name">Solid Pattern In Fashion Summer Dress</a>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">S/. 129.00</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="#">
                                <img src="images/cart/product-1.jpg" alt="product" width="90" height="90" />
                            </a>
                            <button class="btn btn-link btn-close">
                                <i class="fas fa-times"></i>
                            </button>
                        </figure>
                    </div>
                    <!-- End of Cart Product -->
                    <div class="product product-cart">
                        <div class="product-detail">
                            <a href="producto.php" class="product-name">Mackintosh Poket Backpack</a>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">S/. 98.00</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="#">
                                <img src="images/cart/product-2.jpg" alt="product" width="90" height="90" />
                            </a>
                            <button class="btn btn-link btn-close">
                                <i class="fas fa-times"></i>
                            </button>
                        </figure>
                    </div>
                    <!-- End of Cart Product -->
                </div>
                <!-- End of Products  -->
                <div class="cart-total">
                    <label>Subtotal:</label>
                    <span class="price">S/. 42.00</span>
                </div>
                <!-- End of Cart Total -->
                <div class="cart-action">
                    <a href="checkout.html" class="btn btn-dark"><span>Checkout</span></a>
                </div>
                <!-- End of Cart Action -->
            </div>
            <!-- End of Dropdown Box -->
        </div>
    </div> --}}
    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>

    <!-- MobileMenu -->
    @include('components.mobilemenu')
    <!-- Plugins JS File -->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/parallax/parallax.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/elevatezoom/jquery.elevatezoom.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{ asset('frontend/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('frontend/js/main.js')}}"></script>

    @yield('scripts')

</body>

</html>