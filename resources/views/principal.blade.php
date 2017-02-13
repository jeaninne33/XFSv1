<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>XFlightSupport</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">

	<link rel="shortcut icon" href="{{ asset("assets/icoXFS.ico") }}" type="image/x-icon">

    <!-- Theme Styles -->
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.min.css") }}">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="{{ asset("assets/css/style.css") }}">

</head>
<body>
  <div id="page-wrapper">
  <header id="header" class="navbar-static-top">
    <div style="background-image:url({{ asset("assets/images/header.png") }}); position: fixed;" class="topnav hidden-xs">
        <div class="container">

            <ul class="quick-menu pull-right">
              <li class="ribbon">
                @if (Auth::guest())
                    <li><a href="{{route('auth/login')}}">INICIO DE SESIÓN</a></li>
                @else
                        <a href="#">{{ Auth::user()->name }}</a>
                        <ul class="menu mini uppercase">

                            <li><a href="#">Perfil</a></li>
                            <li><a href="#">Configuración</a></li>
                            <li><a href="{{route('auth/logout')}}">SignOut</a></li>
                        </ul>
                  @endif

              </li>
            </ul>
        </div>
    </div>
  </header>
  <section id="content" class="gray-area">
      <div class="container">
          <div id="main">
              <div class="tab-container full-width-style arrow-left dashboard">
                  <ul class="tabs">
                      <li class="active"><a data-toggle="tab" href="#dashboard"><i class="soap-icon-anchor circle"></i>Dashboard</a></li>
                      <li class=""><a data-toggle="tab" href="#booking"><i class="soap-icon-businessbag circle"></i>Compañias</a></li>
                      <li class=""><a data-toggle="tab" href="#wishlist"><i class="soap-icon-wishlist circle"></i>Servicios</a></li>
                      <li class=""><a data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Estimados</a></li>
                      <li class=""><a data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Facturas</a></li>
                      <li class=""><a data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Reportes</a></li>
                  </ul>
                  <div class="tab-content">
                      <div id="dashboard" class="tab-pane fade in active">
                          <h1 class="no-margin skin-color">Hi Jessica, Welcome to Travelo!</h1>
                          <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                          <br />
                          <div class="row block">
                              <div class="col-sm-6 col-md-3">
                                  <a href="hotel-list-view.html">
                                      <div class="fact blue">
                                          <div class="numbers counters-box">
                                              <dl>
                                                  <dt class="display-counter" data-value="3200">0</dt>
                                                  <dd>Hotels to Stay</dd>
                                              </dl>
                                              <i class="icon soap-icon-hotel"></i>
                                          </div>
                                          <div class="description">
                                              <i class="icon soap-icon-longarrow-right"></i>
                                              <span>View Hotels</span>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                              <div class="col-sm-6 col-md-3">
                                  <a href="flight-list-view.html">
                                      <div class="fact yellow">
                                          <div class="numbers counters-box">
                                              <dl>
                                                  <dt class="display-counter" data-value="4509">0</dt>
                                                  <dd>Airlines to Travel</dd>
                                              </dl>
                                              <i class="icon soap-icon-plane"></i>
                                          </div>
                                          <div class="description">
                                              <i class="icon soap-icon-longarrow-right"></i>
                                              <span>View Flights</span>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                              <div class="col-sm-6 col-md-3">
                                  <a href="car-list-view.html">
                                      <div class="fact red">
                                          <div class="numbers counters-box">
                                              <dl>
                                                  <dt class="display-counter" data-value="3250">0</dt>
                                                  <dd>VIP Transports</dd>
                                              </dl>
                                              <i class="icon soap-icon-car"></i>
                                          </div>
                                          <div class="description">
                                              <i class="icon soap-icon-longarrow-right"></i>
                                              <span>View Cars</span>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                              <div class="col-sm-6 col-md-3">
                                  <a href="cruise-list-view.html">
                                      <div class="fact green">
                                          <div class="numbers counters-box">
                                              <dl>
                                                  <dt class="display-counter" data-value="1570">0</dt>
                                                  <dd>Celebrity Cruises</dd>
                                              </dl>
                                              <i class="icon soap-icon-cruise flip-effect"></i>
                                          </div>
                                          <div class="description">
                                              <i class="icon soap-icon-longarrow-right"></i>
                                              <span>View Cruises</span>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                          </div>
                          <div class="notification-area">
                              <div class="info-box block">
                                  <span class="close"></span>
                                  <p>This is your Dashboard, the place to check your Profile, respond to Reservation Requests, view upcoming Trip Information, and much more.</p>
                                  <br />
                                  <ul class="circle">
                                      <li><span class="skin-color">Learn How It Works</span> — Watch a short video that shows you how Travelo works.</li>
                                      <li><span class="skin-color">Get Help</span> — View our help section and FAQs to get started on Travelo. </li>
                                  </ul>
                              </div>
                          </div>

                          <div class="row block">
                              <div class="col-md-6 notifications">
                                  <h2>Notifications</h2>
                                  <a href="#">
                                      <div class="icon-box style1 fourty-space">
                                          <i class="soap-icon-plane-right takeoff-effect yellow-bg"></i>
                                          <span class="time pull-right">JUST NOW</span>
                                          <p class="box-title">London to Paris flight in <span class="price">$120</span></p>
                                      </div>
                                  </a>
                                  <a href="#">
                                      <div class="icon-box style1 fourty-space">
                                          <i class="soap-icon-hotel blue-bg"></i>
                                          <span class="time pull-right">10 Mins ago</span>
                                          <p class="box-title">Hilton hotel &amp; resorts in <span class="price">$247</span></p>
                                      </div>
                                  </a>
                                  <a href="#">
                                      <div class="icon-box style1 fourty-space">
                                          <i class="soap-icon-car red-bg"></i>
                                          <span class="time pull-right">39 Mins ago</span>
                                          <p class="box-title">Economy car for 2 days in <span class="price">$39</span></p>
                                      </div>
                                  </a>
                                  <a href="#">
                                      <div class="icon-box style1 fourty-space">
                                          <i class="soap-icon-cruise green-bg"></i>
                                          <span class="time pull-right">1 hour ago</span>
                                          <p class="box-title">Baja Mexico 4 nights in <span class="price">$537</span></p>
                                      </div>
                                  </a>
                                  <a href="#">
                                      <div class="icon-box style1 fourty-space">
                                          <i class="soap-icon-hotel blue-bg"></i>
                                          <span class="time pull-right">2 hours ago</span>
                                          <p class="box-title">Roosevelt hotel in <span class="price">$170</span></p>
                                      </div>
                                  </a>
                                  <a href="#">
                                      <div class="icon-box style1 fourty-space">
                                          <i class="soap-icon-hotel blue-bg"></i>
                                          <span class="time pull-right">3 hours ago</span>
                                          <p class="box-title">Cleopatra Resort in <span class="price">$247</span></p>
                                      </div>
                                  </a>
                                  <a href="#">
                                      <div class="icon-box style1 fourty-space">
                                          <i class="soap-icon-car red-bg"></i>
                                          <span class="time pull-right">3 hours ago</span>
                                          <p class="box-title">Elite Car per day in <span class="price">$48.99</span></p>
                                      </div>
                                  </a>
                                  <a href="#">
                                      <div class="icon-box style1 fourty-space">
                                          <i class="soap-icon-cruise green-bg"></i>
                                          <span class="time pull-right">last night</span>
                                          <p class="box-title">Rome to Africa 1 week in <span class="price">$875</span></p>
                                      </div>
                                  </a>
                                  <a href="#">
                                      <div class="load-more">. . . . . . . . . . . . . </div>
                                  </a>
                              </div>

                          </div>
                          <hr>
                      </div>
                      <div id="profile" class="tab-pane fade">
                          <div class="view-profile">
                              <article class="image-box style2 box innerstyle personal-details">
                                  <figure>
                                      <a title="" href="#"><img width="270" height="263" alt="" src="http://placehold.it/270x263"></a>
                                  </figure>
                                  <div class="details">
                                      <a href="#" class="button btn-mini pull-right edit-profile-btn">EDIT PROFILE</a>
                                      <h2 class="box-title fullname">Jessica Brown</h2>
                                      <dl class="term-description">
                                          <dt>user name:</dt><dd>info@jessica.com</dd>
                                          <dt>first name:</dt><dd>jessica</dd>
                                          <dt>last name:</dt><dd>brown</dd>
                                          <dt>phone number:</dt><dd>1-800-123-HELLO</dd>
                                          <dt>Date of birth:</dt><dd>15 August 1985</dd>
                                          <dt>Street Address and number:</dt><dd>353 Third floor Avenue</dd>
                                          <dt>Town / City:</dt><dd>Paris,France</dd>
                                          <dt>ZIP code:</dt><dd>75800-875</dd>
                                          <dt>Country:</dt><dd>United States of america</dd>
                                      </dl>
                                  </div>
                              </article>
                              <hr>
                              <h2>About You</h2>
                                  <div class="intro">
                                  <p>Vestibulum tristique, justo eu sollicitudin sagittis, metus dolor eleifend urna, quis scelerisque purus quam nec ligula. Suspendisse iaculis odio odio, ac vehicula nisi faucibus eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere semper sem ac aliquet. Duis vel bibendum tellus, eu hendrerit sapien. Proin fringilla, enim vel lobortis viverra, augue orci fringilla diam, sed cursus elit mi vel lacus. Nulla facilisi. Fusce sagittis, magna non vehicula gravida, ante arcu pulvinar arcu, aliquet luctus arcu purus sit amet sem. Mauris blandit odio sed nisi porttitor egestas. Mauris in quam interdum purus vehicula rutrum quis in sem. Integer interdum lectus at nulla dictum luctus. Sed risus felis, posuere id condimentum non, egestas pulvinar enim. Praesent pretium risus eget nisi ullamcorper fermentum. Duis lacinia nisi ac rhoncus vestibulum.</p>
                              </div>
                              <hr>
                              <h2>Today’s Suggestions</h2>
                              <div class="suggestions image-carousel style2" data-animation="slide" data-item-width="170" data-item-margin="22">
                                  <ul class="slides">
                                      <li>
                                          <a href="#" class="hover-effect">
                                              <img src="http://placehold.it/170x170" alt="" />
                                          </a>
                                          <h5 class="caption">Adventure</h5>
                                      </li>
                                      <li>
                                          <a href="#" class="hover-effect">
                                              <img src="http://placehold.it/170x170" alt="" />
                                          </a>
                                          <h5 class="caption">Beaches &amp; Sun</h5>
                                      </li>
                                      <li>
                                          <a href="#" class="hover-effect">
                                              <img src="http://placehold.it/170x170" alt="" />
                                          </a>
                                          <h5 class="caption">Casinos</h5>
                                      </li>
                                      <li>
                                          <a href="#" class="hover-effect">
                                              <img src="http://placehold.it/170x170" alt="" />
                                          </a>
                                          <h5 class="caption">Family Fun</h5>
                                      </li>
                                      <li>
                                          <a href="#" class="hover-effect">
                                              <img src="http://placehold.it/170x170" alt="" />
                                          </a>
                                          <h5 class="caption">History</h5>
                                      </li>
                                      <li>
                                          <a href="#" class="hover-effect">
                                              <img src="http://placehold.it/170x170" alt="" />
                                          </a>
                                          <h5 class="caption">Adventure</h5>
                                      </li>
                                  </ul>
                              </div>
                              <hr>
                              <div class="row">
                                  <div class="col-md-4">
                                      <h4>Benefits of Tavelo Account</h4>
                                      <ul class="benefits triangle hover">
                                          <li><a href="#">Faster bookings with lesser clicks</a></li>
                                          <li><a href="#">Track travel history &amp; manage bookings</a></li>
                                          <li class="active"><a href="#">Manage profile &amp; personalize experience</a></li>
                                          <li><a href="#">Receive alerts &amp; recommendations</a></li>
                                      </ul>
                                  </div>
                                  <div class="col-md-4 previous-bookings image-box style14">
                                      <h4>Your Previous Bookings</h4>
                                      <article class="box">
                                          <figure class="no-padding">
                                              <a title="" href="#">
                                                  <img alt="" src="http://placehold.it/63x59" width="63" height="59">
                                              </a>
                                          </figure>
                                          <div class="details">
                                              <h5 class="box-title"><a href="#">Half-Day Island Tour</a><small class="fourty-space"><span class="price">$35</span> Family Package</small></h5>
                                          </div>
                                      </article>
                                      <article class="box">
                                          <figure class="no-padding">
                                              <a title="" href="#">
                                                  <img alt="" src="http://placehold.it/63x59" width="63" height="59">
                                              </a>
                                          </figure>
                                          <div class="details">
                                              <h5 class="box-title"><a href="#">Ocean Park Tour</a><small class="fourty-space"><span class="price">$26</span> Per Person</small></h5>
                                          </div>
                                      </article>
                                  </div>
                                  <div class="col-md-4">
                                      <h4>Need Travelo Help?</h4>
                                      <div class="contact-box">
                                          <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                                          <address class="contact-details">
                                              <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                                              <br>
                                              <a class="contact-email" href="#">help@travelo.com</a>
                                          </address>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="edit-profile">
                              <form class="edit-profile-form">
                                  <h2>Personal Details</h2>
                                  <div class="col-sm-9 no-padding no-float">
                                      <div class="row form-group">
                                          <div class="col-sms-6 col-sm-6">
                                              <label>First Name</label>
                                              <input type="text" class="input-text full-width" placeholder="">
                                          </div>
                                          <div class="col-sms-6 col-sm-6">
                                              <label>Last Name</label>
                                              <input type="text" class="input-text full-width" placeholder="">
                                          </div>
                                      </div>
                                      <div class="row form-group">
                                          <div class="col-sms-6 col-sm-6">
                                              <label>Email Address</label>
                                              <input type="text" class="input-text full-width" placeholder="">
                                          </div>
                                          <div class="col-sms-6 col-sm-6">
                                              <label>Verify Email Address</label>
                                              <input type="text" class="input-text full-width" placeholder="">
                                          </div>
                                      </div>
                                      <div class="row form-group">
                                          <div class="col-sms-6 col-sm-6">
                                              <label>Country Code</label>
                                              <div class="selector">
                                                  <select class="full-width">
                                                      <option>United Kingdom (+44)</option>
                                                      <option>United States (+1)</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-sms-6 col-sm-6">
                                              <label>Phone Number</label>
                                              <input type="text" class="input-text full-width" placeholder="">
                                          </div>
                                      </div>
                                      <label>Date of Birth</label>
                                      <div class="row form-group">
                                          <div class="col-sms-4 col-sm-2">
                                              <div class="selector">
                                                  <select class="full-width">
                                                      <option value="">date</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-sms-4 col-sm-2">
                                              <div class="selector">
                                                  <select class="full-width">
                                                      <option value="">month</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-sms-4 col-sm-2">
                                              <div class="selector">
                                                  <select class="full-width">
                                                      <option value="">year</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                      <hr>
                                      <h2>Contact Details</h2>
                                      <div class="row form-group">
                                          <div class="col-sms-6 col-sm-6">
                                              <label>Street Name</label>
                                              <input type="text" class="input-text full-width">
                                          </div>
                                          <div class="col-sms-6 col-sm-6">
                                              <label>Address</label>
                                              <input type="text" class="input-text full-width">
                                          </div>
                                      </div>
                                      <div class="row form-group">
                                          <div class="col-sms-6 col-sm-6">
                                              <label>City</label>
                                              <div class="selector">
                                                  <select class="full-width">
                                                      <option value="">Select...</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-sms-6 col-sm-6">
                                              <label>Country</label>
                                              <div class="selector">
                                                  <select class="full-width">
                                                      <option value="">Select...</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row form-group">
                                          <div class="col-sms-6 col-sm-6">
                                              <label>Region State</label>
                                              <div class="selector">
                                                  <select class="full-width">
                                                      <option value="">Select...</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                      <hr>
                                      <h2>Upload Profile Photo</h2>
                                      <div class="row form-group">
                                          <div class="col-sms-12 col-sm-6 no-float">
                                              <div class="fileinput full-width">
                                                  <input type="file" class="input-text" data-placeholder="select image/s">
                                              </div>
                                          </div>
                                      </div>
                                      <hr>
                                      <h2>Describe Yourself</h2>
                                      <div class="form-group">
                                          <textarea rows="5" class="input-text full-width" placeholder="please tell us about you"></textarea>
                                      </div>
                                      <div class="from-group">
                                          <button type="submit" class="btn-medium col-sms-6 col-sm-4">UPDATE SETTINGS</button>
                                      </div>

                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>

<!-- Javascript -->
<script type="text/javascript" src="{{ asset("assets/js/jquery-1.11.1.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/js/jquery-ui.1.10.4.min.js") }}"></script>
<!-- Twitter Bootstrap -->
<script type="text/javascript" src="{{ asset("assets/js/bootstrap.min.js") }}"></script>

<!--SWEETALERT-->

@yield('scripts')
</body>
</html>
