@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Item</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/item') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a href="{{ url('/ims/item/create') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{{ url('/ims/brand') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-table"></i> Brand
            </a>
            <a href="{{ url('/ims/invoice') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-table"></i> Invoice
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /main header section -->
@endsection

@section('main-content')
    <!-- main section -->
    <div class="row">

        {!! Form::open(['action'=>'Ims\ItemController@store','class'=>'form-horizontal','id'=>'Form']) !!}
        @include('error.error')
        @include('admin.ims.item._partials.createForm')
        {!! Form::close() !!}
    </div>
    <!-- /.row -->
    <!-- /main section -->
@endsection
