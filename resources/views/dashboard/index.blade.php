@extends('layouts.dashboard.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
    </section>
    <section class="content container-fluid">

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{count($products)}}</h3>
              <p>Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('product.index')}}" class="small-box-footer">Show<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{count($categories)}}</h3>

              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('category.index')}}" class="small-box-footer"> Show <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{count($client)}}</h3>

              <p>Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('client.index')}}" class="small-box-footer">@lang('site.show') <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{count($serial_numbers)}}</h3>

              <p>Serial Numbers</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('serialNumber.index')}}" class="small-box-footer">@lang('site.show') <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>
  </div>
@endsection
