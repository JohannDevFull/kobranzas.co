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
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"> </div>
        </div>
        <p>Loading...</p>
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
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button><a class="rd-navbar-brand brand" href="index.html"><img src=" {{ asset('storage/img/logo-defaul-143x27.png') }}" alt="" width="143" height="27"/></a>
                </div>
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-nav-inner">
                    <div class="rd-navbar-btn-wrap">
                      
                      <!-- Right navbar links -->
                      @if (Route::has('login'))
                      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline" style="background-color:rgba(109,223,182,1);color: white;">Dashboard</a>
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
                      <li><a href="about-us.html">Servicios</a></li>
                      <li><a href="about-us.html">Equipo</a></li>
                      <li><a href="about-us.html">Nosotros</a></li>
                      <li><a href="about-us.html">Contacto</a></li>
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
                        <h3 class="medium text-primary">With Us</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">You Are Always One Step Ahead</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Strategies of our attorneys will help you solve very complex legal issues.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#">Request a Free Consultation</a></div>
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
                        <h3 class="medium text-primary">We Offer</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">Affordable and Effective Legal Help</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Our expert team of attorneys and consultants will be glad to provide necessary legal assistance.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#">Request a Free Consultation</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" data-slide-bg="{{ asset('storage/img/fondo3.jpg') }}">
              <div class="swiper-slide-caption text-center">
                <div class="container">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 col-lg-10 col-xl-9">
                      <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                        <h3 class="medium text-primary">With Our Services</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">You Will Get Extensive Legal Support</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">We have years of experience in providing legal help in various spheres of law.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#">Request a Free Consultation</a></div>
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

      <section class="section-50 section-md-75 section-lg-100">
        <div class="container">
          <div class="row row-40">
            <div class="col-md-6 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                  <div class="box-icon"><span class="novi-icon icon icon-primary icon-lg mercury-icon-briefcase"></span></div>
                  <div class="box-header">
                    <h5><a href="#">Business Law</a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="box-body">
                  <p>Business law deals with the creation of new businesses and the issues that arise as existing.</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                  <div class="box-icon"><span class="novi-icon icon icon-primary icon-lg mercury-icon-users"></span></div>
                  <div class="box-header">
                    <h5><a href="#">Family Law</a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="box-body">
                  <p>Family law attorneys help their clients file for separation or divorce, alimony or child custody.</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                  <div class="box-icon"><span class="novi-icon icon icon-primary icon-lg mercury-icon-lib"></span></div>
                  <div class="box-header">
                    <h5><a href="#">Civil Litigation</a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="box-body">
                  <p>Civil litigation is the process in which civil matters are resolved in a court of law.</p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section class="bg-displaced-wrap">
        <div class="bg-displaced-body">
          <div class="container">
            <div class="inset-xl-left-70 inset-xl-right-70">
              <article class="box-cart bg-ebony-clay">
                <div class="box-cart-image"><img src="{{ asset('storage/img/home-2-342x338.jpg') }}" alt="" width="342" height="338"/>
                </div>
                <div class="box-cart-body">
                  <blockquote class="blockquote-complex blockquote-complex-inverse">
                    <h3>About Us</h3>
                    <p>
                      <q>When you place your case in the hands of our lawyers and paralegals, you are placing your case in the hands of professionals who are committed to achieving the best possible outcome.</q>
                    </p>
                    <div class="quote-footer">
                      <cite>Ryan Emberson</cite><small>CEO at LawExpert</small>
                    </div>
                  </blockquote>
                  <div class="button-wrap inset-md-left-70"><a class="button button-responsive button-medium button-primary-outline-v2" href="#">Request a Free Consultation</a></div>
                </div>
              </article>
            </div>
          </div>
        </div>
        <div class="bg-displaced bg-image" style="background-image: url(images/home-1.jpg);"></div>
      </section>

      <section class="section-60 section-lg-100">
        <div class="container">
          <div class="row row-40 align-items-sm-end">
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src=" {{ asset('storage/img/team-9-246x300.jpg') }}" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="tel:#">+1 (409) 987–5874</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="mailto:#">info@demolink.org</a></div>
                  </div>
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="#">Amanda Smith</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Paralegal</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="{{ asset('storage/img/team-10-246x300.jpg') }}" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="tel:#">+1 (409) 987–5874</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="mailto:#">info@demolink.org</a></div>
                  </div>
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="#">John Doe</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Attorney</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="{{ asset('storage/img/team-11-246x300.jpg') }}" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="tel:#">+1 (409) 987–5874</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="mailto:#">info@demolink.org</a></div>
                  </div>
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="#">Vanessa Ives</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Legal Assistant</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-3 text-center">
              <div class="block-wrap-1">
                <div class="block-number">06</div>
                <h3 class="text-normal">Experts</h3>
                <p class="h5 h5-smaller text-style-4">in Their Fields</p>
                <p>If you or your business is facing a legal challenge, contact us today to arrange a free initial consultation with an attorney.</p><a class="link link-group link-group-animated link-bold link-secondary" href="#"><span>Read more</span><span class="novi-icon icon icon-xxs icon-primary fa fa-angle-right"></span></a>
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
                    <p class="box-header">Happy Clients</p>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="box-counter box-counter-inverse"><span class="novi-icon icon icon-lg-smaller icon-primary mercury-icon-scales"></span>
                    <div class="text-large counter">23</div>
                    <p class="box-header">Years of Experience</p>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="box-counter box-counter-inverse"><span class="novi-icon icon icon-lg-smaller icon-primary mercury-icon-partners"></span>
                    <div class="text-large counter counter-percent">98</div>
                    <p class="box-header">Successful Cases</p>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="box-counter box-counter-inverse"><span class="novi-icon icon icon-lg icon-primary mercury-icon-case"></span>
                    <div class="text-large counter">7500</div>
                    <p class="box-header">Personal Injury Cases</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="section-66 section-md-90 section-xl-bottom-100">
        <div class="container">
          <h3 class="text-center">Testimonials</h3>
          <div class="owl-carousel owl-spacing-1 owl-nav-classic owl-style-minimal" data-autoplay="true" data-items="1" data-md-items="2" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="true" data-nav="true" data-dots="true" data-dots-each="1">
            <div class="item">
              <blockquote class="quote-bordered">
                <div class="quote-body">
                  <div class="quote-open">
                    <svg version="1.1" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37px" height="27px" viewbox="0 0 21 15" preserveAspectRatio="none">
                      <path d="M9.597,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.349,1.316                    c-1.287,0-2.414-0.44-3.382-1.316C0.482,12.811,0,11.758,0,10.535c0-1.226,0.58-2.716,1.739-4.473L5.603,0H9.34L6.956,6.37                    C8.716,7.145,9.597,8.493,9.597,10.412z M20.987,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.35,1.316                    c-1.288,0-2.415-0.44-3.381-1.316c-0.966-0.879-1.45-1.931-1.45-3.154c0-1.226,0.582-2.716,1.74-4.473L16.994,0h3.734l-2.382,6.37                    C20.106,7.145,20.987,8.493,20.987,10.412z"></path>
                    </svg>
                  </div>
                  <div class="quote-body-inner">
                    <h6>One of The Most Ethical Lawyers I’ve Ever Known...</h6>
                    <p>
                      <q>I’ve never known another lawyer more prepared or focused.  John has the ability to dissect a case much like a skilled surgeon, with absolute calm.  Nothing seems to distract him from his goal on a case, which of course, makes him extremely tough to beat.</q>
                    </p>
                  </div>
                </div>
                <div class="quote-footer">
                  <div class="unit unit-horizontal unit-spacing-sm align-items-center">
                    <div class="unit-left"><img class="img-circle" src="{{ asset('storage/img/clients-testimonials-1-68x68.jpg') }}" alt="" width="68" height="68"/>
                    </div>
                    <div class="unit-body">
                      <cite>Mark Wilson</cite>
                      <p class="text-primary">CFO, Wilson Ltd.</p>
                    </div>
                  </div>
                </div>
              </blockquote>
            </div>
            <div class="item">
              <blockquote class="quote-bordered">
                <div class="quote-body">
                  <div class="quote-open">
                    <svg version="1.1" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37px" height="27px" viewbox="0 0 21 15" preserveAspectRatio="none">
                      <path d="M9.597,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.349,1.316                    c-1.287,0-2.414-0.44-3.382-1.316C0.482,12.811,0,11.758,0,10.535c0-1.226,0.58-2.716,1.739-4.473L5.603,0H9.34L6.956,6.37                    C8.716,7.145,9.597,8.493,9.597,10.412z M20.987,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.35,1.316                    c-1.288,0-2.415-0.44-3.381-1.316c-0.966-0.879-1.45-1.931-1.45-3.154c0-1.226,0.582-2.716,1.74-4.473L16.994,0h3.734l-2.382,6.37                    C20.106,7.145,20.987,8.493,20.987,10.412z"></path>
                    </svg>
                  </div>
                  <div class="quote-body-inner">
                    <h6>LawExpert is One of The Best...</h6>
                    <p>
                      <q>John Doe is one of those attorneys who has it all-talent and skill, compassion for his clients, and the ability to communicate well with anyone he meets. This is one of the best combinations for a trial attorney and he is one of the best.</q>
                    </p>
                  </div>
                </div>
                <div class="quote-footer">
                  <div class="unit unit-horizontal unit-spacing-sm align-items-center">
                    <div class="unit-left"><img class="img-circle" src="{{ asset('storage/img/clients-testimonials-2-68x68.jpg') }}" alt="" width="68" height="68"/>
                    </div>
                    <div class="unit-body">
                      <cite>Amanda Eberson</cite>
                      <p class="text-primary">CEO, Eberson Co.</p>
                    </div>
                  </div>
                </div>
              </blockquote>
            </div>
          </div>
        </div>
      </section>

      <section class="bg-whisper">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-lg-9 col-xl-7">
              <div class="section-50 section-md-75 section-xl-100">
                <h3>Free Consultation</h3>
                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                  <div class="row row-30">
                    <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="request-form-name" type="text" name="name" data-constraints="@Required">
                        <label class="form-label" for="request-form-name">Name</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="request-form-phone" type="text" name="phone" data-constraints="@Numeric @Required">
                        <label class="form-label" for="request-form-phone">Phone</label>
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
                          <option>Family Law</option>
                          <option value="Family Law">Family Law</option>
                          <option value="Business Law">Business Law</option>
                          <option value="Civil Litigation">Civil Litigation</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-wrap">
                        <textarea class="form-input" id="feedback-2-message" name="message" data-constraints="@Required"></textarea>
                        <label class="form-label" for="feedback-2-message">Message</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-md-6">
                          <button class="button button-block button-primary" type="submit">Request a Free Consultation</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-xl-5 d-none d-xl-block">
              <div style="margin-top: -40px;"><img src="{{ asset('storage/img/home-4-472x753.png') }}" alt="" width="472" height="753"/>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-50 section-md-75 section-xl-100">
        <div class="container">
          <h3 class="text-center">Latest News</h3>
          <div class="row row-40 row-offset-1 justify-content-sm-center justify-content-md-start">
            <div class="col-sm-9 col-md-6 col-lg-4 col-xl-3">
              <article class="post-boxed">
                <div class="post-boxed-image"><img src="{{ asset('storage/img/home-5-268x182.jpg') }}" alt="" width="268" height="182"/>
                </div>
                <div class="post-boxed-body">
                  <div class="post-boxed-title"><a href="#">The Lawyers Collective Women's Rights Initiative</a></div>
                  <div class="post-boxed-footer">
                    <ul class="post-boxed-meta">
                      <li>
                        <time datetime="2019-06-14">JUNE 14, 2019</time>
                      </li>
                      <li><span>by</span><a href="#">Admin</a></li>
                    </ul>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-9 col-md-6 col-lg-4 col-xl-3">
              <article class="post-boxed">
                <div class="post-boxed-image"><img src="{{ asset('storage/img/home-6-268x182.jpg') }}" alt="" width="268" height="182"/>
                </div>
                <div class="post-boxed-body">
                  <div class="post-boxed-title"><a href="#">Legal Documents Every Landlord Needs</a></div>
                  <div class="post-boxed-footer">
                    <ul class="post-boxed-meta">
                      <li>
                        <time datetime="2019-06-20">JUNE 20, 2019</time>
                      </li>
                      <li><span>by</span><a href="#">Admin</a></li>
                    </ul>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-9 col-md-6 col-lg-4 col-xl-3">
              <article class="post-boxed">
                <div class="post-boxed-image"><img src="{{ asset('storage/img/home-7-268x182.jpg') }}" alt="" width="268" height="182"/>
                </div>
                <div class="post-boxed-body">
                  <div class="post-boxed-title"><a href="#">Help Us Make the Law Accessible for Everyone</a></div>
                  <div class="post-boxed-footer">
                    <ul class="post-boxed-meta">
                      <li>
                        <time datetime="2019-06-23">JUNE 23, 2019</time>
                      </li>
                      <li><span>by</span><a href="#">Admin</a></li>
                    </ul>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-9 col-md-6 col-lg-4 col-xl-3">
              <article class="post-boxed">
                <div class="post-boxed-image"><img src="{{ asset('storage/img/home-8-268x182.jpg') }}" alt="" width="268" height="182"/>
                </div>
                <div class="post-boxed-body">
                  <div class="post-boxed-title"><a href="#">5 Legal Documents for Military Service People</a></div>
                  <div class="post-boxed-footer">
                    <ul class="post-boxed-meta">
                      <li>
                        <time datetime="2019-06-12">JUNE 12, 2019</time>
                      </li>
                      <li><span>by</span><a href="#">Admin</a></li>
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
                        If you or your business is facing a legal
                        challenge that calls for sound advice and skilled representation, contact us today to arrange a free  consultation with an attorney.
                      </p><a class="link link-group link-group-animated link-bold link-white" href="#"><span>Free Consultation</span><span class="novi-icon icon icon-xxs icon-primary fa fa-angle-right"></span></a>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-xl-3">
                    <p class="h7">Recent Posts</p>
                          <article class="post post-preview post-preview-inverse"><a href="#">
                              <div class="unit unit-horizontal unit-spacing-lg">
                                <div class="unit-left">
                                  <figure class="post-image"><img src="{{ asset('storage/img/post-preview-4-70x70.jpg') }}" alt="" width="70" height="70"/>
                                  </figure>
                                </div>
                                <div class="unit-body">
                                  <div class="post-header">
                                    <p>Help Us Make the Law Accessible for Everyone</p>
                                  </div>
                                  <div class="post-meta">
                                    <ul class="list-meta">
                                      <li>
                                        <time datetime="2019-06-23">June 23, 2019 </time>
                                      </li>
                                      <li>3 Comments</li>
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
                                    <p>Legal Documents Every Landlord Needs </p>
                                  </div>
                                  <div class="post-meta">
                                    <ul class="list-meta">
                                      <li>
                                        <time datetime="2019-06-23">June 20, 2019</time>
                                      </li>
                                      <li>3 Comments</li>
                                    </ul>
                                  </div>
                                </div>
                              </div></a></article>
                  </div>
                  <div class="col-md-6 col-lg-4 col-xl-3">
                    <p class="h7">Quick links</p>
                    <div class="row" style="max-width: 270px;">
                      <div class="col-6">
                        <ul class="list-marked-variant-2">
                          <li><a href="index.html">Home</a></li>
                          <li><a href="#">Services</a></li>
                          <li><a href="#">Careers</a></li>
                          <li><a href="#">Blog</a></li>
                        </ul>
                      </div>
                      <div class="col-6">
                        <ul class="list-marked-variant-2">
                          <li><a href="about-us.html">About us</a></li>
                          <li><a href="contact-us.html">Contacts</a></li>
                          <li><a href="#">Ingresar</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-xl-3">
                    <p class="h7">Contact us</p>
                    <address class="contact-info text-left">
                      <div class="unit unit-horizontal unit-spacing-md align-items-center">
                        <div class="unit-left"><span class="novi-icon icon icon-xs icon-storm-gray material-icons-phone"></span></div>
                        <div class="unit-body"><a class="link-white" href="tel:#">+123 234 984 47 45</a></div>
                      </div>
                      <div class="unit unit-horizontal unit-spacing-md align-items-center">
                        <div class="unit-left"><span class="novi-icon icon icon-xs icon-storm-gray fa fa-envelope-o"></span></div>
                        <div class="unit-body"><a class="link-white" href="mailto:#">info@demolink.org</a></div>
                      </div>
                      <div class="unit unit-horizontal unit-spacing-md">
                        <div class="unit-left"><span class="novi-icon icon icon-xs icon-storm-gray material-icons-place"></span></div>
                        <div class="unit-body"><a class="link-white d-inline" href="#">6036 Richmond hwy,<br>Alexandria, VA USA 22303</a></div>
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


    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>

  </body>
</html>