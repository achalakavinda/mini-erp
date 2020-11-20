@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Brand</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/brand') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a href="{{ url('/ims/item') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-table"></i> Item
            </a>
            <a href="{{ url('/ims/invoice') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-table"></i> Invoice
            </a>
        </div>
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection


@section('main-content')
    <!-- main section -->
    @include('error.error')
    <!-- form start -->
    {!!Form::open(['action'=> ['Ims\BrandController@update',$Brand->id],'class'=>'form-horizontal','id'=>'Form','enctype'=>'multipart/form-data'])!!}
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <!-- /.box-header -->
                @include('admin.ims.brand._partials.updateForm')
            </div>
            <!-- /.box -->
        </div>
        @include('admin.ims.brand._partials.extentions.extUpdateForm')
    </div>
    <!-- /.row -->
{{--    {!! Form::close() !!}--}}
{{--    {!! Form::open(['method' => 'DELETE','route' => ['brand.destroy', $Brand->id]]) !!}--}}
{{--    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>--}}
{{--    {!! Form::close() !!}--}}
    <!-- /main section -->
@endsection
