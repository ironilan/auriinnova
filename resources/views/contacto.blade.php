@extends('layouts.frontend')

@section('contenido')

<main class="main">
    <div class="page-header" style="background-image: url({{Storage::url(setting()->banner_contacto)}})">
        <h1 class="page-title">Contacto</h1>
    </div>
    <div class="page-content mt-10 pt-4">
        <section class="contact-section pb-10">
            <div class="container">
                <div class=" app_flex "
                    >
                    
                    <div class="mr-lg-6 testimonial app_obj testimonial-centered bg-white">
                        <div class="testimonial-info">
                            <h3 class="testimonial-title">Horario de atención</h3>
                            <figure class="testimonial-author-thumbnail">
                                <img src="{{Storage::url(setting()->imagen_horario)}}" alt="user" width="140" height="140" />
                            </figure>
                            <blockquote>{{setting()->horario}}</blockquote>
                            
                        </div>
                    </div>
                    <div class="mr-lg-6 testimonial app_obj testimonial-centered bg-white">
                        <div class="testimonial-info">
                            <h3 class="testimonial-title">Atención al cliente</h3>
                            <figure class="testimonial-author-thumbnail">
                                <img src="{{Storage::url(setting()->imagen_atencion)}}" alt="user" width="140" height="140" />
                            </figure>
                            <blockquote>{{setting()->phone}} <br> {{setting()->cellphone}}</blockquote>
                            
                        </div>
                    </div>
                    <div class="testimonial app_obj testimonial-centered bg-white">
                        <div class="testimonial-info">
                            <h3 class="testimonial-title">Correo</h3>
                            <figure class="testimonial-author-thumbnail">
                                <img src="{{Storage::url(setting()->imagen_correo)}}" alt="user" width="140" height="140" />
                            </figure>
                            <blockquote>{{setting()->email}}</blockquote>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End About Section-->

        
       <section class="pb-10">
           <div class="container">
               {!!setting()->map!!}
           </div>
       </section>
    </div>
</main>

@endsection

@section('scripts')


@endsection