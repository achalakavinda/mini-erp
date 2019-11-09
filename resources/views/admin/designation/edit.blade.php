@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Designation Type</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a href="{!! url('designation') !!}" class="btn btn-app">
                <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('/designation') !!}/{!! $Designation->id !!}" class="btn btn-app">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
        </div>
        <!-- /.box-body -->
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
                    <h3 class="box-title">{{ $Designation->designationType }}</h3>
                    @include('error.error')
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::model($Designation, ['method' => 'PATCH', 'action' => ['DesignationController@update', $Designation->id],'class'=>'form-horizontal']) !!}
                @include('admin.designation._partials.updateForm')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('js')
    @include('error.swal')
@endsection