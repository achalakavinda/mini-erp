@extends('layouts.admin')

@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Goods Received Note</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{{ url('/ims/grn') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-refresh"></i> Goods Received Notes
        </a>
        <a href="{{ url('/ims/grn/create') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
        <a href="{{ url('/ims/item') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-table"></i> Item
        </a>

        <a href="{{ url('/ims/grn/create') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-plus"></i> New
        </a>
        @if (!$Grn->posted_to_stock)
        <a onclick="Onclick()" id="postToStockBtn" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-save"></i> Post To Stock
        </a>
        {!! Form::open(['action'=>'Ims\GrnController@postToStock','style'=>'display:none','id'=>'postToStock']) !!}
        @csrf()
        <input type="number" value="{{ $Grn->id }}" name="grn_id">
        {{ Form::close() }}
        @endif
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- /main header section -->
@endsection

@section('main-content')
<!-- main section -->
<div class="row">
    {!! Form::model($Grn, ['method' => 'PATCH', 'action' => ['Ims\GrnController@update',
    $Grn->id],'class'=>'form-horizontal']) !!}
    <div class="col-md-12">
        @include('error.error')
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <div class="box-body">
                <!-- invoice date -->
                <div class="col-md-12">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h4>
                                <small class="pull-right">Date: {{ $Grn->created_at }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="col-md-8"></div>
                    <!-- PO date -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Grn Date">Date</label>
                            <input id="date" class="form-control" name="date" type="date" value="{{$Grn->date}}">
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="GRN Date">Supplier</label>
                            <select name="supplier_id" class="form-control">
                                <option value="">Select a Supplier</option>
                                @foreach(\App\Models\Ims\Supplier::all() as $supplier)
                                <option @if($Grn->supplier_id == $supplier->id) selected @endif
                                    value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                    <!-- date -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Requisition Date">Our Vat No</label>
                            <input disabled style="width: 100%" id="CompanyVatNo" readonly="" name="company_vat_no"
                                type="text" value="174928878-7000">
                        </div>
                    </div>

                    <!-- Table row -->
                    <div style="margin-top: 20px" class="row">
                        <div class="col-xs-12">
                            <table id="invoiceItemTable" class="table table-bordered">
                                <colgroup>
                                    <col style="width: 50px;">
                                    <col style="width: 400px;">
                                    <col style="width: 400px;">
                                    <col style="width: 100px;">
                                </colgroup>
                                <thead>
                                    <tr style="text-align: center">
                                        <th>No</th>
                                        <th>Item</th>
                                        <th>Remark</th>
                                        <th>QTY</th>
                                        <th>Unit Price (LKR)</th>
                                        <th>Total (LKR)</th>
                                        <th><i class="fa fa-remove"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1 ;?>
                                    @foreach($Grn->items as $item)
                                    <?php
                                        $ItemCode = \App\Models\Ims\ItemCode::find($item->item_code_id);
                                        ?>
                                    <tr class="tr_{{ $count }}">
                                        <td>{{ $count }}</td>
                                        <td>
                                            <input style="display:none" type="number" value="{{ $item->item_code_id }}"
                                                name="row[{{ $count }}][model_id]">
                                            <input disabled type="text" name="row[{{ $count }}][model_name]"
                                                value="{{ $item->item_code }} @if($ItemCode) {{ $ItemCode->size?' - '.$ItemCode->size->code:'' }}  {{ $ItemCode->color?' - '.$ItemCode->color->code:'' }} @endif"
                                                style="width: 100%">
                                        </td>
                                        <td>
                                            <input style="width: 100%" type="text" name="row[{{ $count }}][remark]"
                                                value="{{ $item->remarks }}">
                                        </td>
                                        <td>
                                            <input onkeyup="calTol({{ $count }})" id="qty{{ $count }}" type="number"
                                                name="row[{{ $count }}][qty]" style="width: 100%; text-align: right"
                                                value="{{ $item->qty }}">
                                        </td>
                                        <td>
                                            <input id="price{{ $count }}" type="number"
                                                name="row[{{ $count }}][unit_price]" value="{{ $item->unit_price }}"
                                                style="width: 100%; text-align: right">
                                        </td>
                                        <td>
                                            <input disabled id="tol{{ $count }}" type="text" readonly
                                                name="row[{{ $count }}][tol]" style="width: 100%;text-align: right"
                                                value="{{ number_format(($item->qty * $item->unit_price),2) }}">
                                        </td>
                                        <td>
                                            <a style="cursor: pointer" type="button"
                                                onclick="rowRemove('.tr_{{ $count }}')"><i class="fa fa-remove"></i></a>
                                        </td>
                                        <tr />

                                        <?php $count ++ ;?>
                                        @endforeach
                                </tbody>
                                @if (!$Grn->posted_to_stock)
                                <tfoot>
                                    <tr>
                                        <th colspan="2">
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
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-8">
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

            </div>

            <div style="height: 100px" class="box-footer">
                @if(!$Grn->posted_to_stock)
                <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>
                    Update</button>
                @endif
                <a target="_blank" href="{{ url('ims/grn') }}/{{ $Grn->id }}/print" class="btn btn-app pull-right"><i  style="color: #00a157" class="fa fa-print"></i>Print</a>
            </div>

        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- /.row -->
<!-- /main section -->
@endsection

@section('js')
<script>
    var table = $('#invoiceItemTable');
        var count = 0;
        var RawCount = 1;

        $( document ).ready(function() {

            $('#addNewItem').click(function() {

                let selectModelId = $('#ModelSelectId').val();
                let selectModelName = $('#ModelSelectId option:selected').text();
                $('#postToStockBtn').fadeOut();

                $.ajax('{!! url('api/item-code') !!}/'+selectModelId+'/stock', {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {

                        if(data && data.length === 1){
                            data = data[0];
                            table.append('<tr class="tr_'+count+'">\n' +
                                '<td></td>'+
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+selectModelId+'" name="row['+count+'][model_id]" >\n' +
                                '                            <input readonly type="text" name="row['+count+'][model_name]" value="'+selectModelName+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="width: 100%"  type="text" name="row['+count+'][remark]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input onkeyup="calTol('+(count+1)+')" id="qty'+count+'"  type="number" name="row['+count+'][qty]" placeholder="In Stock '+data.stock_qty+' items" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="price'+count+'"  type="number" readonly name="row['+count+'][unit_price]" value="'+data.unit_price_with_tax+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="tol'+count+'"  type="number" readonly name="row['+count+'][tol]" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemove(\'.tr_'+count+'\')"><i class="fa fa-remove"></i></a>\n' +
                                '                        </td>\n' +
                                '                    <tr/>');

                            count++;
                            RawCount++;
                        }else{
                            alert('some error has occurred..., please try again!');
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert('some error has occurred..., please try again!');
                        console.error(errorMessage);
                    }
                });
            });

        });

        function Onclick() {
            $('#postToStock').submit();
        }

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
            $('#subtotal').val(subtotal);

            if(parseFloat($('#discountpercentage').val())>0){
                let disamount = subtotal*(parseFloat($('#discountpercentage').val())/100);
                $('#total').val(subtotal-disamount);
            }else{
                $('#total').val(subtotal);
            }
        }
</script>
@endsection
