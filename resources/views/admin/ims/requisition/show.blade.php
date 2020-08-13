@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Dashboard / Requisition</h3>
    </div>
    <div class="box-body">
        <a href="{{ url('/ims/purchase-requisition') }}" class="btn btn-success"> Requisition <i
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
            {!! Form::model($Requisition, ['action' =>
            ['Ims\PurchaseRequisitionController@postToPurchase'],'class'=>'form-horizontal','id'=>'postToPurchase']) !!}
            <input type="hidden" value="{{ $Requisition->id }}" name="requisition_id">
            @include('error.error')
            @include('admin.ims.requisition._partials.showForm')
            {!! Form::close() !!}

            @if($Requisition->purchase_requisition_status_id == 2)
            {!!
            Form::open(['action'=>'Ims\PurchaseRequisitionController@postToGRN','style'=>'display:none','id'=>'postToGRN'])
            !!}
            @csrf()
            <input type="hidden" value="{{ $Requisition->id }}" name="requisition_id">
            {{ Form::close() }}
            @endif

            <div style="height: 100px" class="box-footer">
                <button disabled style="width: 100px;margin: 2px" type="submit"
                    class="btn btn-primary pull-right">Edit</button>
                @if ($Requisition->purchase_requisition_status_id == 1)
                <button style="margin: 2px" onclick="postToPurchase()" class="btn btn-primary  pull-right">Post To
                    Purchase
                    Orders</button>
                @endif
                @if ($Requisition->purchase_requisition_status_id == 2)
                <button style="margin: 2px" onclick="postToGRN()" class="btn btn-primary  pull-right">Post To
                    GRN</button>
                @endif

            </div>

        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->

@endsection
<!-- /main section -->
@section('js')
<script>
    function postToPurchase() {
        $('#postToPurchase').submit();
    }

    function postToGRN() {
        $('#postToGRN').submit();
    }

</script>
@endsection