@extends('layouts.dashboard.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1> @lang('site.users') </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-th"></i>@lang('site.dashboard')</a></li>
        <li class="active">@lang('site.users')</li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom:15px"><i class="fa fa-users"></i> @lang('site.users') <small> {{ $users->total() }}</small></h3> 
                {!! Form::open(['route'=>'dashboard.users.index','method'=>'get']) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control"  placeholder = @lang('site.search')  value="{{ request()->search }}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                            @if (auth()->user()->hasPermission('create_users'))
                                <a href="{{ route('dashboard.users.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> @lang('site.add')</a>    
                            @else
                                <a href="#" class="btn btn-success disabled"><i class="fa fa-plus-circle"></i> @lang('site.add')</a> 
                            @endif
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>  {{-- end of box header  --}}
            <div class="box-body">
                @if ($users->count() > 0)
                <div class="table-responsive ">
                    <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.firstname')</th>
                                    <th>@lang('site.lastname')</th>
                                    <th>@lang('site.email')</th>
                                    <th>@lang('site.image')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index=>$user)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td> {{ $user->first_name }} </td>
                                        <td> {{ $user->last_name }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td> <img src="{{ $user->image_path }}" alt='user image' class="image-responsive img-thumbnail" width="50px" ></td>
                                        <td>
                                            @if (auth()->user()->hasPermission('update_users'))
                                                <a href="{{ route('dashboard.users.edit',$user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            @else
                                                <a href="#" class="btn btn-primary btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('delete_users'))
                                                {!! Form::open(['method'=>'delete','route'=>['dashboard.users.destroy', $user->id],'style'=>'display:inline-block']) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm delete" >
                                                            <i class="fa fa-trash "></i> @lang('site.delete')
                                                    </button>
                                                {!! Form::close() !!}
                                            @else
                                                <button type="submit" class="btn btn-danger btn-sm delete disabled" >
                                                        <i class="fa fa-trash "></i> @lang('site.delete')
                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table> {{-- end of table --}}
                </div>
                    {{ $users->appends(request()->query())->links() }}
                @else
                    <h3 class="alert alert-info"><i class="fa fa-warning"></i> @lang('site.no_data_found')</h3>
                @endif
            </div>  {{-- end of box body  --}}

        </div>  {{-- end of box  --}}
        
    </section>
  </div>
@endsection