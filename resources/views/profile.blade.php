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

    .carousel-inner{
    height: 200px;
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
    <section>
        <div class="container mb-5">
            <h1 class="page-header" id="exe-header">{{ $client->first_name }} {{ $client->last_name }}</h1>
            <div class="row">
                <div class="col-md-8">

                        {!! Form::open(['method'=>'PuT', 'route'=>['front.updateProfile', $client->id] ,'enctype'=>'multipart/form-data' ]) !!}
                        <input type="hidden" value="{{ $client->follow_up_id }}" id="follow_data_2">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="first_name"> First Name</label>
                                    <input type="text" name="first_name" value="{{ old('first_name',$client->first_name) }}"
                                           class="form-control" required>
                                </div>

                                @error('first_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="last_name"> Last Name</label>
                                    <input type="text" name="last_name" value="{{ old('last_name',$client->last_name) }}" class="form-control" required>
                                </div>

                                @error('last_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ old('email',$client->email) }}" class="form-control" required>
                                </div>

                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" name="gender" required>
                                        <option value="male" {{ old('gender',$client->gender) == 'male' ? 'selected' : '' }}> Male</option>
                                        <option value="female" {{ old('gender',$client->gender) == 'female' ? 'selected' : '' }}> Female
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
                                           name="password" class="form-control">
                                    @error('password')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>{{-- end of col Password --}}

                            <div class="col-md-4">
                                {{-- Password confirmation --}}
                                <div class="form-group">
                                    <label>Re-Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                    @error('password')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>{{-- end of col Password confirmation --}}


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="tel" name="phone" value="{{ old('phone',$client->phone) }}" class="form-control" required>
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
                                    <input type="number" min="1" name="current_weight" value="{{ old('current_weight',$client->current_weight) }}" class="form-control">
                                    @error("current_weight")
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Height( cm )</label>
                                    <input type="number" min="1" name="height" value="{{ old('height',$client->height) }}"  class="form-control">
                                    @error("height")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ِِAge</label>
                                    <input type="number" min="10" name="age"  value="{{ old('age',$client->age) }}"  class="form-control">
                                    @error("age")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>	Date Of Birth</label>
                                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth',$client->date_of_birth) }}"  class="form-control">
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
                                    <input type="text" name="country"  value="{{ old('country',$client->country) }}"  class="form-control">
                                    @error('country')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" value="{{ old('city',$client->city) }}"   class="form-control">
                                    @error('city')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address"  value="{{ old('address',$client->address) }}"  class="form-control">
                                    @error('address')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                        </div> {{-- end of row --}}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control" name="category_id" id="category_id_2" required>
                                        <option value="">Select Category</option>
                                        @if (count($categories) > 0)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $client->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="follow_up_id">FollowUp</label>
                                    <select class="form-control" name="follow_up_id" id="follow_up_id_2" required>
                                        <option value="">Select FollowUp</option>

                                    </select>
                                </div>

                                @error('follow_up_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>image</label>
                                    <input type="file" name="image" class="form-control">
                                    @error("image")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit </button>
                        </div>

                        {!! Form::close() !!}

                </div>
                <div class="col-md-4">
                    @if (!empty($client->image))
                        <img src="{{ image_path($client->image) }}" class="thumbnail" id="img-food">
                    @else
                        <img src="{{ image_path('default.png') }}" class="thumbnail" id="img-food">
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
   <script>
        var getAjax = function(val , follow = null) {
            $.ajax({
                type: "get",
                url: "/dashboard/get_follow_up",
                data: {
                    'category_id': val,
                    'follow_up_id': follow,
                },
                success: function(response) {
                    $('#follow_up_id_2').html(response);
                }
            });
        }

        $(document).ready(function() {
            var category_id_val = $('#category_id_2 option').filter(':selected').val();
            if (category_id_val != '') {
                var val = category_id_val;
                var follow = $('#follow_data_2').val();

                getAjax(val,follow);
            }

            $('#category_id_2').on('change', function() {

                var val = this.value
                getAjax(val);
            });
        });
    </script>
@endsection

