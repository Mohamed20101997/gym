@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1> Edit Follow Ups </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-th"></i>Dashboard</a></li>
                <li><a href="{{ route('followUp.index') }}"> Follow Ups</a></li>
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

                    {!! Form::open(['method'=>'PuT', 'route'=>['followUp.update', $followUp->id] ,'enctype'=>'multipart/form-data' ]) !!}

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name"> Name</label><input type="text" name="name" value="{{ old('name', $followUp->name) }}" class="form-control">
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
                                            <option value="{{$category->id}}" {{old('category_id',$followUp->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('category_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                        </div>


                        <div class="col-md-4" style="margin-top: 25px;">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit </button>
                            </div>
                        </div>


                    </div> {{-- end of row --}}

                    {!! Form::close() !!}
                </div>{{-- end of box body --}}
            </div> {{-- end of box --}}

        </section>
    </div>
@endsection
