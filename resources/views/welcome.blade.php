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
              <a href="#about">Nosotros</a>
            </li>
            <li class="page-scroll">
              <a href="#features">Features</a>
            </li>

            <li class="page-scroll">
              <a href="#clients">Clientes</a>
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
    <div id="carousel-example-generic" class="carousel slide">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner text-uppercase" role="listbox">
        <div class="item carousel-item-one active">
          <div class="container">
            <h3 class="carousel-position-one animate-delay carousel-title-v1" data-animation="animated fadeInDown">
              The New Way
            </h3>
            <p class="carousel-position-two animate-delay carousel-subtitle-v1" data-animation="animated fadeInDown">
              To Manage Your <br> Small to Enterprise Business
            </p>
            <a href="#" class="carousel-position-three animate-delay btn-brd-white" data-animation="animated fadeInUp">Learn More</a>
          </div>
        </div>

        <div class="item carousel-item-two">
          <div class="container">
            <h3 class="carousel-position-one animate-delay carousel-title-v2" data-animation="animated fadeInDown">
              Ultimate Apps <br> for Business
            </h3>
            <p class="carousel-position-three animate-delay carousel-subtitle-v2" data-animation="animated fadeInDown">
              Available in: Android &amp; IOS
            </p>
          </div>
        </div>
        <div class="item carousel-item-three">
          <div class="center-block">
            <div class="center-block-wrap">
              <div class="center-block-body">
                <h3 class="margin-bottom-20 animate-delay carousel-title-v1" data-animation="animated fadeInDown">
                  Let us show you
                </h3>
                <p class="margin-bottom-20 animate-delay carousel-title-v3" data-animation="animated fadeInDown">
                  A few things
                </p>
                <a href="#" class="animate-delay btn-brd-white" data-animation="animated fadeInUp">Learn More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="page-content">

    <section id="about">
      <div class="container service-bg">
        <div class="row">
          <div class="col-sm-4">
            <div class="services sm-margin-bottom-100">
              <div class="services-wrap">
                <div class="service-body">
                  <img src="main/onepage2/img/widgets/icon1.png" alt="">
                </div>
              </div>
              <h2>Metronic is time saver</h2>
              <p>Lorem ipsum dolor consetuer <br> erat votpat dolore</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="services sm-margin-bottom-100">
              <div class="services-wrap">
                <div class="service-body">
                  <img src="main/onepage2/img/widgets/icon2.png" alt="">
                </div>
              </div>
              <h2>Created for all type Devices</h2>
              <p>Lorem ipsum dolor consetuer <br> erat votpat dolore</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="services">
              <div class="services-wrap">
                <div class="service-body">
                  <img src="main/onepage2/img/widgets/icon3.png" alt="">
                </div>
              </div>
              <h2>Great individual Design</h2>
              <p>Lorem ipsum dolor consetuer <br> erat votpat dolore</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="features">
      <div class="features-bg">
        <div class="container">
          <div class="heading">
            <h2><strong>Metronics</strong> Main Features</h2>
            <p>To try the most advanced business</p>
          </div>
          <div class="row margin-bottom-70">
            <div class="col-md-6 md-margin-bottom-70">
              <div class="features">
                <img src="main/onepage2/img/widgets/screen1.png" alt="">
                <div class="features-in">
                  <h3><a href="#">Full sass support</a></h3>
                  <p>Lorem niam ipsum dolor sit ammet adipiscing et suitem elit et nonuy nibh elit niam dolor</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="features">
                <img src="main/onepage2/img/widgets/screen2.png" alt="">
                <div class="features-in">
                  <h3><a href="#">Awesome design</a></h3>
                  <p>Lorem niam ipsum dolor sit ammet adipiscing et suitem elit et nonuy nibh elit niam dolor</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row margin-bottom-80">
            <div class="col-md-6 md-margin-bottom-70">
              <div class="features">
                <img src="main/onepage2/img/widgets/screen3.png" alt="">
                <div class="features-in">
                  <h3><a href="#">Built with bootstrap</a></h3>
                  <p>Lorem niam ipsum dolor sit ammet adipiscing et suitem elit et nonuy nibh elit niam dolor</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="features">
                <img src="main/onepage2/img/widgets/screen4.png" alt="">
                <div class="features-in">
                  <h3><a href="#">AngularJS support</a></h3>
                  <p>Lorem niam ipsum dolor sit ammet adipiscing et suitem elit et nonuy nibh elit niam dolor</p>
                </div>
              </div>
            </div>
          </div>
          <center><a href="#" class="btn-brd-danger">Try it for free</a></center>
        </div>
      </div>
    </section>
    <section id="clients">
      <div class="clients">
        <div class="clients-bg">
          <div class="container">
            <div class="heading-blue">
              <h2>Over <strong>30.000</strong> Customers</h2>
              <p>and let's see what are they saying</p>
            </div>
            <div class="owl-carousel">
              <div class="item" data-quote="#client-quote-1">
                <img src="main/onepage2/img/clients/logo1.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-2">
                <img src="main/onepage2/img/clients/logo2.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-3">
                <img src="main/onepage2/img/clients/logo3.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-4">
                <img src="main/onepage2/img/clients/logo4.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-5">
                <img src="main/onepage2/img/clients/logo5.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-6">
                <img src="main/onepage2/img/clients/logo6.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-7">
                <img src="main/onepage2/img/clients/logo7.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-8">
                <img src="main/onepage2/img/clients/logo8.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-9">
                <img src="main/onepage2/img/clients/logo9.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-10">
                <img src="main/onepage2/img/clients/logo10.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-11">
                <img src="main/onepage2/img/clients/logo11.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-12">
                <img src="main/onepage2/img/clients/logo12.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-13">
                <img src="main/onepage2/img/clients/logo13.png" alt="">
              </div>
              <div class="item" data-quote="#client-quote-14">
                <img src="main/onepage2/img/clients/logo14.png" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="clients-quotes">
          <div class="container">
            <div class="client-quote" id="client-quote-1">
              <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit euismod tincidunt ut laoreet dolore magna aliquam dolor sit amet consectetuer elit</p>
              <h4>Mark Nilson</h4>
              <span>Director</span>
            </div>
            <div class="client-quote" id="client-quote-2">
              <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit euismod tincidunt aliquam dolor sit amet consectetuer elit</p>
              <h4>Lisa Wong</h4>
              <span>Artist</span>
            </div>
            <div class="client-quote" id="client-quote-3">
              <p>Lorem ipsum dolor sit amet consectetuer elit euismod tincidunt aliquam dolor sit amet elit</p>
              <h4>Nick Dalton</h4>
              <span>Developer</span>
            </div>
            <div class="client-quote" id="client-quote-4">
              <p>Fusce mattis vestibulum felis, vel semper mi interdum quis. Vestibulum ligula turpis, aliquam a molestie quis, gravida eu libero.</p>
              <h4>Alex Janmaat</h4>
              <span>Co-Founder</span>
            </div>
            <div class="client-quote" id="client-quote-5">
              <p>Vestibulum sodales imperdiet euismod.</p>
              <h4>Jeffrey Veen</h4>
              <span>Designer</span>
            </div>
            <div class="client-quote" id="client-quote-6">
              <p>Praesent sed sollicitudin mauris. Praesent eu metus laoreet, sodales orci nec, rutrum dui.</p>
              <h4>Inna Rose</h4>
              <span>Google</span>
            </div>
            <div class="client-quote" id="client-quote-7">
              <p>Sed ornare enim ligula, id imperdiet urna laoreet eu. Praesent eu metus laoreet, sodales orci nec, rutrum dui.</p>
              <h4>Jacob Nelson</h4>
              <span>Support</span>
            </div>
            <div class="client-quote" id="client-quote-8">
              <p>Adipiscing elit euismod tincidunt ut laoreet dolore magna aliquam dolor sit amet consectetuer elit</p>
              <h4>John Doe</h4>
              <span>Marketing</span>
            </div>
            <div class="client-quote" id="client-quote-9">
              <p>Nam euismod fringilla turpis vitae tincidunt, adipiscing elit euismod tincidunt aliquam dolor sit amet consectetuer elit</p>
              <h4>Michael Stawson</h4>
              <span>Graphic Designer</span>
            </div>
            <div class="client-quote" id="client-quote-10">
              <p>Quisque eget mi non enim efficitur fermentum id at purus.</p>
              <h4>Liam Nelsson</h4>
              <span>Actor</span>
            </div>
            <div class="client-quote" id="client-quote-11">
              <p>Integer et ante dictum, hendrerit metus eget, ornare massa.</p>
              <h4>Madison Klarsson</h4>
              <span>Director</span>
            </div>
            <div class="client-quote" id="client-quote-12">
              <p>Vestibulum sodales imperdiet euismod.</p>
              <h4>Ava Veen</h4>
              <span>Writer</span>
            </div>
            <div class="client-quote" id="client-quote-13">
              <p>Ut sit amet nisl nec dui lobortis gravida ut et neque. Praesent eu metus laoreet, sodales orci nec, rutrum dui.</p>
              <h4>Sophia Williams</h4>
              <span>Apple</span>
            </div>
            <div class="client-quote" id="client-quote-14">
              <p>Nam non vulputate orci. Duis sed mi nec ligula tristique semper vitae pretium nisi. Pellentesque nec enim vel magna pulvinar vulputate.</p>
              <h4>Melissa Korn</h4>
              <span>Reporter</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="pricing">
      <div class="pricing-bg">
        <div class="container">
          <div class="heading">
            <h2>Theme <strong>Pricing</strong></h2>
            <P>To try the most advanced business platform <br> for mobile and desktop</P>
          </div>
          <div class="row no-space-row">
            <div class="col-md-4">
              <div class="pricing no-right-brd">
                <img src="main/onepage2/img/widgets/icon4.png" alt="">
                <h4>Starter Plan</h4>
                <span>$99 / Month</span>
                <ul class="pricing-features">
                  <li>1000 Copies</li>
                  <li>Unlimited Data</li>
                  <li>Unlimited Users</li>
                  <li>Forst 7 days free</li>
                </ul>
                <button type="button" class="btn-brd-primary">Purchase</button>
              </div>
            </div>
            <div class="col-md-4">
              <div class="pricing pricing-red">
                <img src="main/onepage2/img/widgets/icon5.png" alt="">
                <h4>Business Plan</h4>
                <span>$99 / Month</span>
                <ul class="pricing-features">
                  <li>1000 Copies</li>
                  <li>Unlimited Data</li>
                  <li>Unlimited Users</li>
                  <li>Forst 7 days free</li>
                </ul>
                <button type="button" class="btn-brd-white">Purchase</button>
              </div>
            </div>
            <div class="col-md-4">
              <div class="pricing no-left-brd">
                <img src="main/onepage2/img/widgets/icon6.png" alt="">
                <h4>Expert Plan</h4>
                <span>$199 / Month</span>
                <ul class="pricing-features">
                  <li>1000 Copies</li>
                  <li>Unlimited Data</li>
                  <li>Unlimited Users</li>
                  <li>Forst 7 days free</li>
                </ul>
                <button type="button" class="btn-brd-primary">Purchase</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="contact">
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="heading-left-light">
                <h2>Say hello to Metronic</h2>
                <p>To try the most advanced business platform <br> for mobile and desktop</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form">
                <div class="form-wrap">
                  <div class="form-wrap-group">
                    <input type="text" placeholder="Your Name" class="form-control">
                    <input type="text" placeholder="Subject" class="border-top-transparent form-control">
                  </div>
                  <div class="form-wrap-group border-left-transparent">
                    <input type="text" placeholder="Your Email" class="form-control">
                    <input type="text" placeholder="Contact Phone" class="border-top-transparent form-control">
                  </div>
                </div>
              </div>
              <textarea rows="8" name="message" placeholder="Write comment here ..." class="border-top-transparent form-control"></textarea>
              <button type="submit" class="btn-danger btn-md btn-block">Send it</button>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <h3>Metronic</h3>
          <ul class="copyright-socials">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
          <P>Designed with love by <a href="http://www.keenthemes.com/">KeenThemes</a></P>
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
          <h4 class="coo-title">Politica de Cookies</h4>
        </div>
        <!-- Descripción con enlace -->
        <div>
          <p class="pregunta">
            <span> ¿Aceptas nuestras </span>
            <a style="color: rgb(0, 158, 207);" href="/politica">política de Cookies</a>?
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
    <script src="{{asset('plugins/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
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

</body>



</html>