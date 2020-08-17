@extends('layouts.admin')

@section('main-content-header')
<!-- main header section -->
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

        @if(!$CompanyPurchaseOrder->posted_to_grn)
        <a onclick="postToGRN()" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-save"></i> Post to GRN
        </a>
        @endif
    </div>
</div>
<!-- /.box -->
<!-- /main header section -->
@endsection



@section('main-content')
<!-- main section -->
<div class="row">
    {!! Form::model($CompanyPurchaseOrder, ['action'
    =>['Ims\CompanyPurchaseOrderController@update',$CompanyPurchaseOrder->id],'class'=>'form-horizontal','id'=>'Form'])
    !!}
    @csrf
    @method('put')
    <div class="col-md-12">
        @include('error.error')
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-body">

                <div class="col-md-12">
                    <div class="col-md-8"></div>
                    <!-- requisition date -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Requisition Date">Supplier</label>
                            <select name="supplier_id" class="form-control">
                                <option value="">Select a Supplier</option>
                                @foreach(\App\Models\Ims\Supplier::all() as $supplier)
                                <option @if($CompanyPurchaseOrder->supplier_id === $supplier->id) selected @endif
                                    value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> <!-- /requisition date -->
                </div>

                <div class="col-md-12">
                    <table id="invoiceItemTable" class="table table-bordered">
                        <thead>
                            <tr style="text-align: center">
                                <th>No</th>
                                <th>Item</th>
                                <th>Remarks</th>
                                <th>QTY</th>
                                <th>Unit Price (LKR)</th>
                                <th>Total (LKR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1 ;?>
                            @foreach($CompanyPurchaseOrder->items as $item)
                            <tr class="tr_{{ $count }}">
                                <td>{{ $count }} <input style="display:none" name="row[{{ $count }}][insert]"
                                        type="checkbox" checked></td>
                                <td>
                                    <input style="display:none" type="number" value="{{ $item->item_code_id }}"
                                        name="row[{{ $count }}][model_id]">
                                    <input type="text" name="row[{{ $count }}][model_name]"
                                        value="<?php $Model = \App\Models\Ims\ItemCode::find($item->item_code_id); if($Model!=null){echo $Model->name;}?>"
                                        style="width: 100%">
                                </td>

                                <td>
                                    <input onkeyup="calTol({{ $count+1 }})" id="qty{{ $count }}" type="number"
                                        name="row[{{ $count }}][qty]" style="width: 100%; text-align: right"
                                        value="{{ $item->qty }}">
                                </td>
                                <td>
                                    <input id="price{{ $count }}" type="text" onkeyup="calTol({{ $count+1 }})"
                                        name="row[{{ $count }}][unit_price]"
                                        value="{{ number_format($item->unit_price,2) }}"
                                        style="width: 100%;text-align: right">
                                </td>
                                <td>
                                    <input id="tol{{ $count }}" type="text" readonly name="row[{{ $count }}][total]"
                                        style="width: 100%;text-align: right"
                                        value="{{ number_format(($item->qty * $item->unit_price),2) }}"> </td>
                            </tr>
                            <?php $count ++ ;?>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td><input readonly style="width: 100%;text-align: right"
                                        value="{{ number_format($CompanyPurchaseOrder->total,2) }}"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.box-body -->

            <div style="height: 100px" class="box-footer">
                <a href="{{ url('/ims/company-purchase-order/'.$CompanyPurchaseOrder->id.'/print') }}" target="_blank"
                    class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-print"></i> Print</a>
                {{--                    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i> Update</button>--}}
            </div>
        </div>
        <!-- /.box -->

        {!! Form::close() !!}
    </div>


    {!! Form::open(['action'=>'Ims\CompanyPurchaseOrderController@postToGRN','style'=>'display:none','id'=>'postToGRN'])
    !!}
    @csrf()
    <input type="hidden" value="{{ $CompanyPurchaseOrder->id }}" name="CompanyPurchaseOrder_id">
    {{ Form::close() }}
</div>
<!-- /.row -->
<!-- /main section -->
@endsection

@section('js')
<script>
    function postToGRN() {
            $('#postToGRN').submit();
        }
</script>
@endsection