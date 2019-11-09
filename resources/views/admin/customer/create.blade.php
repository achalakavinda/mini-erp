@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Customers</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('customer') !!}" class="btn btn-app">
                <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a href="{!! url('customer/create') !!}" class="btn btn-app">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="#" id="ShowAdvance" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Show all Fields
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
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">New Company</h3>

                    @include('error.error')
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['action'=>'CustomerController@store','class'=>'form-horizontal','id'=>'Form']) !!}
                    @include('admin.customer._partial.createForm')
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
    <script>
        $('#ShowAdvance').on('click',function () {
            $('#AdvanceForm').fadeIn('slow');
            $('#ShowAdvance').hide();
        })
    </script>
@endsection