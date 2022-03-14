@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1> Edit Meals </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-th"></i>Dashboard</a></li>
                <li><a href="{{ route('meal.index') }}"> Meals</a></li>
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

                    {!! Form::open(['method'=>'PuT', 'route'=>['meal.update', $meal->id] ,'enctype'=>'multipart/form-data' ]) !!}

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name"> Name</label><input type="text" name="name" value="{{ old('name', $meal->name) }}" class="form-control">
                            </div>

                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <select class="form-control" name="category_id">
                                    <option value="" {{old('category_id') =='' ? 'selected' : '' }}>Choose Category</option>

                                    @if(count($categories) > 0)
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{old('category_id',$meal->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('category_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                        </div>


                    </div> {{-- end of row --}}


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Meal Description</label>
                                <textarea  name="meal_description" rows="4" cols="50" id="editor" class="form-control">{{old('meal_description',$meal->meal_description)}}</textarea>

                                @error('meal_description')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of description --}}

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
