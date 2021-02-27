<?php

// Si han aceptado la política
if (isset($_REQUEST['politica-cookies'])) {
  // Calculamos la caducidad, en este caso un año
  $caducidad = time() + (60 * 60 * 24 * 365);
  // Crea una cookie con la caducidad
  setcookie('politica', 'aceptada', $caducidad);
  echo '<script type="text/javascript">
            alert("N°:' . $_REQUEST['politica-cookies'] . 'Gracias por aceptar nuestras maliciosas politicas de cookies. ");
        </script>';
}
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <link rel="icon" href="storage/img/seguro.ico">
  <title>{{ config('app.name', 'Laravel') }} | Inicio</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">

  <link href='http://fonts.googleapis.com/css?family=Hind:400,500,300,600,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{asset('main/plugins/bootstrap/css/bootstrap.css')}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link href="{{asset('main/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('main/plugins/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('main/onepage2/css/layout.css')}}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
  


  @laravelPWA
</head>

<body class="page-header-fixed" onload="validacion()">

  <header  class="page-header">
    <nav style="background:#fff;" class="navbar navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="toggle-icon">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </span>
          </button>
          <a class="navbar-brand" href="#intro">

            <img src=" {{ asset('storage/img/AdminLTELogo.png') }}" class="logo-default" alt="Abogados LSA" width="110" style="width: 85px" />
            <img src=" {{ asset('storage/img/AdminLTELogo.png') }}" class="logo-scroll " alt="Abogados LSA" width="110" style="width: 85px;" />
          </a>
        </div>
        <div class="collapse navbar-collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
            <li class="page-scroll active">
              <a style="color: #344452;" href="/">Inicio</a>
            </li>
  
            <li class="page-scroll">
              <a style="color: #344452;" href="/#features">Ramas</a>
            </li>

            <li class="page-scroll">
              <a style="color: #344452;" href="/#pricing">Servicios</a>
            </li>
            <li  class="page-scroll">
              <a style="color: #344452;" href="/#contact">Contacto</a>
            </li>
            @if (Route::has('login'))
            @auth
            <li style="padding-right:5px;margin-right: 5px">
              <a  href="{{ url('/dashboard') }}" class="button button-smaller button-primary-outline" style="background-color:rgba(109,223,182,1);color: white;">Dashboard</a>
            </li>
            @else
            <li style="padding-right:5px;margin-right: 5px" id="ingresar">
              <a  href="{{ route('login') }}" class="button button-smaller button-primary-outline">Ingresar</a>
            </li>
            @endauth
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>
      <section  class="section-35 section-md-top-75 section-md-bottom-50 cookie-p">
        <div class="container" style="color: gray;">
          <h3 class="text-center">Politica de cookies</h3>
          <div class="row row-40" >
            <div class="col-md-8" style="margin: auto; float:none;">

              LSA Abogados S.A.S informa acerca del uso de las cookies en su página web: 
              <a href="/">
                www.lsa.com.co
              </a> 
            </div>
            

            <div class="col-md-8" style="margin: auto; float:none;">
              <h4 class="hcookie">¿Qué son las cookies?</h4>
              <div class="inset-lg-right-40 inset-xl-right-70">
                <p>Una cookie es un fichero que se descarga en su ordenador al acceder a determinadas páginas web. Las cookies permiten a una página web, entre otras cosas, almacenar y recuperar información sobre los hábitos de navegación de un usuario o de su equipo y, dependiendo de la información que contengan y de la forma en que utilice su equipo, pueden utilizarse para reconocer al usuario. </p>
              </div>
            </div>

            <br>
            <br>
            <br>

            <div class="col-md-8" style="margin: auto; float:none;">
              <h4 class="hcookie">¿Qué tipos de cookies utiliza esta página web?</h4>
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

            <div class="col-md-8" style="margin: auto; float:none;">
              <h4 class="hcookie">¿Cómo puedo configurar las Cookies o deshabilitarlas?</h4>
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

            <div class="col-md-8" style="margin: auto; float:none;">
              <h4 class="hcookie">Advertencia sobre eliminar Cookies</h4>
              <div class="inset-lg-right-40 inset-xl-right-70">
                <p>Puede eliminar y bloquear las Cookies de este sitio Web, pero parte del sitio no funcionará correctamente. </p>
              </div>

            </div>
            
           
          </div>
        </div>
      </section> 
      <div class="footer-copyright">
        <div class="container">
          <h3>LSA A bogados</h3>
          <ul class="copyright-socials">
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
          </ul>
          <p>Copyright © 2020-2021 <a href="http://jtwo.tk"  target="_blank">jtwo.tk</a>. All rights reserved.</p>
        </div>
      </div>
    </section>

  </div>
  <div class="snackbars" id="form-output-global"></div>
  <audio id="myAudio">
    <source src="storage/img/pop.ogg" type="audio/ogg">
    <source src="storage/img/pop.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>

  <div class="whatsapp-icon">
            <a href="https://api.whatsapp.com/send?phone=573144412784&text=¡Hola !" target="_blank"><i class="fab fa-whatsapp"></i></a>
        </div>
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


  <style type="text/css">
    .bg-g {
      background-color: #28a745 !important;
    }

    .bg-r {
      background-color: #dc3545 !important;

    }

    .cook {
      position: fixed;
      z-index: 10;
      color: white;
      background-color: black;
      width: 100%;
      height: 85px;
      bottom: 0px;
    }

    .cookies {
      display: flex;
      position: absolute;
      top: 25px;
    }

    .caja-botones {
      margin-left: 50px;
    }

    .coo-title {
      margin-left: 25px;
      color: white;
    }

    .pregunta {
      height: 30px;
      margin-left: 50px;
      margin-top: 10px;
      font-size: 16px;
    }

    @media (max-width: 575px) {
      .cook {
        position: fixed;
        z-index: 10;
        color: white;
        background-color: black;
        width: 100%;
        height: 134px;
        bottom: 0px;
      }

      .cookies {
        display: grid;
        grid-template-columns: repeat(3);
        width: 100%;
        position: absolute;
        top: 0px;
      }

      .coo-title {
        grid-column: 0 / 2;
        grid-row: 1;
        text-align: center;
        margin-top: 2%;
      }

      .pregunta {
        grid-row: 2;
        grid-column: 1 / 3;
        text-align: center;
        margin-left: 0px;
        margin-top: 2%;
      }

      .caja-botones {
        margin-left: 6%;
        margin-top: 2%;
        text-align: center;

      }
    }
  </style>
  <?php if (!isset($_COOKIE['politica'])) : ?>
    <!-- Mensaje de cookies -->
    <div class="cook" id="cookie">

      <div class="cookies">
        <!-- Titulo -->
        <div>
          <h4 class="coo-title">Politica de Cookies</h4>
        </div>
        <!-- Descripción con enlace -->
        <div>
          <p class="pregunta">
            <span> ¿Aceptas nuestras </span>
            <a style="color: rgb(0, 158, 207);" href="/politica">Política de Cookies</a>?
          </p>
        </div>



        <div class="caja-botones">


          <!-- Botón para aceptar -->
          <button type="button" class="btn bg-success bg-g" style="margin-right: 20px;color: white" onclick="aceptar()">
            Aceptar
          </button>

          <!-- Botón para NO aceptar -->
          <button type="button" class="btn bg-danger bg-r" style="margin:auto;margin-right: 15px;color: white;text-align: center;" onclick="rechazar()">

            No, gracias.
          </button>
        </div>

      </div>

    <?php endif; ?>

    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('main/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/jquery.easing.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/jquery.parallax.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/smooth-scroll/smooth-scroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/owl.carousel/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/onepage2/scripts/layout.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/pages/scripts/bs-carousel.js')}}" type="text/javascript"></script>
    <script>
      jQuery(document).ready(function() {
        Layout.init();
      });
    </script>
    <script type="text/javascript">
      function rechazar() {

        var x = document.getElementById("cookie");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }

      }

      function aceptar() {
        document.cookie = "politica=aceptada"
        var x = document.getElementById("cookie");

        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
        var y = document.getElementById("ingresar");
        var z = document.getElementById("chatc");
        y.style.display = "block";
        z.style.display = "block";
      }

      function validacion() {
        var politica = document.cookie.replace(/(?:(?:^|.*;\s*)politica\s*\=\s*([^;]*).*$)|^.*$/, "$1");

        var x = document.getElementById("chatc");
        var y = document.getElementById("ingresar");
        if (politica) {} else {
          x.style.display = "none";
          y.style.display = "none";
        }
      }
    </script>
    <script src="{{asset('js/form-contact.js')}}"></script>


</body>



</html>