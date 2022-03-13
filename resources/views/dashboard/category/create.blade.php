@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1> Add Category </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-th"></i>Dashboard</a></li>
                <li><a href="{{ route('category.index') }}"> Category</a></li>
                <li class="active">Add</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user-plus"></i> Add</h3>
                </div> {{-- end of box header --}}
                <div class="box-body">

                    @include('partials._errors')

                    {!! Form::open(['method'=>'post', 'route'=>'category.store','enctype'=>'multipart/form-data']) !!}

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name"> Name</label><input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            </div>

                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-md-4" style="margin-top: 25px;">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add </button>
                            </div>
                        </div>


                    </div> {{-- end of row --}}




                    {!! Form::close() !!}
                </div>{{-- end of box body --}}
            </div> {{-- end of box --}}

        </section>
    </div>
@endsection
