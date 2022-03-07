@extends('layouts.dashboard.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1> @lang('site.add') @lang('site.users') </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-th"></i>@lang('site.dashboard')</a></li>
        <li><a href="{{ route('dashboard.users.index') }}"> @lang('site.users') </a></li>
        <li class="active">@lang('site.add')</li>
      </ol>
    </section>
    <section class="content container-fluid">
      <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title"> <i class="fa fa-user-plus"></i> @lang('site.add')</h3>
        </div> {{-- end of box header --}}
        <div class="box-body">

          @include('partials._errors')
        
          {!! Form::open(['method'=>'post', 'route'=>'dashboard.users.store','enctype'=>'multipart/form-data']) !!}

            <div class="form-group">
                <label for="first_name"><i class="fa fa-user-circle-o"> |</i> @lang('site.firstname')</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control">
            </div> 
            <div class="form-group">
                <label for="last_name"><i class="fa fa-user-circle-o"> |</i> @lang('site.lastname')</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control">
            </div> 
            <div class="form-group">
                <label for="email"><i class="fa fa-envelope"> |</i> @lang('site.email')</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            </div> 
            <div class="form-group">
                <label for="image"><i class="fa fa-file-image-o"> |</i> @lang('site.image')</label>
                <input type="file" name="image" class="form-control image">
            </div> 
            <div class="form-group">
                <img src="{{ asset('uploads/user_images/default.png') }}" alt="user image" class="img-thumbnail image-preview" width="100px">
            </div> 
            <div class="form-group">
                <label for="password"><i class="fa fa-key"> |</i> @lang('site.password')</label>
                <input type="password" name="password" class="form-control">
            </div> 
            <div class="form-group">
                <label for="password_confirmation"><i class="fa fa-user-secret"> |</i> @lang('site.password_confirmation')</label>
                <input type="password" name="password_confirmation" class="form-control">
          </div>
            <div class="form-group">
                <label><i class="fa fa-address-book"> |</i> @lang('site.permissions')</label>
                <div class="nav-tabs-custom">

                  @php
                      $models = ['users' ,'categories' ,'products','clients','orders'] ;
                      $maps = ['create' ,'read' ,'update','delete']
                  @endphp
          
                    <ul class="nav nav-tabs">
                      @foreach ($models as $index=>$model)
                          
                      <li class="{{ $index==0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.'.$model)</a></li>

                      @endforeach
      
                    </ul>
                    <div class="tab-content">
                      @foreach ($models as $index=>$model)
                        <div class="tab-pane {{ $index==0 ? 'active' : '' }}" id="{{ $model }}">
                          @foreach ($maps as $indexmap=>$map)
                            <input type="checkbox" id="{{ $model  . $indexmap }}" name="permissions[]" value="{{ $map . '_' . $model }}">
                            <label for="{{ $model .$indexmap }}">@lang('site.' . $map)</label>
                          @endforeach
              
                        </div>
                      @endforeach
                    </div>
                  </div>
              </div>

            <div class="form-group">
               <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> @lang('site.add')</button>
            </div> 

          {!! Form::close() !!}
        </div>{{-- end of box body --}}
      </div> {{-- end of box --}}

    </section>
  </div>
@endsection