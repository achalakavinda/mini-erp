@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Dashboard / Company Purchase Order</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{{ url('/ims/company-purchase-order') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-refresh"></i> Company Purchase Order
        </a>
        <a href="{{ url('/ims/company-purchase-order/create') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-plus"></i> New
        </a>
    </div>
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
            {!! Form::model($CompanyPurchaseOrder, ['action' =>
            ['Ims\CompanyPurchaseOrderController@update',$CompanyPurchaseOrder->id],'class'=>'form-horizontal','id'=>'Form'])
            !!}
            @csrf
            @method('put')
            @include('error.error')
            @include('admin.ims.company-purchase-order._partials.showForm')
            {!! Form::close() !!}

        </div>
        <!-- /.box -->

        {!!
        Form::open(['action'=>'Ims\CompanyPurchaseOrderController@postToGRN','style'=>'display:none','id'=>'postToGRN'])
        !!}
        @csrf()
        <input type="hidden" value="{{ $CompanyPurchaseOrder->id }}" name="CompanyPurchaseOrder_id">
        {{ Form::close() }}

        <div style="height: 100px" class="box-footer">
            <button disabled style="width: 100px;margin: 2px" type="submit"
                class="btn btn-primary pull-right">Edit</button>
            <button style="margin: 2px" onclick="postToGRN()" class="btn btn-primary  pull-right">Post To
                GRN</button>

        </div>

    </div>
</div>
<!-- /.row -->

@endsection
<!-- /main section -->
@section('js')
<script>
    function postToGRN() {
        $('#postToGRN').submit();
    }

</script>
@endsection