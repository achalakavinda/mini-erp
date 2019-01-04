@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Customers</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/customer') }}" class="btn btn-success">Customer</a>
            <a href="{{ url('/customer/create') }}" class="btn btn-success">New</a>
            <button id="ShowAdvance" type="button" class=" btn btn-light">Show All Fields <i class="fa fa-list"></i></button>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
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