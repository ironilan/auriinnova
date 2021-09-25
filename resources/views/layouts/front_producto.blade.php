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

	


	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/animate/animate.min.css')}}">

	<!-- Plugins CSS File -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/magnific-popup/magnific-popup.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/photoswipe/photoswipe.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/photoswipe/default-skin/default-skin.min.css')}}">


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Main CSS File -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/estilos.css')}}">
</head>

<body>
	<div class="loading-overlay">
		<div class="bounce-loader">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
			<div class="bounce4"></div>
		</div>
	</div>
	<div class="page-wrapper">
		@include('components.header_producto')
        <!-- End of Header -->
        
        @yield('contenido')

        <!-- End of Main -->
        @include('components.footer')
	</div>
	<!-- Sticky Footer -->
	<div class="sticky-footer sticky-content fix-bottom">
		<a href="demo1.html" class="sticky-link">
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
							<a href="product.html" class="product-name">Solid Pattern In Fashion Summer Dress</a>
							<div class="price-box">
								<span class="product-quantity">1</span>
								<span class="product-price">$129.00</span>
							</div>
						</div>
						<figure class="product-media">
							<a href="#">
								<img src="images/cart/product-1.jpg" alt="product" width="90"
									height="90" />
							</a>
							<button class="btn btn-link btn-close">
								<i class="fas fa-times"></i>
							</button>
						</figure>
					</div>
					<!-- End of Cart Product -->
					<div class="product product-cart">
						<div class="product-detail">
							<a href="product.html" class="product-name">Mackintosh Poket Backpack</a>
							<div class="price-box">
								<span class="product-quantity">1</span>
								<span class="product-price">$98.00</span>
							</div>
						</div>
						<figure class="product-media">
							<a href="#">
								<img src="images/cart/product-2.jpg" alt="product" width="90"
									height="90" />
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
					<span class="price">$42.00</span>
				</div>
				<!-- End of Cart Total -->
				<div class="cart-action">
					<a href="checkout.html" class="btn btn-dark"><span>Checkout</span></a>
				</div>
				<!-- End of Cart Action -->
			</div>
			<!-- End of Dropdown Box -->
		</div>
	</div>
	<!-- Scroll Top -->
	<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-angle-up"></i></a>

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
	<script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('frontend/vendor/sticky/sticky.min.js')}}"></script>
	<script src="{{asset('frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
	<script src="{{asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('frontend/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
	<script src="{{asset('frontend/vendor/elevatezoom/jquery.elevatezoom.min.js')}}"></script>
	<script src="{{asset('frontend/vendor/photoswipe/photoswipe.min.js')}}"></script>
	<script src="{{asset('frontend/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>

	<!-- Main JS File -->
	<script src="{{asset('frontend/js/main.js')}}"></script>
	 @yield('scripts')
</body>

</html>