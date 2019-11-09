@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard / Models / Create</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/customer/create') }}" class="btn btn-success"> Customer <i class="fa fa-plus"></i> </a>
            <a href="{{ url('/brand/create') }}" class="btn btn-success"> Brand <i class="fa fa-plus"></i> </a>
            <a href="{{ url('/model/create') }}" class="btn btn-success"> Model <i class="fa fa-plus"></i> </a>
            <a href="{{ url('/invoice/create') }}" class="btn btn-success"> Invoice <i class="fa fa-plus"></i> </a>
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

                </div>
                <!-- /.box-header -->
                <!-- form start -->

                {!! Form::open(['action'=>'Ims\StockController@store','class'=>'form-horizontal','id'=>'Form']) !!}
                @include('error.error')
                @include('admin.ims.stock._partials.createForm')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->
