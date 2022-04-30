<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.glowlogix.com.pk/gym/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Mar 2022 20:52:34 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('front') }}/css/style.css" />

    <!-- For Entire Website Color Change -->
    <link id="color-change" rel="stylesheet" href="#" />

    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">

    <!-- LightBox CSS library for Style gallery view -->
    <link rel="stylesheet" href="{{ asset('front') }}/css/lg-transitions.min.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/lightgallery.min.css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('front') }}/css/bootstrap.min.css" rel="stylesheet">

    {{-- noty --}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>
    <script src="{{ asset('front/js/sweetalert.js') }}"></script>


    <style>
        .nav-scroll {
            color: #c5da9b !important;
            font-weight: bold;
            font-size: 20px !important;
        }

        .nav-not-scroll {
            font-weight: bold;
            font-size: 30px !important;
        }

        .modal-header {
            display: flex;
            justify-content: center;
            color: #81b21b;
            font-weight: bold;
        }

        .modal-content {
            background: #11183cf5;
            color: #FFF;
        }

        .client_img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
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
                <a class="navbar-brand" id="navbar-brand" href="{{ route('home') }}">
                    <span class="highlight-color" id="text-color-change">Fitness</span> Club Management
                </a>

                <!-- BEGIN TOGGLER/COLLAPSIBE BUTTON -->
                <button class="navbar-toggler" id="navbar-toggler-bg" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavbar"><span class="navbar-toggler-icon" id="navbar-toggler-color-change">
                        <i class="fa fa-bars" style="font-size:32px"></i> </span></button>
                <!-- END TOGGLER/COLLAPSIBE BUTTON -->

                <!-- BEGIN NAVBAR LINKS -->
                <div class="my-2 my-lg-0 navbar-collapse collapse" id="collapsibleNavbar">
                    @yield('ul')

                    @if (auth()->guard('client')->check())
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="highlight-color" id="text-color-change">
                                {{ auth()->guard('client')->user()->first_name }} </span>
                            {{ auth()->guard('client')->user()->last_name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('front.profile') }}" >Profile</a>
                                <a href="{{ route('front.logout') }}" class="dropdown-item"> logout </a>
                            </div>
                        </div>

                        @if (!empty(auth()->guard('client')->user()->image))
                            <img src="{{ image_path(auth()->guard('client')->user()->image ) }}" class="ml-3 client_img" >
                        @else
                            <img src="{{ image_path('default.png') }}" class="ml-3 client_img" >
                        @endif

                    @else
                        <button id="register" class="btn-nav btn-bg text-decoration-none mr-3" data-toggle="modal"
                            data-target=".bd-example-modal">
                            Register
                        </button>

                        <button id="login" class="btn-nav btn-bg text-decoration-none" data-toggle="modal"
                            data-target=".bd-example-modal-sm">
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
    @php
        $categories = \App\Category::get();
    @endphp

    <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <p>Create new account</p>
                </div>

                {{-- model of register --}}
                <div class="modal-body">
                    {!! Form::open(['method' => 'post', 'route' => 'front.register', 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name"> First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}"
                                    placeholder="first name" class="form-control" required>
                            </div>

                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name"> Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}"
                                    class="form-control" placeholder="last name" required>
                            </div>

                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div> {{-- end of row --}}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                    placeholder="email" required>
                            </div>

                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}> Male
                                    </option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}> Female
                                    </option>
                                </select>
                            </div>
                        </div>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="tel" name="phone" {{ old('phone') }} class="form-control"
                                    placeholder="phone" required>
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            {{-- Password --}}
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password --}}

                    </div> {{-- end of row --}}

                    <div class="row">

                        <div class="col-md-12">
                            {{-- Password confirmation --}}
                            <div class="form-group">
                                <label>Re-Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="password confirmation" required>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password confirmation --}}
                    </div> {{-- end of row --}}


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    <option value="">Select Category</option>
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="follow_up_id">FollowUp</label>
                                <select class="form-control" name="follow_up_id" id="follow_up_id" required>
                                    <option value="">Select FollowUp</option>

                                </select>
                            </div>

                            @error('follow_up_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group modal-footer" style="display: flex; justify-content: center">
                        <button type="submit" class="btn-nav btn-bg text-decoration-none" style="width: 50%">Create New
                            Account</button>
                    </div>

                    {!! Form::close() !!}
                </div>


            </div>

        </div>
    </div>

    {{-- Model Register --}}

    {{-- model of login --}}
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Login</h1>
                </div>
                <div class="modal-body">
                    <form action="{{ route('front.login') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>

                        </div>

                        <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                required>
                        </div>

                        <div class="form-group modal-footer" style="display: flex; justify-content: center">
                            <button type="submit" class="btn-nav btn-bg text-decoration-none"
                                style="width: 50%">Login</button>
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
                        <div class="logo text-white" style="font-size: 20px !important;"><span class="highlight-color"
                                id="text-color-change">Fitness</span> Club
                            Management
                        </div>
                        <p class="light-medium-text text-mini line-height-medium my-3">
                            A gymnasium, also known as a gym, is a covered location for athletics. The word is derived
                            from
                            the ancient Greek gymnasium. They are commonly found in athletic and fitness centres, and as
                            activity and learning spaces in educational institutions. </p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2">
                        <ul class="nav flex-column my-2 my-lg-0">
                            <li class="nav-item text-color">
                                <h6 class="footer-heading" id="text-color-change">Our Services</h6>
                            </li>
                            <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                                <div class="line-mini" id="bg-color-change"></div>
                                <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Bodybuilding</a>
                            </li>
                            <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                                <div class="line-mini" id="bg-color-change"></div>
                                <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Gym Classes</a>
                            </li>
                            <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                                <div class="line-mini" id="bg-color-change"></div>
                                <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Heavyweight</a>
                            </li>
                            <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                                <div class="line-mini" id="bg-color-change"></div>
                                <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Running</a>
                            </li>
                            <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                                <div class="line-mini" id="bg-color-change"></div>
                                <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Fitness</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2">
                        <ul class="nav flex-column my-2 my-lg-0">
                            <li class="nav-item text-color">
                                <h6 class="footer-heading" id="text-color-change">Quick Links</h6>
                            </li>
                            <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                                <div class="line-mini" id="bg-color-change"></div>
                                <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Bodybuilding</a>
                            </li>
                            <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                                <div class="line-mini" id="bg-color-change"></div>
                                <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Gym Classes</a>
                            </li>
                            <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                                <div class="line-mini" id="bg-color-change"></div>
                                <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Heavyweight</a>
                            </li>
                            <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                                <div class="line-mini" id="bg-color-change"></div>
                                <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Running</a>
                            </li>
                            <li class="nav-item d-flex align-items-center link-footer" id="link-footer">
                                <div class="line-mini" id="bg-color-change"></div>
                                <a class="nav-link light-medium-text text-mini ml-2 px-0" href="#">Fitness</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <ul class="nav flex-column my-2 my-lg-0">
                            <li class="nav-item text-color">
                                <h6 class="footer-heading" id="text-color-change">Contact Us</h6>
                            </li>
                            <li class="nav-item">
                                <p class="light-medium-text text-mini line-height-mini mt-2">Feel free to contact us if
                                    you
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
    <script src="{{ asset('front') }}/js/jquery.min.js"></script>
    <script src="{{ asset('front') }}/js/popper.min.js"></script>
    <script src="{{ asset('front') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('front') }}/js/lightgallery.min.js"></script>
    <script src="{{ asset('front') }}/js/lightgallery-all.min.js"></script>
    <script src="{{ asset('front') }}/js/custom.js"></script>
    <script>
        var getAjax = function(val) {
            $.ajax({
                type: "get",
                url: "/get_follow_up",
                data: {
                    'category_id': val
                },
                success: function(response) {
                    $('#follow_up_id').html(response);
                }
            });
        }

        $(document).ready(function() {
            var category_id_val = $('#category_id option').filter(':selected').val();
            if (category_id_val != '') {
                var val = category_id_val;
                getAjax(val);
            }

            $('#category_id').on('change', function() {
                var val = this.value
                getAjax(val);
            });
        });
    </script>


    @yield('js')

</body>

<!-- Mirrored from demo.glowlogix.com.pk/gym/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Mar 2022 21:31:13 GMT -->

</html>
