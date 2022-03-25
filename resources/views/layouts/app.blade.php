<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.glowlogix.com.pk/gym/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Mar 2022 20:52:34 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('front')}}/css/style.css"/>

    <!-- For Entire Website Color Change -->
    <link id="color-change" rel="stylesheet" href="#"/>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('front')}}/css/font-awesome.min.css"/>

    <!-- LightBox CSS library for Style gallery view -->
    <link rel="stylesheet" href="{{asset('front')}}/css/lg-transitions.min.css"/>
    <link rel="stylesheet" href="{{asset('front')}}/css/lightgallery.min.css"/>

    <!-- Bootstrap Css -->
    <link href="{{asset('front')}}/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<!--  BEGIN HEADER  -->
<header id="header">
    <!-- BEGIN NAV -->
    <div class="navbar header-nav navbar-dark navbar-expand-lg" style="background: #0f0f0f96">
        <div class="container">

            <!-- BRAND LOGO -->
            <a class="navbar-brand" id="navbar-brand" href="{{route('home')}}" style="font-size: 20px !important;">
                <span class="highlight-color" id="text-color-change">Fitness</span> Club Management
            </a>

            <!-- BEGIN TOGGLER/COLLAPSIBE BUTTON -->
            <button class="navbar-toggler" id="navbar-toggler-bg" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"
                                                           id="navbar-toggler-color-change"> <i
                        class="fa fa-bars" style="font-size:32px"></i> </span></button>
            <!-- END TOGGLER/COLLAPSIBE BUTTON -->

            <!-- BEGIN NAVBAR LINKS -->
            <div class="my-2 my-lg-0 navbar-collapse collapse" id="collapsibleNavbar">
                <ul class="navbar-nav nav mx-auto" id="navbar">
                    <li class="nav-item"><a class="nav-link" id="hover-nav-menu" href="#home">Home</a></li>
                    <li class="nav-item ml-lg-4"><a class="nav-link" id="hover-nav-menu2" href="#about">About</a>
                    </li>
                    <li class="nav-item ml-lg-4"><a class="nav-link" id="hover-nav-menu3" href="#classes">Classes</a>
                    </li>
                    <li class="nav-item ml-lg-4"><a class="nav-link" id="hover-nav-menu7" href="#blog">Products</a></li>

                </ul>
                <a class="btn-nav btn-bg text-decoration-none" id="btn-bg-nav" href="#">Register</a></div>
            <!-- END NAVBAR LINKS -->
        </div>
    </div>
    <!-- END NAV -->

    <!-- BEGIN MAIN SLIDER -->
    <div id="home">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel slide">
            <!-- Carosel inner -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="bg-hero">
                        <div class="background-overlay">
                            <div class="container">
                                <div class="content-header text-center">
                                    <div class="line-thick rounded-lg mx-auto" id="bg-color-change"></div>
                                    <h6 class="text-tracking animated fadeInLeft">Welcome to</h6>
                                    <h1 class="main-heading animated fadeInRight"><span class="highlight-color"
                                                                                        id="text-color-change">fitness</span>
                                        club management</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="bg-hero">
                        <div class="background-overlay">
                            <div class="container">
                                <div class="content-header text-center">
                                    <div class="line-thick rounded-lg mx-auto" id="bg-color-change"></div>
                                    <h6 class="text-medium text-tracking animated fadeInLeft">Welcome to</h6>
                                    <h1 class="main-heading animated fadeInRight"><span class="highlight-color"
                                                                                        id="text-color-change">fitness</span>
                                        club management</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN SLIDE CHANGE -->
            <!-- END SLIDE CHANGE -->
        </div>
    </div>
    <!-- END MAIN SLIDER -->
</header>
<!--  END HEADER  -->

@yield('content')

<!-- BEGIN FOOTER -->
<footer id="footer">
    <div class="sub-footer-section deep-dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="logo text-white" style="font-size: 20px !important;"><span class="highlight-color" id="text-color-change">Fitness</span> Club
                        Management
                    </div>
                    <p class="light-medium-text text-mini line-height-medium my-3">
                        A gymnasium, also known as a gym, is a covered location for athletics. The word is derived from
                        the ancient Greek gymnasium. They are commonly found in athletic and fitness centres, and as
                        activity and learning spaces in educational institutions.  </p>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2">
                    <ul class="nav flex-column my-2 my-lg-0">
                        <li class="nav-item text-color">
                            <h6 class="footer-heading" id="text-color-change">Our Services</h6>
                        </li>
                        <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                            <div class="line-mini" id="bg-color-change"></div>
                            <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Bodybuilding</a></li>
                        <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                            <div class="line-mini" id="bg-color-change"></div>
                            <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Gym Classes</a></li>
                        <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                            <div class="line-mini" id="bg-color-change"></div>
                            <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Heavyweight</a></li>
                        <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                            <div class="line-mini" id="bg-color-change"></div>
                            <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Running</a></li>
                        <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                            <div class="line-mini" id="bg-color-change"></div>
                            <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Fitness</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2">
                    <ul class="nav flex-column my-2 my-lg-0">
                        <li class="nav-item text-color">
                            <h6 class="footer-heading" id="text-color-change">Quick Links</h6>
                        </li>
                        <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                            <div class="line-mini" id="bg-color-change"></div>
                            <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Bodybuilding</a></li>
                        <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                            <div class="line-mini" id="bg-color-change"></div>
                            <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Gym Classes</a></li>
                        <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                            <div class="line-mini" id="bg-color-change"></div>
                            <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Heavyweight</a></li>
                        <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                            <div class="line-mini" id="bg-color-change"></div>
                            <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Running</a></li>
                        <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                            <div class="line-mini" id="bg-color-change"></div>
                            <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Fitness</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <ul class="nav flex-column my-2 my-lg-0">
                        <li class="nav-item text-color">
                            <h6 class="footer-heading" id="text-color-change">Contact Us</h6>
                        </li>
                        <li class="nav-item">
                            <p class="light-medium-text text-mini line-height-mini mt-2">Feel free to contact us if you
                                have<br>
                                any question</p>
                        </li>
                        <li class="nav-item d-flex align-items-baseline link-footer"><i
                                class="fa fa-envelope-o text-color mr-2" id="footer-icons-color-change"></i>
                            <p class="text-mini light-medium-text">shopping@gmail.com</p>
                        </li>
                        <li class="nav-item d-flex align-items-baseline link-footer"><i
                                class="fa fa-phone text-color mr-2" id="footer-icons-color-change"></i>
                            <p class="text-mini light-medium-text">+92 111-555-777-9</p>
                        </li>
                        <li class="nav-item d-flex align-items-baseline link-footer"><i
                                class=" fa fa-map-o text-color mr-2" id="footer-icons-color-change"></i>
                            <p class="text-mini light-medium-text mb-0">Mohalla muslimabad, iqbal chowk,<br>
                                gujrat, pakistan</p>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="footer" id="border-color-change">
        <div class="container-fluid">
            <div class="row">
                <div class="footer-last mx-auto">
                    <p class="text-small light-medium-text py-4 m-0 text-center">copyright© 2022 by All right
                        reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end section #footer -->
<!-- END  FOOTER  -->


<!-- Javascript -->
<script src="{{asset('front')}}/js/jquery.min.js"></script>
<script src="{{asset('front')}}/js/popper.min.js"></script>
<script src="{{asset('front')}}/js/bootstrap.min.js"></script>
<script src="{{asset('front')}}/js/lightgallery.min.js"></script>
<script src="{{asset('front')}}/js/lightgallery-all.min.js"></script>
<script src="{{asset('front')}}/js/custom.js"></script>
</body>

<!-- Mirrored from demo.glowlogix.com.pk/gym/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Mar 2022 21:31:13 GMT -->
</html>
