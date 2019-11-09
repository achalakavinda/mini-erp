@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Category/Brand</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/brand') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a href="{{ url('/ims/brand/create') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{{ url('/ims/item') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-table"></i> Item
            </a>
            <a href="{{ url('/ims/invoice') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-table"></i> Invoice
            </a>
        </div>
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->

                {!! Form::open(['action'=>'Ims\BrandController@store','class'=>'form-horizontal','id'=>'Form']) !!}
                @include('error.error')
                @include('admin.ims.brand._partials.createForm')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->