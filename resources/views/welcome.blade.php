@extends('layouts.app')


@section('ul')
<ul class="navbar-nav nav mx-auto" id="navbar">
    <li class="nav-item"><a class="nav-link" id="hover-nav-menu" href="#home">Home</a>
    </li>
    <li class="nav-item ml-lg-4"><a class="nav-link" id="hover-nav-menu2"
            href="#about">About</a>
    </li>
    <li class="nav-item ml-lg-4"><a class="nav-link" id="hover-nav-menu3"
            href="#classes">Classes</a>
    </li>
    <li class="nav-item ml-lg-4"><a class="nav-link" id="hover-nav-menu7"
            href="#blog">Products</a></li>

</ul>
@endsection

@section('slider')
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
                    <div class="bg-hero2">
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
            <ul class="carousel-indicators d-flex align-items-center">
                <li data-target="#carouselExampleFade" data-slide-to="0"
                    class="border-0 rounded-circle carousel-style active"></li>
                <li data-target="#carouselExampleFade" data-slide-to="1" class="border-0 rounded-circle carousel-style">
                </li>
            </ul>
            <!-- END SLIDE CHANGE -->
        </div>
    </div>
    <!-- END MAIN SLIDER -->
@endsection


@section('content')
    <!-- BEGIN  ABOUT SECTION  -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="section-top text-center mb-4 mb-md-5">
                <h2 class="medium-heading dark-text mb-1">fitness club management</h2>
                <div class="line-medium rounded-lg my-2 mx-auto" id="bg-color-change"></div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="about-image rounded-lg" id="border-color-change"><img
                            src="{{ asset('front') }}/images/about.png" alt="about" class="rounded-lg"></div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="content-area mt-lg-0">
                        <h3 class="small-heading dark-text mb-3">About <span class="highlight-color text-thickness"
                                id="text-color-change">fitness club management</span>
                        </h3>
                        <p class="text-mini light-text">A gymnasium, also known as a gym, is a covered location for
                            athletics. The word is derived from the ancient Greek gymnasium. They are commonly found in
                            athletic and fitness centres, and as activity and learning spaces in educational
                            institutions.
                            "Gym" is also slang for "fitness centre", which is often an area for indoor recreation. A
                            gym
                            may be open air as well. A gym is a place with a number of equipments and machines used by
                            the
                            people to do exercises.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end section #about -->
    <!-- END  ABOUT SECTION  -->

    <!--  BEGIN  CLASSES SECTION  -->
    <section id="classes" class="classes-section light-bg">
        <div class="container">
            <div class="section-top text-center mb-5">
                <h2 class="medium-heading dark-text mb-1">Gym Classes</h2>
                <div class="line-medium rounded-lg my-2 mx-auto" id="bg-color-change"></div>
            </div>
            <div class="row">
                @if (count($classes) > 0)
                    @foreach ($classes as $class)
                        <div class="col-sm-12 col-md-6 col-lg-3 mb-md-1 mb-lg-0" style="margin: 0 auto">
                            <div
                                class="card border-0 text-center shadow mb-5 mb-md-4 mb-lg-0 mx-auto mx-md-0 mx-lg-auto ml-md-auto ml-lg-0">
                                <div class="shape-body">
                                    <img class="mx-auto icon-image mt-2" src="{{ asset('front') }}/images/bodybuilding.png"
                                        alt="bodybuilding">
                                    <div class="polay-shape mx-auto" id="triangle-shape-color-change"></div>
                                </div>
                                <div class="card-body card-classes">
                                    <h3 class="card-title mini-heading dark-text">{{ $class->name }}</h3>
                                    <div class="row">
                                        @if (count($class->followUp) > 0)
                                            @if (auth()->guard('client')->check())
                                                @foreach ($class->followUp as $followUp)
                                                    <div class="col-md-6">
                                                        @if (auth()->guard('client')->user()->checked == 1)
                                                            <a href="{{ route('front.exercise', [$followUp->id, $class->id]) }}"
                                                                class="btn btn-outline-success">{{ $followUp->name }}
                                                            </a>
                                                        @else
                                                            <button
                                                                data-url="{{ route('front.exercise', [$followUp->id, $class->id]) }}"
                                                                class="btn btn-outline-success serial_number">{{ $followUp->name }}
                                                            </button>
                                                        @endif

                                                    </div>
                                                @endforeach
                                            @else
                                                @foreach ($class->followUp as $followUp)
                                                    <div class="col-md-6">
                                                        <button id="login" class="btn btn-outline-success"
                                                            data-toggle="modal" data-target=".bd-example-modal-sm">
                                                            {{ $followUp->name }}
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
    </section>
    <!-- end section #classes -->
    <!--  END  CLASSES SECTION  -->

    <!--  BEGIN OFFER SECTION  -->
    <section id="offer" class="offer-section">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-6 px-0 d-flex align-items-center">
                <div class="boybuilder-img bg-white"><img class="mx-auto pt-5 pt-md-0 d-flex"
                        src="{{ asset('front') }}/images/man.png" alt="man"></div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 offer px-0">
                <div class="offer-content text-white" id="bg-color-change">
                    <div class="shape-offer"></div>
                    <h2 class="offer-heading m-0">Get special training
                        this summer <span class="dark-text">50%</span> off pay now</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- end section #offer -->


    <!--  BEGIN BLOG SECTION -->
    <section id="blog" class="posts-section">
        <div class="container">
            <div class="section-top text-center mb-5">
                <h2 class="medium-heading dark-text mb-1">Gym Products</h2>
                <div class="line-medium rounded-lg my-2 mx-auto" id="bg-color-change"></div>
            </div>
            <div class="row">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card border-0 post pb-0 mb-5 mb-md-4 mb-lg-0 mx-auto shadow shadow-sm">
                                <div class="post-img">
                                    <p class="bg-post-badge text-medium text-white text-center" id="bg-color-change">
                                        {{ $product->price }}</p>
                                    <img src="{{ image_path($product->image) }}" alt="bodybuilding" width="100%"
                                        height="200px">
                                </div>
                                <div class="card-body py-0">
                                    <h3 class="card-title highlight-color post-heading" id="text-color-change">
                                        {{ $product->name }}</h3>
                                    <p class="card-text post-author">
                                        {!! strip_tags(Str::limit($product->description, 100, '...')) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- end section #blog -->
    <!--  END BLOG SECTION -->

    <!-- END  SUBSCRIBE -->
@endsection

@section('js')
    <script>
        $(document).on('click', '.serial_number', async function(e) {

            var url = $(this).data('url');

            e.preventDefault();

            const ipAPI = '//api.ipify.org?format=json'

            const inputValue = fetch(ipAPI)
                .then(response => response.json())
                .then(data => data.ip)

            const {
                value: ipAddress
            } = await Swal.fire({
                title: 'Enter your Serial Number',
                input: 'text',
                inputLabel: 'your Serial Number',
                inputValue: inputValue,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to write something!'
                    }
                }
            })

            if (ipAddress) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                jQuery.ajax({
                    url: "{{ url('/check') }}",
                    method: 'get',
                    data: {
                        serial_number: ipAddress
                    },
                    success: function(result) {
                        if (result == 'ok') {
                            window.location.href = url;
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: "Serial Number not correct",
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    }
                });
            }

        })
    </script>
@endsection
