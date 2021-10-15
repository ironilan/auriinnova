<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>{{setting()->title}} | {{$pagina}}</title>

    <meta name="keywords" content="{{setting()->keywords}}" />
    <meta name="description" content="{{setting()->description}}">
    <meta name="author" content="Alexis Valdez">

    <!-- Favicon -->
    <link rel="icon" type="image/ico" href="{{Storage::url(setting()->favicon)}}">

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

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/photoswipe/photoswipe.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/photoswipe/default-skin/default-skin.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/demo1.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/estilos.css')}}">

   

    @yield('estilos')
    <style>
        .old-price{
            text-decoration: none;
        }

        .new-price{
            margin-left: 1rem;
        }

        .sticky-footer{
            display: none;
        }
    </style>
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
    
    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides.
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>

                    <div class="pswp__preloader">
                        <div class="loading-spin"></div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button--arrow--left" aria-label="Previous (arrow left)"></button>
                <button class="pswp__button--arrow--right" aria-label="Next (arrow right)"></button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- MobileMenu -->
    @include('components.mobilemenu')
    <!-- Plugins JS File -->


    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/parallax/parallax.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/elevatezoom/jquery.elevatezoom.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{ asset('frontend/vendor/owl-carousel/owl.carousel.min.js')}}"></script>

    <script src="{{ asset('frontend/vendor/sticky/sticky.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/photoswipe/photoswipe.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('frontend/js/main.js')}}"></script>



    @yield('scripts')


    <script>
        $('#suscripcion').submit(function(e){
            e.preventDefault();      

            var email = $('#newsletter-email1').val();

            let token = '{{csrf_token()}}';

            var route = "{{url('suscribir')}}";

            $.ajax({
                //async: true,
                headers: { 'X-CSRF-TOKEN': token },
                url: route,
                type: 'POST',
                //contentType: false,
                data: {email},
                //processData: false,
                success:function(data){
                    $('.form-control').val('');
                    
                },
                error:function(msj){  
                    
                    if (msj.responseJSON.errors.email) {
                        $('#email').addClass('error');
                   }
                                
                }
            }); 
        });


        $('.mobile-menu-toggle__').click(() => {
            $('.contenedor').show();
        });

        $('.btn_close').click(() => {
            $('.contenedor').hide();
        });


        $('#producto').click(() => {
            $('#producto').toggleClass('app_active_movil');
            $('#lista_productos').toggleClass('item_show_movil');
        });

        $('#unidades').click(() => {
            $('#unidades').toggleClass('app_active_movil');
            $('#lista_unidades').toggleClass('item_show_movil');
        });


        const verSubcategorias = cat => {
            $('#'+cat).toggleClass('item_show_movil');
            console.log(cat);
        }
    </script>

</body>

</html>