<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content=""/>
<!-- Document Title -->
<title>@yield('page-title') | Bright Books</title>

<!-- StyleSheets -->
<link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/css/animate.css">
<link rel="stylesheet" href="/assets/css/icomoon.css">
<link rel="stylesheet" href="/assets/css/main.css">
<link rel="stylesheet" href="/assets/css/color-1.css">
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/responsive.css">
<link rel="stylesheet" href="/assets/css/transition.css">

<!-- FontsOnline -->
<link href='https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900italic,900,100italic,100' rel='stylesheet' type='text/css'>

<!-- JavaScripts -->
<script src="/assets/js/vendor/modernizr.js"></script>
</head>
<body>

<!-- Preloader -->
<!-- <div id="status">
    <div id="preloader">
        <div class="preloader position-center-center">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div> -->
<!-- Preloader -->

<!-- Wrapper -->
<div class="wrapper push-wrapper">
    <!-- Header -->
    <header id="header">
        <!-- Top Bar -->
        <div class="topbar">
            <div class="container">
                <!-- Social Icons -->
                <div class="social-icons pull-right">
                    <ul>
                        <li><a class="fa fa-facebook" href="#"></a></li>    
                        <li><a class="fa fa-twitter" href="#"></a></li> 
                        <li><a class="fa fa-google-plus" href="#"></a></li> 
                    </ul>
                </div>
                <!-- Social Icons -->
            </div>
        </div>
        <!-- Top Bar -->

        <!-- Nav -->
        <nav class="nav-holder style-1">
            <div class="container">
                <div class="mega-dropdown-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="/assets/images/logo-1.png" alt=""></a>
                    </div>
                    <!-- Logo -->
                    <!-- Search bar -->
                    <div class="search-bar">
                        <a href="#"><i class="fa fa-search"></i></a>
                    </div>
                    <!-- Search bar -->
                    <!-- Responsive Button -->
                    <div class="responsive-btn">
                        <a href="#menu" class="menu-link circle-btn"><i class="fa fa-bars"></i></a>
                    </div>
                    <!-- Responsive Button -->
                    <!-- Navigation -->
                    <div class="navigation">
                        <ul>
                            <li class="{{ Request::is('/') ? 'active' : null }}"><a href="{{ route('home.page') }}"><i class="fa fa-home"></i>Home</a></li>
                            <li class="{{ Request::is('about') ? 'active' : null }}"><a href="{{ route('home.about') }}"><i class="fa fa-files-o"></i>About</a></li>
                            <li class="{{ Request::is('gallery') ? 'active' : null }}"><a href="{{ route('home.gallery') }}"><i class="fa fa-files-o"></i>gallery</a></li>
                            <li class="{{ Request::is('author') ? 'active' : null }}"><a href="{{ route('home.author') }}"><i class="fa fa-file-text"></i>author</a></li>
                            <li class="{{ Request::is('contact') ? 'active' : null }}"><a href="{{ route('home.contact') }}"><i class="fa fa-fax"></i>contact</a></li>
                        </ul>
                    </div>              
                    <!-- Navigation -->
                </div>
            </div>
        </nav>
        <!-- Nav -->
    </header>
    <!-- Header -->

    <!-- BEGIN MAIN CONTENT -->
    @yield('main-content')
    <!-- END MAIN CONTENT -->

    <!-- Footer -->
    <footer id="footer"> 
        <!-- Footer columns -->
        @php
          $footers = App\Models\Footer::find(1);
      @endphp
        <div class="footer-columns">
            <div class="container">
                <!-- Columns Row -->
                <div class="row">
                    <!-- Footer Column -->
                    <div class="col-lg-4 col-sm-4">
                        <div class="footer-column logo-column">
                            <a href="index-1.html"><img src="/assets/images/logo-2.png" alt=""></a>
                            <p></p>
                            <ul class="address-list">
                                <li><i class="fa fa-home"></i>{{ $footers->address }}</li>
                                <li><i class="fa fa-phone"></i>{{ $footers->phone_no }}</li>
                                <li><i class="fa fa-envelope"></i>a{{ $footers->email }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Column -->

                    <!-- Footer Column -->
                    <div class="col-lg-4 col-sm-4">
                        <div class="footer-column footer-links">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="{{ route('home.page') }}">Home</a></li>
                                <li><a href="{{ route('home.about') }}">About</a></li>
                                <li><a href="{{ route('home.gallery') }}">Gallery</a></li>
                                <li><a href="{{ route('home.author') }}">Author</a></li>
                                <li><a href="{{ route('home.contact') }}">contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Column -->

                        <!-- Footer Column -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="footer-column newsletter">
                                <h4>Weekly Newsletter</h4>
                                <p>Get our awesome releases and latest updates with exclusive news and offers in your inbox.</p>
                                <form class="newsletter-input">
                                    <i class="fa fa-envelope-o"></i>
                                    <input class="form-control.newsletter" type="text" placeholder="Enter Your Email">
                                    <button>SUBSCRIBE</button>
                                </form>
                                <p>We're on Social Networks. Follow us &amp; get in touch!</p>
                                <ul class="social-icons">
                                    <li><a class="facebook mail" href="mailto:{{$footers->facebook_id}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter mail" href="mailto:{{$footers->twitter_id}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="youtube mail" href="mailto:{{$footers->youtube_id}}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                                    <li><a class="pinterest mail" href="mailto:{{$footers->pintrust_id}}" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer Column -->

                </div>
                <!-- Columns Row -->

            </div>
        </div>
        <!-- Footer columns -->
        
        <!-- Sub Footer -->
        <div class="sub-foorer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Copyright <i class="fa fa-copyright"></i> 2019-2020 <span class="theme-color">Al-Fateem Academy</span> All Rights Reserved.</p>
                    </div>
                    <div class="col-sm-6">
                        <a class="back-top" href="#">Back to Top<i class="fa fa-caret-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sub Footer -->
    </footer>
    <!-- Footer -->

</div>
<!-- Wrapper -->

<!-- Java Script -->

<script src="/assets/js/vendor/jquery.js"></script>        
<script src="/assets/js/vendor/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="/assets/js/gmap3.min.js"></script>                  
<script src="/assets/js/datepicker.js"></script>                 
<script src="/assets/js/contact-form.js"></script>                   
<script src="/assets/js/bigslide.js"></script>                           
<script src="/assets/js/3d-book-showcase.js"></script>                   
<script src="/assets/js/turn.js"></script>                           
<script src="/assets/js/jquery-ui.js"></script>                              
<script src="/assets/js/mcustom-scrollbar.js"></script>                  
<script src="/assets/js/timeliner.js"></script>                  
<script src="/assets/js/parallax.js"></script>                
<script src="/assets/js/countdown.js"></script>  
<script src="/assets/js/countTo.js"></script>        
<script src="/assets/js/owl-carousel.js"></script>   
<script src="/assets/js/bxslider.js"></script>   
<script src="/assets/js/appear.js"></script>             
<script src="/assets/js/sticky.js"></script>                 
<script src="/assets/js/prettyPhoto.js"></script>            
<script src="/assets/js/isotope.pkgd.js"></script>                    
<script src="/assets/js/wow-min.js"></script>            
<script src="/assets/js/classie.js"></script>                    
<script src="/assets/js/main.js"></script>   
<script src="/assets/js/myscript.js"></script>       

</body>
</html