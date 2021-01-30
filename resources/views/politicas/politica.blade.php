<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <link rel="icon" href="storage/img/seguro.ico">
    <title>{{ config('app.name', 'Laravel') }} | Politica de cookies</title>
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
      <header class="page-head">
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="53px" data-xl-stick-up-offset="53px" data-xxl-stick-up-offset="53px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-inner">
              <div class="rd-navbar-aside-wrap">
                <div class="rd-navbar-aside">
                  <div class="rd-navbar-aside-toggle" data-rd-navbar-toggle=".rd-navbar-aside"><span></span></div>
                  <div class="rd-navbar-aside-content">
                    <ul class="rd-navbar-aside-group list-units">
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xs align-items-center">
                          <div class="unit-left"><span class="novi-icon icon icon-xxs icon-primary material-icons-phone"></span></div>
                          <div class="unit-body"><a class="link-dusty-gray" href="tel:#">314 441 2784</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xs align-items-center">
                          <div class="unit-left"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span></div>
                          <div class="unit-body"><a class="link-dusty-gray" href="mailto:#">lsaabogados2020@gmail.com</a></div>
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
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <a class="rd-navbar-brand brand" href="/">
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
                      <li class="active"><a href="index.html">Inicio</a></li>
                      <li><a href="#servicios">Servicios</a></li>
                      <li><a href="#">Equipo</a></li>
                      <li><a href="#">Nosotros</a></li>
                      <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

   


      <section  class="section-35 section-md-top-75 section-md-bottom-50">
        <div class="container">
          <h3 class="text-center">Politica de cookies</h3>
          <div class="row row-40">
            <div class="col-md-8" style="margin: auto;">

              LSA Abogados S.A.S informa acerca del uso de las cookies en su página web: 
              <a href="/">
                www.lsa.com.co
              </a> 
            </div>
            

            <div class="col-md-8" style="margin: auto;">
              <h4>¿Qué son las cookies?</h4>
              <div class="inset-lg-right-40 inset-xl-right-70">
                <p>Una cookie es un fichero que se descarga en su ordenador al acceder a determinadas páginas web. Las cookies permiten a una página web, entre otras cosas, almacenar y recuperar información sobre los hábitos de navegación de un usuario o de su equipo y, dependiendo de la información que contengan y de la forma en que utilice su equipo, pueden utilizarse para reconocer al usuario. </p>
              </div>
            </div>

            <br>
            <br>
            <br>

            <div class="col-md-8" style="margin: auto;">
              <h4>¿Qué tipos de cookies utiliza esta página web?</h4>
              <div class="inset-lg-right-40 inset-xl-right-70">
                <p>
                Cookies de análisis - Son aquéllas que bien tratadas por nosotros o por terceros, nos permiten cuantificar el número de usuarios y así realizar la medición y análisis estadístico de la utilización que hacen los usuarios del servicio ofertado. Para ello se analiza su navegación en nuestra página web con el fin de mejorar la oferta de preloader-bodyuctos o servicios que le ofrecemos. 
                </p>

                <p>
                  Cookies publicitarias - Son aquéllas que, bien tratadas por nosotros o por terceros, nos permiten gestionar de la forma más eficaz posible la oferta de los espacios publicitarios que hay en la página web, adecuando el contenido del anuncio al contenido del servicio solicitado o al uso que realice de nuestra página web. Para ello podemos analizar sus hábitos de navegación en Internet y podemos mostrarle publicidad relacionada con su perfil de navegación.
                </p>

                <p>
                  Cookies técnicas - Son aquellas que permiten al usuario la navegación a través del área restringida y la utilización de sus diferentes funciones, como por ejemplo, llevar a cambio el proceso de compra de un artículo.
                </p>

                <p>
                  Cookies de sesión - diseñadas para recabar y almacenar datos mientras el usuario accede a una página web. Se suelen emplear para almacenar información que solo interesa conservar para la prestación del servicio solicitado por el usuario en una sola ocasión (p.e. una lista de productos adquiridos). 
                </p>
              </div>

            </div>

            <br>
            <br>
            <br>

            <div class="col-md-8" style="margin: auto;">
              <h4>¿Cómo puedo configurar las Cookies o deshabilitarlas?</h4>
              <div class="inset-lg-right-40 inset-xl-right-70">
                
                <ul>
                  <li>
                    Firefox http://support.mozilla.org/es/kb/habilitar-y-deshabilitar-Cookies-que-los-sitios-we
                  </li>
                  <li>
                    Safari http://support.apple.com/kb/HT1677?viewlocale=es_ES/
                  </li>
                  <li>
                    Google Chrome https://support.google.com/chrome/answer/95647?hl=es
                  </li>
                  <li>
                    Otros navegadores Consulte la documentación del navegador que tenga instalado.
                  </li>
                </ul>
              </div>

            </div>

            <div class="col-md-8" style="margin: auto;">
              <h4>Advertencia sobre eliminar Cookies</h4>
              <div class="inset-lg-right-40 inset-xl-right-70">
                <p>Puede eliminar y bloquear las Cookies de este sitio Web, pero parte del sitio no funcionará correctamente. </p>
              </div>

            </div>
            
           
          </div>
        </div>
      </section> 

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
  </style>
  <?php if (!isset($_COOKIE['politica'])): ?>
            <!-- Mensaje de cookies -->
            <div class="cook" id="cookie">
                
                <div class="cookies" >
                    <!-- Titulo -->
                    <h4  style="color: white ;margin-left:90px;margin-top: 5px ">Politica de Cookies</h4>
                    <!-- Descripción con enlace -->
                    <p class="" style="height:30px;margin-left:50px;margin-top: 10px; font-size: 16px" >
                        <span > ¿Aceptas nuestras  </span> 
                        <a style="color: rgb(0, 158, 207);"  href="/info">políticas de Cookies</a>?
                    </p>

                  <div style="margin-left:125px; ">
                    

                    <!-- Botón para aceptar -->
                    <button type="button" class="btn bg-success" style="margin-right: 20px;color: white" onclick="aceptar()">
                        SI.
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