@extends('layouts.app')

@section('ul')
<ul class="navbar-nav nav mx-auto" id="navbar">
    <li class="nav-item"><a class="nav-link" id="hover-nav-menu" href="{{ url('/') }}#home">Home</a></li>
    <li class="nav-item ml-lg-4"><a class="nav-link" id="hover-nav-menu2" href="{{ url('/') }}#about">About</a></li>
    <li class="nav-item ml-lg-4"><a class="nav-link" id="hover-nav-menu3" href="{{ url('/') }}#classes">Classes</a></li>
    <li class="nav-item ml-lg-4"><a class="nav-link" id="hover-nav-menu7" href="{{ url('/') }}#blog">Products</a></li>
</ul>
@endsection

@section('css')

    #exe-header{
    padding: 5px;
    background: #81b21b;
    text-align: center;
    font-size: 31px;
    border: 1px solid #DDD;
    color: #DDD;
    font-weight: bold;
    margin-bottom: 48px;
    margin-top: 33px;
    }

    #btn_coll{
    padding: 0;
    color: #FFF;
    font-size: 20px;
    font-weight: bold;
    }

    #img-food{
    height: 311px;
    float: right;
    border: 5px solid #81b21b;
    border-radius: 20px;
    }
    }
@endsection

@section('slider')
    <!-- BEGIN MAIN SLIDER -->
    <div id="home">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel slide">
            <!-- Carosel inner -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="bg-hero2">
                        <div class="background-overlay">
                            <div class="container">
                                <div class="content-header text-center">
                                    <div class="line-thick rounded-lg mx-auto" id="bg-color-change"></div>
                                    <h1 class="main-heading animated fadeInRight">
                                        <span class="highlight-color"
                                              id="text-color-change">{{$category->name}}</span> {{$followUp->name}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END MAIN SLIDER -->
@endsection


@section('content')
    <!-- BEGIN  ABOUT SECTION  -->
    <section id="about">
        <div class="container">
            <h1 class="page-header" id="exe-header"> Exercises</h1>
            <div class="row">
                @if(count($exercise) > 0)
                @foreach($exercise as $exe)
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                           data-title="{{$exe->name}}" data-description="{{$exe->description}}"
                           data-image="{{image_path($exe->photo)}}" data-target="#image-gallery">

                            <img class="img-responsive" src="{{image_path($exe->photo)}}" alt="Short alt text"
                                 height="367px">
                        </a>
                    </div>
                @endforeach
                @else
                    <p class="alert alert-warning" style="width: 100%;text-align: center;">No Exercises Found</p>
                @endif
                <div class="modal fade bd-example-modal-lg" id="image-gallery" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-content">
                                <div class="modal-header">

                                    <h3 class="modal-title" id="image-gallery-title"></h3>
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span><span class="sr-only">Close</span></button>

                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img id="image-gallery-image" class="img-responsive" src="" height="200px">
                                        </div>
                                        <div class="col-md-8">
                                            <p id="image-description"></p>
                                        </div>
                                    </div>

                                </div>


                                <div class="modal-footer">
                                    <h4 id="image-gallery-caption"></h4>
                                    <button type="button" class="modal-control previous btn btn-success"
                                            id="show-previous-image">
                                        Previous
                                    </button>
                                    <button type="button" class="modal-control next btn btn-success"
                                            id="show-next-image">Next
                                    </button>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @if(count($meals) > 0)
    <!-- BEGIN  ABOUT SECTION  -->
    <section id="about" class="about-section">
        <div class="container">
            <h1 class="page-header" id="exe-header"> Meals</h1>
            <div class="row">
                <div class="col-md-6">
                    <div id="accordion">
                        @foreach($meals as $key => $meal)
                            <div class="card">
                                <div class="card-header" id="headingOne_{{$key}}" style="background: #6c757d;">
                                    <h5 class="mb-0" style="color: #FFF">
                                        <button id="btn_coll" class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseOne_{{$key}}"
                                        " aria-expanded="true" aria-controls="collapseOne_{{$key}}">
                                        {{$meal->name}}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne_{{$key}}" class="collapse" aria-labelledby="headingOne_{{$key}}"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        {!! $meal->meal_description !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('front/img/food.PNG')}}" class="thumbnail" id="img-food">
                </div>
            </div>
        </div>
    </section>

    @endif
@endsection

@section('js')
    <script>
        $(document).ready(function () {

            loadGallery(true, 'a.thumbnail');

            //This function disables buttons when needed
            function disableButtons(counter_max, counter_current) {
                $('#show-previous-image, #show-next-image').show();
                if (counter_max == counter_current) {
                    $('#show-next-image').hide();
                } else if (counter_current == 1) {
                    $('#show-previous-image').hide();
                }
            }

            /**
             *
             * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
             * @param setClickAttr  Sets the attribute for the click handler.
             */

            function loadGallery(setIDs, setClickAttr) {
                var current_image,
                    selector,
                    counter = 0;

                $('#show-next-image, #show-previous-image').click(function () {
                    if ($(this).attr('id') == 'show-previous-image') {
                        current_image--;
                    } else {
                        current_image++;
                    }

                    selector = $('[data-image-id="' + current_image + '"]');
                    updateGallery(selector);
                });

                function updateGallery(selector) {
                    var $sel = selector;
                    current_image = $sel.data('image-id');
                    $('#image-gallery-caption').text($sel.data('caption'));

                    $('#image-gallery-title').text($sel.data('title'));

                    $('#image-description').html($sel.data('description'));

                    $('#image-gallery-image').attr('src', $sel.data('image'));
                    disableButtons(counter, $sel.data('image-id'));
                }

                if (setIDs == true) {
                    $('[data-image-id]').each(function () {
                        counter++;
                        $(this).attr('data-image-id', counter);
                    });
                }
                $(setClickAttr).on('click', function () {
                    updateGallery($(this));
                });
            }
        });
    </script>

@endsection
