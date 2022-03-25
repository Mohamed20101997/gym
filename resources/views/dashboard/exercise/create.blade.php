@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1> Add Exercise </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-th"></i>Dashboard</a></li>
                <li><a href="{{ route('exercise.index') }}"> Exercise</a></li>
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

                    {!! Form::open(['method'=>'post', 'route'=>'exercise.store','enctype'=>'multipart/form-data']) !!}

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name"> Name</label><input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            </div>

                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name"> FollowUps </label>
                                <select class="form-control" name="follow_up_id">
                                    <option value="" {{old('follow_up_id') =='' ? 'selected' : '' }}>Choose followUp</option>

                                    @if(count($followUps) > 0)
                                        @foreach($followUps as $follow_up)
                                            <option value="{{$follow_up->id}}" {{old('follow_up_id') == $follow_up->id ? 'selected' : '' }}>({{$follow_up->category->name}})_{{$follow_up->name}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('follow_up_id')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Exercise Image</label>
                                <input type="file" name="photo" class="form-control">
                                @error("photo")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                    </div> {{-- end of row --}}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Exercise Description</label>
                                <textarea  name="description" rows="4" cols="50" id="editor2" class="form-control">{{old('description')}}</textarea>

                                @error('description')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of description --}}

                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add </button>
                    </div>

                    {!! Form::close() !!}
                </div>{{-- end of box body --}}
            </div> {{-- end of box --}}

        </section>
    </div>
@endsection
