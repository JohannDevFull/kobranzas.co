<?php

// Si han aceptado la política
if(isset($_REQUEST['politica-cookies'])){
    // Calculamos la caducidad, en este caso un año
    $caducidad = time() + (60 * 60 * 24 * 365);
    // Crea una cookie con la caducidad
    setcookie('politica', 'aceptada', $caducidad); 
    echo '<script type="text/javascript">
            alert("N°:'.$_REQUEST['politica-cookies'].'Gracias por aceptar nuestras maliciosas politicas de cookies. ");
        </script>';
}
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <link rel="icon" href="storage/img/seguro.ico">
    <title>{{ config('app.name', 'Laravel') }} | Home</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8"> 
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic%7CLato:300,300italic,400,400italic,700,900%7CMerriweather:700italic">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
  </head>
  <body onload="validacion()">
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"> </div>
        </div>
        <p>Cargando...</p>
      </div>
    </div>
    <div class="page">
      <header id="inicio" class="page-head" >
        <div class="rd-navbar-wrap" >
          <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="53px" data-xl-stick-up-offset="53px" data-xxl-stick-up-offset="53px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-inner">
              <div class="rd-navbar-aside-wrap">
                <div class="rd-navbar-aside">
                  <div class="rd-navbar-aside-toggle" data-rd-navbar-toggle=".rd-navbar-aside"><span></span></div>
                  <div class="rd-navbar-aside-content">
                    <ul class="rd-navbar-aside-group list-units" >
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xs align-items-center">
                          <div class="unit-left"><span class="novi-icon icon icon-xxs icon-primary material-icons-phone"></span></div>
                          <div class="unit-body"><a class="" style="color: black"  href="tel:#">314 441 2784</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xs align-items-center">
                          <div class="unit-left"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span></div>
                          <div class="unit-body"><a style="color: black" class="" href="mailto:#">legalsuitsabogados@gmail.com</a></div>
                        </div>
                      </li>
                    </ul>
                    <div class="rd-navbar-aside-group">
                      <ul class="list-inline list-inline-reset">
                        <li><a class="novi-icon icon icon-circle icon-nobel-filled icon-xxs-smaller fa fa-facebook" href="#"></a></li>
                        <li><a class="novi-icon icon icon-circle icon-nobel-filled icon-xxs-smaller fa fa-twitter" href="#"></a></li>
                        <li><a class="novi-icon icon icon-circle icon-nobel-filled icon-xxs-smaller fa fa-google-plus" href="#"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!---- foto logo--->
              <div class="rd-navbar-group">
                <div class="rd-navbar-panel">

                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap">
                    <span></span>
                  </button>
                  <a class="rd-navbar-brand brand" href="#inicio">
                    <img src=" {{ asset('storage/img/AdminLTELogo.png') }}" class="logo" alt="Abogados LSA" width="110" style="width: 65px" />
                  </a>

                </div>
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-nav-inner">
                    <div class="rd-navbar-btn-wrap">
                      
                      <!-- Right navbar links -->
                      @if (Route::has('login'))
                      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        @auth
                        <li style="padding-right:5px;margin-right: 5px">
                          <a href="{{ url('/dashboard') }}" class="button button-smaller button-primary-outline" style="background-color:rgba(109,223,182,1);color: white;">Dashboard</a>
                        </li>
                        @else
                        <li style="padding-right:5px;margin-right: 5px">
                          <a href="{{ route('login') }}" class="button button-smaller button-primary-outline">Ingresar</a>
                        </li>
                        @endauth
                      </ul>
                      @endif

                    </div> 
                    <ul class="rd-navbar-nav">

                      <li class="active"><a href="#inicio">Inicio</a></li>
                      <li><a href="#servicios">Servicios</a></li>
                      <li><a href="#nosotros">Nosotros</a></li>
                      <li><a href="#equipo">Equipo</a></li>
                      <li><a href="#contactenos">Contacto</a></li>

                    </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

      <section>
        <div class="swiper-container swiper-slider swiper-variant-1 bg-black" data-loop="false" data-autoplay="5500" data-simulate-touch="true">

          <div class="swiper-wrapper text-center">
            <div class="swiper-slide" data-slide-bg="{{ asset('storage/img/fondo1.jpg') }}">
              <div class="swiper-slide-caption text-center">
                <div class="container">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 col-lg-10 col-xl-9">
                      <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                        <h3 class="medium text-primary">Con nosotros</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">Siempre estás un paso adelante</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Las estrategias de nuestros abogados lo ayudarán a resolver problemas legales muy complejos.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400">
                        <a class="button button-lg button-primary-outline-v2" href="#">
                          Mas info.
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" data-slide-bg="{{ asset('storage/img/fondo2.jpg') }}">
              <div class="swiper-slide-caption text-center">
                <div class="container">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 col-lg-10 col-xl-9">
                      <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                        <h3 class="medium text-primary">Ofrecemos</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">Ayuda legal asequible y eficaz</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Nuestro equipo experto de abogados y consultores estará encantado de brindarle la asistencia legal necesaria.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#">Solicite una consuta gratuita</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" data-slide-bg="{{ asset('storage/img/buildings.jpg') }}">
              <div class="swiper-slide-caption text-center">
                <div class="container">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 col-lg-10 col-xl-9">
                      <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                        <h3 class="medium text-primary">Con nuestros servicios</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">Obtendrá un amplio apoyo legal</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Contamos con años de experiencia en brindar asistencia legal en diversas esferas del derecho.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#">Solicite una consulta gratuita</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-scrollbar d-lg-none"></div>
          <div class="swiper-nav-wrap">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </section>

      <section id="servicios"  class="section-50 section-md-75 section-lg-100">
        <div class="container">
          <h3 class="text-center">Servicios</h3>
          <div class="row row-40">
            <div class="col-md-6 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                  <div class="box-icon"><span class="novi-icon icon icon-primary icon-lg mercury-icon-briefcase"></span></div>
                  <div class="box-header">
                    <h5><a href="#">Derecho empresarial</a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="box-body">
                  <p>El derecho empresarial se ocupa de la creación de nuevas empresas y los problemas que surgen como existentes.</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                  <div class="box-icon"><span class="novi-icon icon icon-primary icon-lg mercury-icon-users"></span></div>
                  <div class="box-header">
                    <h5><a href="#">Ley familiar</a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="box-body">
                  <p>Los abogados de derecho familiar ayudan a sus clientes a solicitar la separación o el divorcio, la pensión alimenticia o la custodia de los hijos.</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                  <div class="box-icon"><span class="novi-icon icon icon-primary icon-lg mercury-icon-lib"></span></div>
                  <div class="box-header">
                    <h5><a href="#">Juicio civil</a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="box-body">
                  <p>El litigio civil es el proceso en el que los asuntos civiles se resuelven en un tribunal de justicia.</p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section id="nosotros" class="bg-displaced-wrap">
        <div class="bg-displaced-body">
          <div class="container">
            <div class="inset-xl-left-70 inset-xl-right-70">
              <article class="box-cart bg-ebony-clay">
                <div class="box-cart-image"><img src="{{ asset('storage/img/home-2-342x338.jpg') }}" alt="" width="342" height="338"/>
                </div>
                <div class="box-cart-body">
                  <blockquote class="blockquote-complex blockquote-complex-inverse" style="background: #2b2f40">
                    <h3>Sobre nosotros</h3>
                    <p>
                      <q>Cuando pone su caso en manos de nuestros abogados y asistentes legales, está poniendo su caso en manos de profesionales comprometidos con lograr el mejor resultado posible.</q>
                    </p>
                    <div class="quote-footer">
                      <cite>Ryan Emberson</cite><small>CEO at LawExpert</small>
                    </div>
                  </blockquote>
                  <div class="button-wrap inset-md-left-70"><a class="button button-responsive button-medium button-primary-outline-v2" href="#contactenos">Contactanos</a></div>
                </div>
              </article>
            </div>
          </div>
        </div>
        <div class="bg-displaced bg-image" style="background-image: url(images/home-1.jpg);"></div>
      </section>

      <section id="equipo" class="section-60 section-lg-100">
        <div class="container">
          <div class="row row-40 align-items-sm-end">
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src=" {{ asset('storage/img/trabajador1.jpg') }}" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="tel:#">314 334 4567</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="mailto:#">amsolano@lsa.co</a></div>
                  </div>
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="#">Amanda Solano</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Paralegal</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="{{ asset('storage/img/trabajador2.jpg') }}" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="tel:#">321 456 789</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="mailto:#">Jodoe@lsa.co</a></div>
                  </div>
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="#">John Doe</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Abogado</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="{{ asset('storage/img/trabajador3.jpg') }}" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="tel:#">345 652 231</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="mailto:#">vnives@lsa.co</a></div>
                  </div>
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="#">Vanessa Ives</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Asistente legal</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-3 text-center">
              <div class="block-wrap-1">
                <div class="block-number">06</div>
                <h3 class="text-normal">Expertos</h3>
                <p class="h5 h5-smaller text-style-4">en sus campos</p>
                <p>Si usted o su empresa enfrentan un desafío legal, contáctenos hoy para programar una consulta inicial gratuita con un abogado.</p><a class="link link-group link-group-animated link-bold link-secondary" href="#"><span>Leer más..</span><span class="novi-icon icon icon-xxs icon-primary fa fa-angle-right"></span></a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section parallax-container bg-black" data-parallax-img="{{ asset('storage/img/progress-bars-parallax-1.jpg') }}">
        <div class="parallax-content">
          <div class="section-50 section-md-90">
            <div class="container">
              <div class="row row-40">
                <div class="col-sm-6 col-md-3">
                  <div class="box-counter box-counter-inverse"><span class="novi-icon icon icon-lg icon-primary mercury-icon-group"></span>
                    <div class="text-large counter">1450</div>
                    <p class="box-header">Clientes felices</p>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="box-counter box-counter-inverse"><span class="novi-icon icon icon-lg-smaller icon-primary mercury-icon-scales"></span>
                    <div class="text-large counter">2</div>
                    <p class="box-header">Años de experiencia</p>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="box-counter box-counter-inverse"><span class="novi-icon icon icon-lg-smaller icon-primary mercury-icon-partners"></span>
                    <div class="text-large counter counter-percent">90</div>
                    <p class="box-header">Casos exitosos</p>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="box-counter box-counter-inverse"><span class="novi-icon icon icon-lg icon-primary mercury-icon-case"></span>
                    <div class="text-large counter">750</div>
                    <p class="box-header">Casos de lesiones intrafamiliares</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="section-66 section-md-90 section-xl-bottom-100">
        <div class="container">
          <h3 class="text-center">Testimonios</h3>
          <div class="owl-carousel owl-spacing-1 owl-nav-classic owl-style-minimal" data-autoplay="true" data-items="1" data-md-items="2" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="true" data-nav="true" data-dots="true" data-dots-each="1">
            <div class="item">
              <blockquote class="quote-bordered" style="border-left: white">
                <div class="quote-body">
                  <div class="quote-open">
                    <svg version="1.1" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37px" height="27px" viewbox="0 0 21 15" preserveAspectRatio="none">
                      <path d="M9.597,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.349,1.316                    c-1.287,0-2.414-0.44-3.382-1.316C0.482,12.811,0,11.758,0,10.535c0-1.226,0.58-2.716,1.739-4.473L5.603,0H9.34L6.956,6.37                    C8.716,7.145,9.597,8.493,9.597,10.412z M20.987,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.35,1.316                    c-1.288,0-2.415-0.44-3.381-1.316c-0.966-0.879-1.45-1.931-1.45-3.154c0-1.226,0.582-2.716,1.74-4.473L16.994,0h3.734l-2.382,6.37                    C20.106,7.145,20.987,8.493,20.987,10.412z"></path>
                    </svg>
                  </div>
                  <div class="quote-body-inner">
                    <h6>Uno de los abogados más eticos que he conocido</h6>
                    <p>
                      <q>Nunca he conocido a ptrp abogado más preparado o enfocado. John tiene la capacidad dde diseccionar un caso como un cirujano experto, con absoluta calma. Nada parece distraerlo de su objetivo en un caso, lo que, por supuesto , lo hace extremadamente dificil de superar.</q>
                    </p>
                  </div>
                </div>
                <div class="quote-footer">
                  <div class="unit unit-horizontal unit-spacing-sm align-items-center">
                    <div class="unit-left"><img class="img-circle" src="{{ asset('storage/img/cliente.png') }}" alt="" width="68" height="68"/>
                    </div>
                    <div class="unit-body">
                      <cite>Mark Wilson</cite>
                      <p class="text-primary">Director financiero de Wilson Ltd.</p>
                    </div>
                  </div>
                </div>
              </blockquote>
            </div>
            <div class="item">
              <blockquote class="quote-bordered" style="border-left: white">
                <div class="quote-body">
                  <div class="quote-open">
                    <svg version="1.1" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37px" height="27px" viewbox="0 0 21 15" preserveAspectRatio="none">
                      <path d="M9.597,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.349,1.316                    c-1.287,0-2.414-0.44-3.382-1.316C0.482,12.811,0,11.758,0,10.535c0-1.226,0.58-2.716,1.739-4.473L5.603,0H9.34L6.956,6.37                    C8.716,7.145,9.597,8.493,9.597,10.412z M20.987,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.35,1.316                    c-1.288,0-2.415-0.44-3.381-1.316c-0.966-0.879-1.45-1.931-1.45-3.154c0-1.226,0.582-2.716,1.74-4.473L16.994,0h3.734l-2.382,6.37                    C20.106,7.145,20.987,8.493,20.987,10.412z"></path>
                    </svg>
                  </div>
                  <div class="quote-body-inner">
                    <h6>Lsa es uno de los mejores...</h6>
                    <p>
                      <q>John Doe es uno de esos abogados que tiene todo el talento y la habilidad, la compasión por sus clientes y la capacidad de comunicarse bien con cualquier persona que conoce. Esta es una de las mejores combinaciones para un abogado litigante y es uno de los mejores.</q>
                    </p>
                  </div>
                </div>
                <div class="quote-footer" >
                  <div class="unit unit-horizontal unit-spacing-sm align-items-center">
                    <div class="unit-left"><img class="img-circle" src="{{ asset('storage/img/cliente2.png') }}" alt="" width="68" height="68"/>
                    </div>
                    <div class="unit-body">
                      <cite>Amanda Eberson</cite>
                      <p class="text-primary">Director ejecutivo de Ebersoon Co.</p>
                    </div>
                  </div>
                </div>
              </blockquote>
            </div>
          </div>
        </div>
      </section>

      <section id="contactenos" class="bg-whisper">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-lg-9 col-xl-7">
              <div class="section-50 section-md-75 section-xl-100">
                <h3>Contactanos</h3>
                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                  <div class="row row-30">
                    <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="request-form-name" type="text" name="name" data-constraints="@Required">
                        <label class="form-label" for="request-form-name">Nombre</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="request-form-phone" type="text" name="phone" data-constraints="@Numeric @Required">
                        <label class="form-label" for="request-form-phone">Teléfono</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="request-form-email" type="email" name="email" data-constraints="@Email @Required">
                        <label class="form-label" for="request-form-email">Email</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-wrap form-wrap-outside">
                        <!--Select 2-->
                        <select class="form-input select-filter" id="request-form-select" data-minimum-results-for-search="Infinity">
                          <option>Ley familiar</option>
                          <option value="Family Law">Ley familiar</option>
                          <option value="Business Law">Derecho empresarial</option>
                          <option value="Civil Litigation">Juicio civil</option>
                          <option value="Civil Litigation">Propiedad horizontal</option>
                          <option value="Civil Litigation">Inmoviliario</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-wrap">
                        <textarea class="form-input" id="feedback-2-message" name="message" data-constraints="@Required"></textarea>
                        <label class="form-label" for="feedback-2-message">Mensaje</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-md-6">
                          <button class="button button-block button-primary" type="submit">
                            ENVIAR
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-xl-5 d-none d-xl-block">
              <div style="margin-top: 20px;">
                <img src="{{ asset('storage/img/home-4-472x753.jpg') }}" alt="" width="472" height="753"/>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-50 section-md-75 section-xl-100">
        <div class="container">
          <h3 class="text-center">Últimas noticias</h3>
          <div class="row row-40 row-offset-1 justify-content-sm-center justify-content-md-start">
            <div class="col-sm-9 col-md-6 col-lg-4 col-xl-3">
              <article class="post-boxed">
                <div class="post-boxed-image"><img src="{{ asset('storage/img/noticia1.jpg') }}" alt="" width="268" height="182"/>
                </div>
                <div class="post-boxed-body">
                  <div class="post-boxed-title"><a href="#">La Iniciativa Colectiva de Abogados por los Derechos de las Mujeres</a></div>
                  <div class="post-boxed-footer">
                    <ul class="post-boxed-meta">
                      <li>
                        <time datetime="2019-06-14">JUNIO DE 14 DE 2019</time>
                      </li>
                      <li><span>POR</span><a href="#">ADMINISTRACIÓN</a></li>
                    </ul>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-9 col-md-6 col-lg-4 col-xl-3">
              <article class="post-boxed">
                <div class="post-boxed-image"><img src="{{ asset('storage/img/noticia2.jpg') }}" alt="" width="268" height="182"/>
                </div>
                <div class="post-boxed-body">
                  <div class="post-boxed-title"><a href="#">Documentos legales que todo propietario necesita</a></div>
                  <div class="post-boxed-footer">
                    <ul class="post-boxed-meta">
                      <li>
                        <time datetime="2019-06-20">20 DE JUNIO DE 2019</time>
                      </li>
                      <li><span>POR</span><a href="#">ADMINSTRACIÖN</a></li>
                    </ul>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-9 col-md-6 col-lg-4 col-xl-3">
              <article class="post-boxed">
                <div class="post-boxed-image"><img src="{{ asset('storage/img/noticia3.jpg') }}" alt="" width="268" height="182"/>
                </div>
                <div class="post-boxed-body">
                  <div class="post-boxed-title"><a href="#">Ayúdanos a hacer que la ley sea accesible para todos</a></div>
                  <div class="post-boxed-footer">
                    <ul class="post-boxed-meta">
                      <li>
                        <time datetime="2019-06-23">23 DE JUNIO DE 2020</time>
                      </li>
                      <li><span>POR</span><a href="#">ADMINSTRACIÓN</a></li>
                    </ul>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-9 col-md-6 col-lg-4 col-xl-3">
              <article class="post-boxed">
                <div class="post-boxed-image"><img src="{{ asset('storage/img/noticia4.jpg') }}" alt="" width="268" height="182"/>
                </div>
                <div class="post-boxed-body">
                  <div class="post-boxed-title"><a href="#">5 Legal Documents for Military Service People</a></div>
                  <div class="post-boxed-footer">
                    <ul class="post-boxed-meta">
                      <li>
                        <time datetime="2019-06-12">12 DE JUNIO 2019</time>
                      </li>
                      <li><span>POR</span><a href="#">ADMINSTRACIÓN</a></li>
                    </ul>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
<!-- <a class="section section-banner" href="https://www.templatemonster.com/intense-multipurpose-html-template.html" style="background-image: url(images/banner/background-03-1920x310.jpg); background-image: -webkit-image-set( url(images/banner/background-03-1920x310.jpg) 1x, url(images/banner/background-03-3840x620.jpg) 2x )"><img src="images/banner/foreground-03-1600x310.png" srcset="images/banner/foreground-03-1600x310.png 1x, images/banner/foreground-03-3200x620.png 2x" alt="" width="1600" height="310"></a> -->
      <footer class="page-foot bg-ebony-clay">
        <div class="section-40 section-md-75">
          <div class="container">
            <div class="row justify-content-sm-center">
              <div class="col-sm-9 col-md-11 col-xl-12">
                <div class="row row-50">
                  <div class="col-md-6 col-lg-10 col-xl-3">
                    <div class="inset-xl-right-20" style="max-width: 510px;"><a class="brand" href="index.html"><img src="{{ asset('storage/img/logo-inverse-143x28.png') }}" alt="" width="143" height="28"/></a>
                      <p>
                        Si usted o su empresa se enfrentan a un desafío legal que requiere un asesoramiento sólido y una representación calificada, contáctenos hoy para programar una consulta personalizaad con un abogado.
                      </p><a class="link link-group link-group-animated link-bold link-white" href="#contactenos"><span>Contactanos</span><span class="novi-icon icon icon-xxs icon-primary fa fa-angle-right"></span></a>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-xl-3">
                    <p class="h7">MENSAJES RECIENTES</p>
                          <article class="post post-preview post-preview-inverse"><a href="#">
                              <div class="unit unit-horizontal unit-spacing-lg">
                                <div class="unit-left">
                                  <figure class="post-image"><img src="{{ asset('storage/img/post-preview-4-70x70.jpg') }}" alt="" width="70" height="70"/>
                                  </figure>
                                </div>
                                <div class="unit-body">
                                  <div class="post-header">
                                    <p>Ayúdanos a hacer que la ley sea accesible para todos</p>
                                  </div>
                                  <div class="post-meta">
                                    <ul class="list-meta">
                                      <li>
                                        <time datetime="2019-06-23">23 de junio de 2019  </time>
                                      </li>
                                      <li>3 comentarios</li>
                                    </ul>
                                  </div>
                                </div>
                              </div></a></article>
                          <article class="post post-preview post-preview-inverse"><a href="#">
                              <div class="unit unit-horizontal unit-spacing-lg">
                                <div class="unit-left">
                                  <figure class="post-image"><img src="{{ asset('storage/img/post-preview-5-70x70.jpg') }}" alt="" width="70" height="70"/>
                                  </figure>
                                </div>
                                <div class="unit-body">
                                  <div class="post-header">
                                    <p>Documentos legales que todo propietario necesita</p>
                                  </div>
                                  <div class="post-meta">
                                    <ul class="list-meta">
                                      <li>
                                        <time datetime="2019-06-23">20 de junio de 2019</time>
                                      </li>
                                      <li>3 comentarios</li>
                                    </ul>
                                  </div>
                                </div>
                              </div></a></article>
                  </div>
                  <div class="col-md-6 col-lg-4 col-xl-3">
                    <p class="h7">ENLACES RÁPIDOS</p>
                    <div class="row" style="max-width: 270px;">
                      <div class="col-6">
                        <ul class="list-marked-variant-2">
                          <li><a href="#inicio">Inicio</a></li>
                          <li><a href="#servicios">Services</a></li>
                          <li><a href="#">Careers</a></li>
                          <li><a href="#">Blog</a></li>
                        </ul>
                      </div>
                      <div class="col-6">
                        <ul class="list-marked-variant-2">
                          <li><a href="#nosotros">Nosotros</a></li>
                          <li><a href="contact-us.html">Contactanos</a></li>
                          <li><a href="/login">Ingresar</a></li>
                          <li><a href="/politica">Politica cookies</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-xl-3">
                    <p class="h7">Contactanos</p>
                    <address class="contact-info text-left">
                      <div class="unit unit-horizontal unit-spacing-md align-items-center">
                        <div class="unit-left"><span class="novi-icon icon icon-xs icon-storm-gray material-icons-phone"></span></div>
                        <div class="unit-body"><a class="link-white" href="tel:#">314 441 2784</a></div>
                      </div>
                      <div class="unit unit-horizontal unit-spacing-md align-items-center">
                        <div class="unit-left"><span class="novi-icon icon icon-xs icon-storm-gray fa fa-envelope-o"></span></div>
                        <div class="unit-body">
                          <a class="link-white" href="mailto:#">
                            legalsuitsabogados@gmail.com
                          </a>
                        </div>
                      </div>
                      
                    </address>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <hr>
        </div>
        <div class="section-35">
          <div class="container text-center">
            <div class="row row-15 flex-md-row-reverse justify-content-md-between align-items-md-center">
              <div class="col-md-6 text-md-right">
                <div class="group-sm group-middle">
                  <p class="font-italic text-white">Follow Us:</p>
                  <ul class="list-inline list-inline-reset">
                    <li><a class="novi-icon icon icon-circle icon-bright-gray-filled icon-xxs-smaller fa fa-facebook" href="#"></a></li>
                    <li><a class="novi-icon icon icon-circle icon-bright-gray-filled icon-xxs-smaller fa fa-twitter" href="#"></a></li>
                    <li><a class="novi-icon icon icon-circle icon-bright-gray-filled icon-xxs-smaller fa fa-google-plus" href="#"></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6 text-md-left">
                <p class="rights text-white"><span class="copyright-year"></span><span>&nbsp;&#169;&nbsp;</span><span>LawExpert.&nbsp; All Rights Reserved.</span>Design&nbsp;by&nbsp;<a href="https://www.templatemonster.com">TemplateMonster</a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>

    </div>
    <div class="snackbars" id="form-output-global"></div>
    <audio id="myAudio">
      <source src="storage/img/pop.ogg" type="audio/ogg">
      <source src="storage/img/pop.mp3" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>
 
  <div id="chatc">
    
    <div id="main">
      @hasanyrole('Admin|Trabajador|AdminConjunto')

        @else
        @role('Cliente')
        <chatwidget />
        @else
        @endrole
        <chatguest />
    </div>
      @endhasanyrole 
  </div>



  </div>

  <style type="text/css">
    .cook{
      position: fixed;
      z-index: 10;
      color: white;
      background-color: black;
      width: 100%;
      height: 85px;
      bottom: 0px;
    }
    .cookies{
      display: flex;
      position: absolute;
      top: 25px;
    }

    .caja-botones{
        margin-left: 50px;
    }

    .coo-title{
        margin-left: 25px;
        color: white ;
    }
    .pregunta{
      height:30px;margin-left:50px;margin-top: 10px; font-size: 16px;
    }

    @media (max-width: 575px) {
      .cook{
        position: fixed;
        z-index: 10;
        color: white;
        background-color: black;
        width: 100%;
        height: 134px;
        bottom: 0px;
      }

      .cookies{
        display: grid;
        grid-template-columns: repeat(3);
        width: 100%;
        position: absolute;
        top: 0px;
      }

      .coo-title{
        grid-column: 0 / 2;
        grid-row: 1;
        text-align: center;
        margin-top: 2%;
      }
      .pregunta{
        grid-row: 2;
        grid-column: 1 / 3;
        text-align: center;
        margin-left: 0px;
        margin-top: 2%;
      }
      .caja-botones{
        margin-left: 6%;
        margin-top: 2%;
        text-align: center;

      }
    }
  </style>
  <?php if (!isset($_COOKIE['politica'])): ?>
            <!-- Mensaje de cookies -->
            <div class="cook" id="cookie">
                
                <div class="cookies" >
                    <!-- Titulo -->
                  <div >
                    <h4 class="coo-title">Politica de Cookies</h4>
                  </div>
                    <!-- Descripción con enlace -->
                  <div>
                    <p class="pregunta"  >
                        <span > ¿Aceptas nuestras </span> 
                        <a style="color: rgb(0, 158, 207);"  href="/info">política de Cookies</a>?
                    </p>
                  </div>
                    

                    
                  <div class="caja-botones" >
                    

                    <!-- Botón para aceptar -->
                    <button type="button" class="btn bg-success" style="margin-right: 20px;color: white" onclick="aceptar()">
                        Aceptar
                    </button>
     
                    <!-- Botón para NO aceptar -->
                    <button type="button" class="btn bg-danger" style="margin:auto;margin-right: 15px;color: white;text-align: center;" onclick="rechazar()">
                      
                        No, gracias.
                    </button>       
                  </div>
                        
                </div>
            
            </div>
  <?php endif; ?>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script2.js')}}"></script> 

    <script type="text/javascript">
        function rechazar(){

            var x = document.getElementById("cookie");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            } 

        }

        function aceptar(){
            document.cookie="politica=aceptada"
            var x = document.getElementById("cookie");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            var x = document.getElementById("chatc");
            x.style.display = "block";
        }

        function validacion(){ 
            var politica = document.cookie.replace(/(?:(?:^|.*;\s*)politica\s*\=\s*([^;]*).*$)|^.*$/, "$1");

            var x = document.getElementById("chatc");
            if (politica){
            }
            else
            {
              x.style.display = "none";
            }
        }

    </script>



  </body>
</html>
                      