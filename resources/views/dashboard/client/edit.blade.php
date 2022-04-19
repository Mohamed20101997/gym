@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1> Edit Client </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-th"></i>Dashboard</a></li>
                <li><a href="{{ route('client.index') }}"> Client</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-edit"></i> Edit</h3>
                </div> {{-- end of box header --}}
                <div class="box-body">

                    @include('partials._errors')

                    {!! Form::open(['method'=>'PuT', 'route'=>['client.update', $client->id] ,'enctype'=>'multipart/form-data' ]) !!}

                    <input type="hidden" value="{{ $client->follow_up_id }}" id="follow_data">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="first_name"> First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name',$client->first_name) }}"
                                       class="form-control">
                            </div>

                            @error('first_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="last_name"> Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name',$client->last_name) }}" class="form-control">
                            </div>

                            @error('last_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ old('email',$client->email) }}" class="form-control">
                            </div>

                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender">
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
                                <input type="tel" name="phone" value="{{ old('phone',$client->phone) }}" class="form-control">
                                @error('phone')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                    </div> {{-- end of row --}}


                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>image</label>
                                <input type="file" name="image" class="form-control">
                                @error("image")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Current Weight( KG )</label>
                                <input type="number" min="1" name="current_weight" value="{{ old('current_weight',$client->current_weight) }}" class="form-control">
                                @error("current_weight")
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Height( cm )</label>
                                <input type="number" min="1" name="height" value="{{ old('height',$client->height) }}"  class="form-control">
                                @error("height")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
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
                                <select class="form-control" name="category_id" id="category_id">
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
                                <select class="form-control" name="follow_up_id" id="follow_up_id">
                                    <option value="">Select FollowUp</option>

                                </select>
                            </div>

                            @error('follow_up_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit </button>
                    </div>

                    {!! Form::close() !!}
                </div>{{-- end of box body --}}
            </div> {{-- end of box --}}

        </section>
    </div>
@endsection
@push('scripts')
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
                    $('#follow_up_id').html(response);
                }
            });
        }

        $(document).ready(function() {
            var category_id_val = $('#category_id option').filter(':selected').val();

            if (category_id_val != '') {
                var val = category_id_val;
                var follow = $('#follow_data').val();
                getAjax(val,follow);
            }

            $('#category_id').on('change', function() {
                var val = this.value
                getAjax(val);
            });
        });
    </script>
@endpush
