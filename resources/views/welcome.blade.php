@extends('layouts.app')
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
                            src="{{asset('front')}}/images/about.png" alt="about" class="rounded-lg"></div>
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
                @if(count($classes) > 0)
                    @foreach($classes as $class)
                        <div class="col-sm-12 col-md-6 col-lg-3 mb-md-1 mb-lg-0">
                            <div
                                class="card border-0 text-center shadow mb-5 mb-md-4 mb-lg-0 mx-auto mx-md-0 mx-lg-auto ml-md-auto ml-lg-0">
                                <div class="shape-body">
                                    <img class="mx-auto icon-image mt-2"
                                         src="{{asset('front')}}/images/bodybuilding.png"
                                         alt="bodybuilding">
                                    <div class="polay-shape mx-auto" id="triangle-shape-color-change"></div>
                                </div>
                                <div class="card-body card-classes">
                                    <h3 class="card-title mini-heading dark-text">{{$class->name}}</h3>
                                    <div class="row">
                                        @if(count($class->followUp) > 0)
                                            @foreach($class->followUp as $followUp)
                                                <div class="col-md-6">
                                                    <a href="" class=" btn btn-outline-success">{{$followUp->name}}</a>
                                                </div>
                                            @endforeach
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
                                                          src="{{asset('front')}}/images/man.png" alt="man"></div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 offer px-0">
                <div class="offer-content text-white" id="bg-color-change">
                    <div class="shape-offer"></div>
                    <h2 class="offer-heading m-0">Get special training
                        this summer <span class="dark-text">50%</span> off pay now</h2></div>
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
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card border-0 post pb-0 mb-5 mb-md-4 mb-lg-0 mx-auto shadow shadow-sm">
                                <div class="post-img">
                                    <p class="bg-post-badge text-medium text-white text-center"
                                       id="bg-color-change">{{$product->price}}</p>
                                    <img src="{{image_path($product->image)}}" alt="bodybuilding" width="100%"
                                         height="200px"></div>
                                <div class="card-body py-0">
                                    <h3 class="card-title highlight-color post-heading"
                                        id="text-color-change">{{$product->name}}</h3>
                                    <p class="card-text post-author">
                                        {!!  strip_tags(Str::limit($product->description ,100,'...'))   !!}
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
