@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1> Add @lang('site.users') </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-th"></i>Dashboard</a></li>
                <li><a href="{{ route('serialNumber.index') }}"> Serial Number</a></li>
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

                    {!! Form::open(['method'=>'post', 'route'=>'serialNumber.store','enctype'=>'multipart/form-data']) !!}

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="serial_number"><i class="fa fa-key"> |</i> Serial_number</label>
                                <input type="text" name="serial_number" value="{{ old('serial_number') }}"  class="form-control">
                            </div>

                            @error('serial_number')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state"> Reserved </label> <br>
                                <input type="checkbox" id="check" name="state" value="1"  {{ old('state') == 1  ? 'checked' : '' }}>

                                @error('state')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror

                            </div>


                        </div>

                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add</button>
                    </div>

                    {!! Form::close() !!}
                </div>{{-- end of box body --}}
            </div> {{-- end of box --}}

        </section>
    </div>
@endsection
