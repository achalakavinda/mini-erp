@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard / Requisition</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/invoice') }}" class="btn btn-success"> Invoice <i class="fa fa-backward"></i> </a>
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
                {!! Form::model($Invoice, ['method' => 'PATCH', 'action' => ['InvoiceController@update', $Invoice->id],'class'=>'form-horizontal']) !!}
                @include('error.error')
                @include('admin.invoice._partials.showForm')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->