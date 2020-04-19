<?php
$ItemCode = \App\Models\Ims\ItemCode::all()->pluck('name','id');
?>
@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard / Models / Create</h3>
        </div>

        @include('layouts.components.header-widgets.dashboard-header')
         <!-- /.box-body -->
        <div class="box-body">
            <a href="{{ url('/ims/stock') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-close"></i> Cancel
            </a>

            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/brand') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{{ url('/ims/item') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-table"></i> Item
            </a>
            <a href="{{ url('/ims/invoice') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-table"></i> Invoice
            </a>
            <a href="{{ url('/ims/stock/create') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-plus"></i> New
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection



@section('main-content')
    <!-- main section -->
    <div class="row">
                {!! Form::open(['action'=>'Ims\StockController@store','class'=>'form-horizontal','id'=>'Form']) !!}
                @include('error.error')
                @include('admin.ims.stock._partials.createForm')
                {!! Form::close() !!}

        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    Stock Batch Items
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label("Model") !!}
                            {!! Form::select('model_id',$ItemCode,null,['class'=>'form-control','id'=>'ModelSelectId']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label("Qty") !!}
                            {!! Form::text('qty',null,['class'=>'form-control','id'=>'qty']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('Add Item to Batch') !!}
                            <button id="addNewItem" type="button" class=" form-control btn btn-success btn-sm">Add</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

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
                var SelecTModelId = $('#ModelSelectId').val();
                var SelecTModelName = $('#ModelSelectId option:selected').text();
                $.ajax('{!! url('api/item-code-for-invoices') !!}/'+SelecTModelId, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {
                        if(data.item){
                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>'+RawCount+'<input style="display:none" name="row['+count+'][insert]" type="checkbox" checked></td>\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelecTModelId+'" id="row_'+count+'_model_id" name="row['+count+'][model_id]" class="form-control">\n' +
                                '                            <input readonly type="text" name="row['+count+'][model_name]" id="row_'+count+'_model_name" value="'+SelecTModelName+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="number" name="row['+count+'][qty]" value="'+$('#qty').val()+'" placeholder="In Stock '+data.qty+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="number" readonly name="row['+count+'][unit]" value="'+data.item.unit_price_with_tax+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="number" readonly name="row['+count+'][tol]" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemove(\'.tr_'+count+'\','+count+')"><i class="fa fa-remove"></i></a>\n' +
                                '                        </td>\n' +
                                '                    <tr/>');
                            $('#qty').val("");
                            $('#ModelSelectId option:selected').remove();
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
        function rowRemove(value,count) {
            $('#ModelSelectId').append( new Option($('#row_'+count+'_model_name').val(),$('#row_'+count+'_model_id').val()) );
            $(value).remove();
        }
    </script>

@endsection
