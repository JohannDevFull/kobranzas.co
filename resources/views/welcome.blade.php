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

  <header class="page-header">
    <nav class="navbar navbar-fixed-top" role="navigation">
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
              <a href="#intro">Inicio</a>
            </li>
  
            <li class="page-scroll">
              <a href="#features">Ramas</a>
            </li>

            <li class="page-scroll">
              <a href="#pricing">Servicios</a>
            </li>
            <li class="page-scroll">
              <a href="#contact">Contacto</a>
            </li>
            @if (Route::has('login'))
            @auth
            <li style="padding-right:5px;margin-right: 5px">
              <a href="{{ url('/dashboard') }}" class="button button-smaller button-primary-outline" style="background-color:rgba(109,223,182,1);color: white;">Dashboard</a>
            </li>
            @else
            <li style="padding-right:5px;margin-right: 5px" id="ingresar">
              <a href="{{ route('login') }}" class="button button-smaller button-primary-outline">Ingresar</a>
            </li>
            @endauth
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section id="intro">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner text-uppercase" role="listbox">
        <div class="item carousel-item-one active">
          <div class="container">
            <h3 class="carousel-position-one animate-delay carousel-title-v1" data-animation="animated fadeInDown">
              Ofrecemos
            </h3>
            <p class="carousel-position-two animate-delay carousel-subtitle-v1" data-animation="animated fadeInDown">
              Ayuda legal asequible y eficaz
            </p>
            <a href="#contact" class="carousel-position-three animate-delay btn-brd-white" data-animation="animated fadeInUp">Contáctenos</a>
          </div>
        </div>

        <div class="item carousel-item-two">
          <div class="container">
            <h3 class="carousel-position-one animate-delay carousel-title-v2" data-animation="animated fadeInDown">
             LSA
            </h3>
            <p class="carousel-position-three animate-delay carousel-subtitle-v2" data-animation="animated fadeInDown">
              Asesoría jurídica sobre propiedad horizontal.
            </p>
          </div>
        </div>
        <div class="item carousel-item-three">
          <div class="center-block">
            <div class="center-block-wrap">
              <div class="center-block-body" style="background-color: rgba(0,0,0,0.6);">
                    <h4 class="margin-bottom-20 animate-delay carousel-title-v1 animated fadeInDown" data-animation="animated fadeInDown" style="position: absolute;
                		top: 140px; left: 40px;color:black;font-size: 39px;">
                     	LSA Abogados
                    </h4>
                
                    <p class="margin-bottom-20 animate-delay carousel-title-v3 animated fadeInDown" data-animation="animated fadeInDown" style="position: absolute; top: 210px; left: 40px;font-size: 39px;">
                      Casa de cobranzas
                    </p>
                    <a href="#contact" class="animate-delay btn-brd-white animated fadeInUp" data-animation="animated fadeInUp">Contáctenos</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="page-content">

    <section id="features">
      <div class="container service-bg">
        <div class="row">
          <div class="col-sm-4">
            <div class="services sm-margin-bottom-100">
              <div class="services-wrap">
                <div class="service-body">
                  <img src="{{asset('storage/img/imagen3.jpg')}}" alt=""> 
                </div>
              </div>
              <h2>Derecho empresarial</h2>
              <p>El derecho empresarial se ocupa de la creación de nuevas empresas y los problemas que surgen como existentes.</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="services sm-margin-bottom-100">
              <div class="services-wrap">
                <div class="service-body">
                   <img src="{{asset('storage/img/imagen1.jpg')}}" alt="">
                </div>
              </div>
              <h2>Derecho de familia</h2>
              <p>Los abogados de derecho familiar ayudan a sus clientes a solicitar la separación o el divorcio, la pensión alimenticia o la custodia de los hijos.</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="services">
              <div class="services-wrap">
                <div class="service-body">
                  <img src="{{asset('storage/img/imagen2.jpg')}}" alt=""> 
                </div>
              </div>
              <h2>Derecho civil</h2>
              <p>El litigio civil es el proceso en el que los asuntos civiles se resuelven en un tribunal de justicia.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="pricing">
      <div class="pricing-bg">
        <div class="container">
          <div class="heading">
            <h2>Algunos de nuestros <strong>Servicios</strong></h2>
            <P>Con nosotros<br> Siempre estás un paso adelante</P>
          </div>
          <div class="row no-space-row">
            <div class="col-md-4">
              <div class="pricing no-right-brd">
                <img src="main/onepage2/img/widgets/icon4.png" alt="">
                <h4>Casa de cobranzas</h4>
                <span></span>
                <ul class="pricing-features">
                  <!-- <li>1000 Copies</li>
                  <li>Unlimited Data</li>
                  <li>Unlimited Users</li>
                  <li>Forst 7 days free</li> -->
                </ul>
                <!-- <button type="button" class="btn-brd-primary">Contácto</button> -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="pricing pricing-red">
                <img src="main/onepage2/img/widgets/icon5.png" alt="">
                <h4>Asesoria jurídica</h4>
                <span>Precios asequibles</span>
                <ul class="pricing-features">
                  <!-- <li>1000 Copies</li>
                  <li>Unlimited Data</li>
                  <li>Unlimited Users</li>
                  <li>Forst 7 days free</li> -->
                </ul>
                <!-- <button type="button" class="btn-brd-white">Contácto</button> -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="pricing no-left-brd">
                <img src="main/onepage2/img/widgets/icon6.png" alt="">
                <h4>Propiedad horizontal</h4>
                <span></span>
                <ul class="pricing-features">
                  <!-- <li>1000 Copies</li>
                  <li>Unlimited Data</li>
                  <li>Unlimited Users</li>
                  <li>Forst 7 days free</li> -->
                </ul>
                <!-- <button type="button" class="btn-brd-primary">Contácto</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="bg-whisper">
      <div class="container">
        <div class="row">
          <div class="">
            <div class="section-50">
              <div class="heading">
              <h2>Contáctanos</h2>
              
                <p>Por favor, llena este formulario para ponernos en contacto contigo.</p>
              
              </div>
              <form onsubmit="validate(event)">
                @csrf
                <div class="row row-30">
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <label class="form-label" for="name">Nombre Completo <span class="required">*</span></label>

                      <input class="form-input" id="name" type="text" name="nombre" placeholder="Nombre Completo">
                      <br>
                      <small id="name-error" class="required"></small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <label class="form-label" for="email">Correo Electronico <span class="required">*</span></label>

                      <input class="form-input" id="email" type="email" name="correo" placeholder="Correo Electrónico">
                      <br>
                      <small id="email-error" class="required"></small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <label class="form-label" for="phone">Teléfono <span class="required">*</span></label>

                      <input class="form-input" id="phone" type="text" name="telefono" placeholder="Telefono">
                      <br>
                      <small id="phone-error" class="required"></small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <label class="form-label" for="city">Ciudad <span class="required">*</span></label>

                      <input class="form-input" id="city" type="text" name="ciudad" placeholder="Ciudad">
                      <br>
                      <small id="city-error" class="required"></small>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-wrap form-wrap-outside">
                      <label class="form-label" for="select">Tipo de Identificación <span class="required">*</span></label>
                      <select class="form-input select-filter" name="tipo_documento" id="select">
                        <option value="">Seleccione</option>
                        <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                        <option value="Cédula de Extrangería">Cédula de Extrangería</option>
                      </select>
                      <br>
                      <small id="select-error" class="required"></small>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-wrap ">
                      <label class="form-label" for="select">Tipo de Consulta <span class="required">*</span></label>

                      <select class="form-input" id="otro">
                        <option value="">Seleccione</option>
                        <option value="Ley familiar">Ley familiar</option>
                        <option value="Derecho empresarial">Derecho empresarial</option>
                        <option value="Juicio Civil">Juicio civil</option>
                        <option value="Otra">Otra</option>
                      </select>
                      <br>
                      <small id="otro-error" class="required"></small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <label class="form-label" for="doc">Identificación <span class="required">*</span></label>

                      <input class="form-input" id="doc" type="text" name="documento" placeholder="Número de Documento">
                      <br>
                      <small id="doc-error" class="required"></small>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-wrap">
                      <label class="form-label" for="message">Mensaje <span class="required">*</span></label>
                      <br>
                      <small>caracteres <span id="counter">0</span> de 400</small>

                      <textarea onkeyup="count()" class="form-input" id="message" name="mensaje" placeholder="Tu mensaje aquí..."></textarea>
                      <br>
                      <small id="message-error" class="required"></small>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-6">
                        <button style="max-height: 50px;" id="send-btn" class="button button-block button-primary">
                          <div id="loader" class="lds-ellipsis" style="display: none;">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                          </div>
                          <span id="send">Enviar</span>
                        </button>
                        <span id="error" class="required"></span>
                      </div>

                      <p id="wait-text" class="text-w" style="display: none;"> Espera por favor...</p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>


        </div>
      </div>

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
          <p>Copyright © 2020-2021 <a href="http://jtwoweb.tk"  target="_blank">jtwoweb.tk</a>. All rights reserved.</p>
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
  <a href="#intro" class="go2top"><i class="fa fa-arrow-up"></i></a>
  <?php if (!isset($_COOKIE['politica'])) : ?>
    <!-- Mensaje de cookies -->
    <div class="cook" id="cookie">

      <div class="cookies">
        <!-- Titulo -->
        <div>
          <h4 class="coo-title">Política de Cookies</h4>
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