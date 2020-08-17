@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Company Purchase Order</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{{ url('/company-purchase-order/item') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-table"></i> Company Purchase Order
        </a>

        <a href="{{ url('/ims/company-purchase-order/create') }}" class="btn btn-menu">
            <i class="main-action-btn-danger fa fa-plus"></i> Refresh
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

            </div>
            <!-- /.box-header -->
            <!-- form start -->

            {!!
            Form::open(['action'=>'Ims\CompanyPurchaseOrderController@store','class'=>'form-horizontal','id'=>'Form','ng-app'=>'xApp','ng-controller'=>'xAppCtrl'])
            !!}
            @include('error.error')
            @include('admin.ims.company-purchase-order._partials.createForm')
            {!! Form::close() !!}
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->

@endsection
<!-- /main section -->