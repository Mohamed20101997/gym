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

    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">

    <!-- LightBox CSS library for Style gallery view -->
    <link rel="stylesheet" href="{{asset('front')}}/css/lg-transitions.min.css"/>
    <link rel="stylesheet" href="{{asset('front')}}/css/lightgallery.min.css"/>

    <!-- Bootstrap Css -->
    <link href="{{asset('front')}}/css/bootstrap.min.css" rel="stylesheet">

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>
    <script src="{{ asset('front/js/sweetalert.js') }}"></script>


    <style>
        .nav-scroll{
            color: #c5da9b !important;
            font-weight: bold;
            font-size: 20px !important;
        }
        .nav-not-scroll{
            font-weight: bold;
            font-size: 30px !important;
        }
        .modal-header{
            display: flex;
            justify-content: center;
            color: #81b21b;
            font-weight: bold;
        }
        .modal-content{
            background: #11183cf5;
            color: #FFF;
        }

        @yield('css')

    </style>
</head>
<body>

@include('partials_front._session')
@include('partials_front._errors')

<!--  BEGIN HEADER  -->
<header id="header">
    <!-- BEGIN NAV -->
        <div class="navbar header-nav navbar-dark navbar-expand-lg" id="navbar-top">
        <div class="container">

            <!-- BRAND LOGO -->
            <a class="navbar-brand" id="navbar-brand" href="{{route('home')}}">
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

                @if(auth()->guard('client')->check())
                    <h5 class="text-white">
                    <span class="highlight-color" id="text-color-change"> {{auth()->guard('client')->user()->first_name}} </span>  {{auth()->guard('client')->user()->last_name}}
                    </h5>

                    <a href="{{route('front.logout')}}" class="btn-nav btn-bg text-decoration-none ml-3" >
                        logout
                    </a>

                @else
                    <button id="register" class="btn-nav btn-bg text-decoration-none mr-3" data-toggle="modal" data-target=".bd-example-modal-lg">
                        Register
                    </button>

                    <button id="login" class="btn-nav btn-bg text-decoration-none" data-toggle="modal" data-target=".bd-example-modal-sm" >
                        Login
                    </button>
                @endif

            </div>


            <!-- END NAVBAR LINKS -->
        </div>
    </div>
    <!-- END NAV -->

    @yield('slider')
</header>
<!--  END HEADER  -->
{{-- Model Register --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h1>Create new account</h1>
            </div>

            {{-- model of register --}}
            <div class="modal-body">
            {!! Form::open(['method'=>'post', 'route' => 'front.register' ,'enctype'=>'multipart/form-data']) !!}

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="first_name"> First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="first name"
                               class="form-control" required>
                    </div>

                    @error('first_name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label for="last_name"> Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="last name" required>
                    </div>

                    @error('last_name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="email" required>
                    </div>

                    @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender">
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}> Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}> Female
                            </option>
                        </select>
                    </div>

                    @error('gender')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

            </div> {{-- end of row --}}

            <div class="row">

                <div class="col-md-4">
                    {{-- Password --}}
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password"
                               name="password" class="form-control" placeholder="Password" required>
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>{{-- end of col Password --}}

                <div class="col-md-4">
                    {{-- Password confirmation --}}
                    <div class="form-group">
                        <label>Re-Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="password confirmation" required>
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>{{-- end of col Password confirmation --}}


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" name="phone" {{ old('phone') }} class="form-control" placeholder="phone" required>
                        @error('phone')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

            </div> {{-- end of row --}}


            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Current Weight( KG )</label>
                        <input type="number" min="1" name="current_weight" value="{{ old('current_weight') }}" class="form-control" placeholder="Current Weight">
                        @error("current_weight")
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Height( cm )</label>
                        <input type="number" min="1" name="height" value=" {{ old('height') }}"  class="form-control"  placeholder="Height">
                        @error("height")
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>ِِAge</label>
                        <input type="number" min="10" name="age"  value=" {{ old('age') }}"  class="form-control"  placeholder="age" required>
                        @error("age")
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>	Date Of Birth</label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"  class="form-control" placeholder="date of birth" required>
                        @error("date_of_birth")
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

            </div> {{-- end of row --}}


            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country"  value="{{ old('country') }}"  class="form-control" placeholder="country" required>
                        @error('country')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" value="{{ old('city') }}"   class="form-control" placeholder="city" required>
                        @error('city')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address"  value="{{ old('address') }}"  class="form-control" placeholder="Address" required>
                        @error('address')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

            </div> {{-- end of row --}}
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>image</label>
                            <input type="file" name="image" class="form-control">
                            @error("image")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>


            <div class="form-group modal-footer" style="display: flex; justify-content: center">
                <button type="submit" class="btn-nav btn-bg text-decoration-none" style="width: 50%">Create New Account</button>
            </div>

            {!! Form::close() !!}
            </div>


        </div>
    </div>
</div>

{{-- Model Register --}}

{{-- model of login --}}
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Login</h1>
            </div>
            <div class="modal-body">
                <form action="{{route('front.login')}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>

                    </div>

                    <div class="form-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group modal-footer" style="display: flex; justify-content: center">
                        <button type="submit" class="btn-nav btn-bg text-decoration-none" style="width: 50%">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
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

@yield('js')

</body>

<!-- Mirrored from demo.glowlogix.com.pk/gym/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Mar 2022 21:31:13 GMT -->
</html>
