@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">New Customer</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('customer') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a href="{!! url('customer/create') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="#" id="ShowAdvance" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Show all Fields
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection

@section('main-content')
    <div class="row">
        @include('error.error')
        {!! Form::open(['action'=>'CustomerController@store','class'=>'form-horizontal','id'=>'Form']) !!}
        @include('admin.customer._partial.createFormBasic')
        {!! Form::close() !!}
    </div>
    <!-- /.row -->
@endsection


@section('js')
    @include('error.swal')
@endsection
