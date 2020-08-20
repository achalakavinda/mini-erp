@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Dashboard / Requisition</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{{ url('/ims/purchase-requisition') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-list"></i> Requisition
        </a>
        <a href="{{ url('/ims/purchase-requisition/create') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
    </div>
</div>
<!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
<div class="row">
    {!! Form::open(['action'=>'Ims\PurchaseRequisitionController@store','class'=>'form-horizontal','id'=>'Form']) !!}
    <div class="col-md-12">
        @include('error.error')
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <div class="box-body">

                <div class="col-md-12">
                    <div class="col-md-8"></div>
                    <!-- requisition date -->
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('Requisition Date') !!}
                            {!!
                            Form::date('date',\Carbon\Carbon::now(),['id'=>'RequisitionDate','class'=>'form-control'])
                            !!}
                        </div>
                    </div> <!-- /requisition date -->
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="GRN Date">Supplier</label>
                            <select name="supplier_id" class="form-control">
                                <option value="">Select a Supplier</option>
                                @foreach(\App\Models\Ims\Supplier::all() as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- requisition item table -->
                <div class="col-md-12">

                    <table id="requisitionItemTable" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Remark</th>
                                <th>QTY</th>
                                <th>Unit Price (LKR)</th>
                                <th>Total (LKR)</th>
                                <th><i class="fa fa-remove"></i></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
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
                    </table>
                </div><!-- requisition item table -->
                <hr />
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>
                    Submit</button>
            </div>
        </div>
        <!-- /.box -->
    </div>
    {!! Form::close() !!}
</div>
<!-- /.row -->
@endsection
<!-- /main section -->

@section('js')
@include('layouts.components.sematic-ui.dropdown')
<script>
    var table = $('#requisitionItemTable');
        var count = 0;
        var RawCount = 1;

        $( document ).ready(function() {

            $('#addNewItem').click(function() {
                var SelecTItemId = $('#ModelSelectId').val();
                var SelecTModelName = $('#ModelSelectId option:selected').text();

                $.ajax('{!! url('api/item-code-for-purchase-requisitions') !!}/'+SelecTItemId, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {

                        if(data.item){
                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelecTItemId+'" name="row['+count+'][item_code_id]">\n' +
                                '                            <input style="width: 100%" readonly type="text" name="row['+count+'][model_name]" value="'+SelecTModelName+'">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  style="width: 100%" type="text" name="row['+count+'][remark]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="qty'+count+'"  style="width: 100%" type="number" onkeyup="calTol('+(count+1)+')" name="row['+count+'][qty]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="price'+count+'" style="width: 100%" type="number" onkeyup="calTol('+(count+1)+')" name="row['+count+'][unit_price]" value="'+data.item.unit_price_with_tax+'">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="tol'+count+'" style="width: 100%" type="number" readonly name="row['+count+'][total]">\n' +
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
            alert(value);
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