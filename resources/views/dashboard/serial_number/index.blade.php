@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1> Serial Numbers </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-th"></i>Dashboard</a></li>
                <li class="active">Serial Numbers</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title" style="margin-bottom:15px"><i class="fa fa-users"></i> Serial Numbers
                        <small> {{ $serialNumbers->total() }}</small></h3>
                    {!! Form::open(['route'=>'serialNumber.index','method'=>'get']) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder='Search'
                                   value="{{ request()->search }}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
                            <a href="{{ route('serialNumber.create') }}" class="btn btn-success"><i
                                    class="fa fa-plus-circle"></i> Add</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div> {{-- end of box header  --}}

                <div class="box-body">
                    @if ($serialNumbers->count() > 0)
                        <div class="table-responsive ">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Serial Numbers</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($serialNumbers as $index=>$number)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td> {{ $number->serial_number }} </td>

                                        <td>

                                            <a href="{{ route('serialNumber.edit',$number->id) }}"
                                               class="btn btn-primary btn-sm"><i
                                                    class="fa fa-edit"></i> Edit </a>

                                            {!! Form::open(['method'=>'delete','route'=>['serialNumber.destroy', $number->id],'style'=>'display:inline-block']) !!}

                                            <button type="submit" class="btn btn-danger btn-sm delete">
                                                <i class="fa fa-trash "></i> Delete
                                            </button>

                                            {!! Form::close() !!}


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table> {{-- end of table --}}
                        </div>
                        {{ $serialNumbers->appends(request()->query())->links() }}
                    @else
                        <h3 class="alert alert-primary text-center"><i class="fa fa-warning"></i> No Data found</h3>
                    @endif
                </div> {{-- end of box body  --}}

            </div> {{-- end of box  --}}

        </section>
    </div>
@endsection
