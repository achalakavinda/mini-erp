@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Requisition</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/purchase-requisition') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Requisitions
            </a>
            <a href="{{ url('/ims/purchase-requisition/create') }}" class="btn btn-menu">
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
                {!! Form::model($Requisition, ['action' => ['Ims\PurchaseRequisitionController@postToPurchase'],'class'=>'form-horizontal','id'=>'postToPurchase']) !!}
                <input type="hidden" value="{{ $Requisition->id }}" name="requisition_id">
                @include('error.error')
                @include('admin.ims.purchase-requisition._partials.showForm')
                {!! Form::close() !!}

                @if($Requisition->purchase_requisition_status_id == 2)
                    {!! Form::open(['action'=>'Ims\PurchaseRequisitionController@postToGRN','style'=>'display:none','id'=>'postToGRN']) !!}
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
