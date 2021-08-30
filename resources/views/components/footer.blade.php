<footer class="footer appear-animate">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-3">
                    <a href="{{ url('/') }}" class="logo-footer">
                        <img src="{{Storage::url(setting()->logo)}}" alt="logo-footer" width="163" height="39" />
                    </a>
                    <!-- End of FooterLogo -->
                </div>
                <div class="col-lg-9">
                    <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
                        <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
                            <!-- <h4 class="widget-title font_normal">Suscríbete</h4>
                             -->
                        </div>
                        <form action="#" class="input-wrapper input-wrapper-inline">
                            <input type="email" class="form-control" name="email" id="newsletter-email1"
                                placeholder="Email aquí..." required />
                            <button class="btn btn-primary btn-md ml-2" type="submit">subscribir<i
                                    class="d-icon-arrow-right"></i></button>
                        </form>
                    </div>
                    <!-- End of Newsletter -->
                </div>
            </div>
        </div>
        <!-- End of FooterTop -->
        <div class="footer-middle">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">La empresa</h4>
                        <ul class="widget-body">
                            <li><a href="{{ url('nosotros') }}">Quienes somos</a></li>
                            <li><a href="{{ url('nosotros') }}">Misión y Visión</a></li>
                            <li><a href="{{ url('nosotros') }}">Valores</a></li>
                            <li><a href="{{ url('terminos-y-condiciones') }}">Términos y condiciones</a></li>
                            <li><a href="{{ url('politicas-de-privacidad') }}">Políticas de privcidad</a></li>
                        </ul>
                    </div>
                    <!-- End of Widget -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget">
                        <h4 class="widget-title">Tienda Principal</h4>
                        <ul class="widget-body">
                            <li><a href="#">{{setting()->address}}</a></li>
                            <li class="">
                                <label>Horario de atención</label>                                
                            </li>
                            <li><a href="#">{!!setting()->horario_footer!!}</a></li>
                        </ul>
                    </div>
                    <!-- End of Widget -->
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">Contacto</h4>
                        <ul class="widget-body">
                            <li><a href="#"><i class="fab fa-whatsapp text-xl"></i> +{{setting()->cellphone}}</a></li>
                            <li><a href="#"><i class="far fa-envelope text-xl"></i> {{setting()->email}}</a></li>
                            <!-- <li class="text-uppercase">Métodos de pago</li> -->
                            <li class="mt-5_">
                                <div class="footer_flex">
                                    <img src="{{asset('frontend/images/footer/visa.png')}}" alt="">
                                    <img src="{{asset('frontend/images/footer/mc.png')}}" alt="">
                                    <img src="{{asset('frontend/images/footer/yape.png')}}" alt="">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- End of Widget -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget widget-instagram">
                        <h4 class="widget-title">Instagram</h4>
                        <figure class="widget-body row">
                            <div class="col-3">
                                <img src="{{asset('frontend/images/footer/insta/1.jpg')}}" alt="instagram 1" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{asset('frontend/images/footer/insta/2.jpg')}}" alt="instagram 2" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{asset('frontend/images/footer/insta/3.jpg')}}" alt="instagram 3" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{asset('frontend/images/footer/insta/4.jpg')}}" alt="instagram 4" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{asset('frontend/images/footer/insta/5.jpg')}}" alt="instagram 5" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{asset('frontend/images/footer/insta/6.jpg')}}" alt="instagram 6" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{asset('frontend/images/footer/insta/7.jpg')}}" alt="instagram 7" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{asset('frontend/images/footer/insta/8.jpg')}}" alt="instagram 8" width="64" height="64" />
                            </div>
                        </figure>
                    </div>
                    <!-- End of Instagram -->
                </div>
            </div>
        </div>
        <!-- End of FooterMiddle -->
        <div class="footer-bottom">
            <div class="footer-left">
                
            </div>
            <div class="footer-center">
                <p class="copyright">{{setting()->title}} &copy; {{Date('Y')}}. Todos los derechos reservados.</p>
            </div>
            <div class="footer-right">
                <div class="social-links">
                    <a href="#" class="social-facebook ">
                        <img src="{{asset('frontend/images/footer/fb.png')}}" alt="facebook">
                    </a>
                    <a href="#" class="social-instagram ">
                        <img src="{{asset('frontend/images/footer/ig.png')}}" alt="instagram">
                    </a>
                    <a href="#" class="social-twitter ">
                        <img src="{{asset('frontend/images/footer/tw.png')}}" alt="twitter">
                    </a>
                </div>
            </div>
        </div>
        <!-- End of FooterBottom -->
    </div>
</footer>

<div class="whatsapp">
    <a href="https://wa.me/{{setting()->whatsapp}}?text=hola, me gustaría tener información de sus productos." target="_blank">
        <div class="contenedor-whapp">
            <i class="fab fa-whatsapp"></i>
        </div>
    </a>
</div>