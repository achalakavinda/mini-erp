@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Company Pruchase Requisition Order</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/purchase-requisition/create') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{{ url('/ims/purchase-requisition') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Requisition
            </a>
        </div>
    </div>
    <!-- /main header section -->
@endsection

@section('main-content')
    <!-- main section -->
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['action'=>'Ims\PurchaseRequisitionController@store','class'=>'form-horizontal','id'=>'Form']) !!}
            <div class="box box-primary">
                <div class="box-body">
                @include('error.error')
                    <div class="col-md-12">
                        <div class="col-md-8"></div>
                        <!-- requisition date -->
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('Requisition Date') !!}
                                {!!  Form::date('date',\Carbon\Carbon::now(),['id'=>'RequisitionDate','class'=>'form-control'])  !!}
                            </div>
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

                    <div class="col-md-12">
                        <table id="requisitionItemTable" class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>QTY</th>
                                <th>Unit Price (LKR)</th>
                                <th>Remark</th>
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
            {!! Form::close() !!}

        </div>
    </div>
    <!-- /.row -->
    <!-- /main section -->
@endsection


@section('js')
    @include('layouts.components.sematic-ui.dropdown')
    <script>
        var table = $('#requisitionItemTable');
        var count = 0;
        var RawCount = 1;

        $( document ).ready(function() {

            $('#addNewItem').click(function() {

                let selectItemId = $('#ModelSelectId').val();
                let selectModelName = $('#ModelSelectId option:selected').text();

                $.ajax('{!! url('api/item-code-for-purchase-requisitions') !!}/'+selectItemId, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {

                        if(data && data.length === 1){
                            data = data[0];
                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+selectItemId+'" name="row['+count+'][item_code_id]">\n' +
                                '                            <input style="width: 100%" readonly type="text" name="row['+count+'][model_name]" value="'+selectModelName+'">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="qty'+count+'"  style="width: 100%" type="number" onkeyup="calculateRowTotal('+(count+1)+')" name="row['+count+'][qty]" value="1">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="price'+count+'" style="width: 100%" type="number" onkeyup="calculateRowTotal('+(count+1)+')" name="row['+count+'][unit_price]" value="'+data.unit_price_with_tax+'">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  style="width: 100%" type="text" name="row['+count+'][remark]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="tol'+count+'" style="width: 100%" type="number" readonly name="row['+count+'][total]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemove(\'.tr_'+count+'\')"><i class="fa fa-remove"></i></a>\n' +
                                '                        </td>\n' +
                                '                    <tr/>');
                            calculateRowTotal(count+1);
                            count++;
                            RawCount++;
                        }else{
                            alert('some error has occured..., please try again!');
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

        function calculateRowTotal(count) {
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
