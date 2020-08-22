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
        <a onclick="postToGRN()" id="postToGRNBtn" class="btn btn-menu">
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
                    <!-- PO date -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="PO Date">Date</label>
                            <input id="date" class="form-control" name="date" type="date"
                                value="{{$CompanyPurchaseOrder->date}}">
                        </div>
                    </div>
                    <!-- PO date -->
                    <div class="col-md-8"></div>
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
                                <th>Item</th>
                                <th>Remarks</th>
                                <th>QTY</th>
                                <th>Unit Price (LKR)</th>
                                <th>Total (LKR)</th>
                                <th><i class="fa fa-remove"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1 ;?>
                            @foreach($CompanyPurchaseOrder->items as $item)
                            <tr class="tr_{{ $count }}">
                                <td>
                                    <input style="display:none" type="number" value="{{ $item->item_code_id }}"
                                        name="row[{{ $count }}][model_id]">
                                    <input type="text" name="row[{{ $count }}][model_name]"
                                        value="<?php $Model = \App\Models\Ims\ItemCode::find($item->item_code_id); if($Model!=null){echo $Model->name;}?>"
                                        style="width: 100%">
                                </td>
                                <td>
                                    <input style="width: 100%" type="text" name="row[{{ $count }}][remark]"
                                        value="{{ $item->remarks }}">
                                </td>

                                <td>
                                    <input onkeyup="calTol({{ $count+1 }})" id="qty{{ $count }}" type="number"
                                        name="row[{{ $count }}][qty]" style="width: 100%; text-align: right"
                                        value="{{ $item->qty }}">
                                </td>
                                <td>
                                    <input style="text-align: right; width: 100%" id="price{{ $count }}" type="number"
                                        onkeyup="calTol({{ $count+1 }})" name="row[{{ $count }}][unit_price]"
                                        value="{{ $item->unit_price }}">
                                </td>
                                <td>
                                    <input id="tol{{ $count }}" type="text" readonly name="row[{{ $count }}][total]"
                                        style="width: 100%;text-align: right"
                                        value="{{ number_format(($item->qty * $item->unit_price),2) }}"> </td>
                                <td>
                                    <a style="cursor: pointer" type="button" onclick="rowRemove('.tr_{{ $count }}')"><i
                                            class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                            <?php $count ++ ;?>
                            @endforeach
                        </tbody>
                        @if (!$CompanyPurchaseOrder->posted_to_grn)
                        <tfoot>
                            <tr>
                                <th>
                                    <!-- requisition item -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @include('layouts.selectors.ims.item-dropdown.index')
                                        </div>
                                    </div> <!-- /requisition item -->
                                </th>
                                <th>
                                    <button id="addNewItem" style="width: 100%" type="button" class="btn">Add</button>
                                </th>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                @if (!$CompanyPurchaseOrder->posted_to_grn)
                <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>
                    Update</button>

                @endif
                <a target="_blank" href="{{ url('ims/company-purchase-order') }}/{{ $CompanyPurchaseOrder->id }}/print"
                    class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-print"></i>Print</a>
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
        var table = $('#invoiceItemTable');
        var count = parseInt({{ $count }});
        var RawCount = parseInt({{ $count+1 }});

        $( document ).ready(function() {

            $('#addNewItem').click(function() {
                var SelecTItemId = $('#ModelSelectId').val();
                var SelecTModelName = $('#ModelSelectId option:selected').text();
                $('#postToGRNBtn').fadeOut();

                $.ajax('{!! url('api/item-code-for-purchase-requisitions') !!}/'+SelecTItemId, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {
                        if(data.item){
                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelecTItemId+'" name="row['+count+'][model_id]">\n' +
                                '                            <input style="width: 100%" readonly type="text" name="row['+count+'][model_name]" value="'+SelecTModelName+'">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="width: 100%"  type="text" name="row['+count+'][remark]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="text-align: right; width: 100%" id="qty'+count+'"  type="number" onkeyup="calTol('+(RawCount)+')" name="row['+count+'][qty]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="text-align: right; width: 100%" id="price'+count+'"  type="number" onkeyup="calTol('+(RawCount)+')" name="row['+count+'][unit_price]" value="'+data.item.unit_price_with_tax+'">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="text-align: right; width: 100%" id="tol'+count+'"  type="number" readonly name="row['+count+'][total]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemove(\'.tr_'+count+'\')"><i class="fa fa-remove"></i></a>\n' +
                                '                        </td>\n' +
                                '                    <tr/>');
                            count++;
                            RawCount++;
                        }else{
                            alert('Empty Items');
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert(errorMessage);
                    }
                });
            });

        });

        function rowRemove(value) {
            $(value).remove();
        }

        function calTol(count) {
            let total = 0;
            let discount = 0;
            let subtotal = 0;
            for(let i=0; i<count; i++){
                $('#tol'+i).val($("#price"+i).val() * $("#qty"+i).val());
                subtotal = subtotal+parseFloat($('#tol'+i).val());
            }
        }
</script>
@endsection