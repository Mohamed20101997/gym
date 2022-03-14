@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1> Exercises </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-th"></i>Dashboard</a></li>
                <li class="active">Exercises </li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title" style="margin-bottom:15px"><i class="fa fa-users"></i> Exercises
                        <small> {{ $exercises->total() }}</small></h3>
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder='Search' value="{{ request()->search }}">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                <a href="{{ route('exercise.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add</a>
                            </div>
                        </div>
                    </form>
                </div> {{-- end of box header  --}}

                <div class="box-body">
                    @if ($exercises->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Follow Up</th>
                                    <th>Description</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($exercises as $index=>$exercise)
                                    <tr>
                                        <td>{{ $index+1 }}</td>

                                        <td>{{ $exercise->name }}</td>
                                        <td><span class="badge badge-danger p-3" style="background: #3c8dbc"> {{ $exercise->follow_up->name }} </span></td>
                                        <td>{!!  strip_tags(Str::limit($exercise->description ,100,'...'))   !!}</td>

                                        <td>
                                            <a href="{{ route('exercise.edit',$exercise->id) }}"
                                               class="btn btn-primary btn-sm"><i
                                                    class="fa fa-edit"></i>  </a>

                                            {!! Form::open(['method'=>'delete','route'=>['exercise.destroy', $exercise->id],'style'=>'display:inline-block']) !!}

                                            <button type="submit" class="btn btn-danger btn-sm delete">
                                                <i class="fa fa-trash "></i>
                                            </button>

                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table> {{-- end of table --}}
                        </div>
                        {{ $exercises->appends(request()->query())->links() }}
                    @else
                        <h3 class="alert alert-primary text-center"><i class="fa fa-warning"></i> No Data found</h3>
                    @endif
                </div> {{-- end of box body  --}}

            </div> {{-- end of box  --}}

        </section>
    </div>
@endsection
