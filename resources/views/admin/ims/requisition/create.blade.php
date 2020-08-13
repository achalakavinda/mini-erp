@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Dashboard / Requisition</h3>
    </div>
    <div class="box-body">
        <a href="{{ url('ims/purchase-requisition') }}" class="btn btn-success"> Requisition <i
                class="fa fa-backward"></i> </a>
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

            {!!
            Form::open(['action'=>'Ims\PurchaseRequisitionController@store','class'=>'form-horizontal','id'=>'Form'])
            !!}
            @include('error.error')
            @include('admin.ims.requisition._partials.createForm')
            {!! Form::close() !!}
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->

@endsection
<!-- /main section -->