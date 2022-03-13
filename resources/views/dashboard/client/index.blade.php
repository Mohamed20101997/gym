@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1> Clients </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-th"></i>Dashboard</a></li>
                <li class="active">Clients</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title" style="margin-bottom:15px"><i class="fa fa-users"></i> Clients
                        <small> {{ $clients->total() }}</small></h3>
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder='Search' value="{{ request()->search }}">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                <a href="{{ route('client.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add</a>
                            </div>
                        </div>
                    </form>
                </div> {{-- end of box header  --}}

                <div class="box-body">
                    @if ($clients->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Current Weight</th>
                                    <th>Height</th>
                                    <th>Age</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Date_Of_Birth</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($clients as $index=>$client)
                                    <tr>
                                        <td>{{ $index+1 }}</td>

                                        <td>
                                            @if(!empty($client->image))
                                                <img src="{{image_path($client->image)}}" width="60px" class="img-thumbnail">
                                            @else
                                                <img src="{{image_path('default.png')}}" width="60px" class="img-thumbnail">
                                            @endif
                                        </td>

                                        <td> {{ $client->first_name }} </td>
                                        <td> {{ $client->last_name }} </td>
                                        <td> {{ $client->email }} </td>
                                        <td> {{ $client->current_weight }} </td>
                                        <td> {{ $client->height }} </td>
                                        <td><span class="badge badge-danger p-3" style="background: #3c8dbc"> {{ $client->age }} </span></td>
                                        <td> {{ $client->city }} </td>
                                        <td> {{ $client->country }} </td>
                                        <td> {{ $client->phone }} </td>
                                        <td><span class="badge badge-danger p-3" style="background: #3c8dbc"> {{ $client->gender }} </span> </td>
                                        <td> {{ $client->date_of_birth }} </td>


                                        <td>

                                            <a href="{{ route('client.edit',$client->id) }}"
                                               class="btn btn-primary btn-sm"><i
                                                    class="fa fa-edit"></i>  </a>

                                            {!! Form::open(['method'=>'delete','route'=>['client.destroy', $client->id],'style'=>'display:inline-block']) !!}

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
                        {{ $clients->appends(request()->query())->links() }}
                    @else
                        <h3 class="alert alert-primary text-center"><i class="fa fa-warning"></i> No Data found</h3>
                    @endif
                </div> {{-- end of box body  --}}

            </div> {{-- end of box  --}}

        </section>
    </div>
@endsection
