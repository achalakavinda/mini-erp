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
                <i class="main-action-btn-danger fa fa-plus"></i> New
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
        {!! Form::open(['action'=>'Ims\GrnController@store','class'=>'form-horizontal','id'=>'Form','ng-app'=>'xApp','ng-controller'=>'xAppCtrl']) !!}

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
                                    <small class="pull-right">Date: {{ \Carbon\Carbon::now() }}</small>
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
                                <input id="date" class="form-control" name="date" type="date" value="{{ \Carbon\Carbon::now() }}">
                            </div>
                        </div>
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
                        <div class="col-md-8"></div>
                        <!-- date -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Requisition Date">Our Vat No</label>
                                <input disabled style="width: 100%" id="CompanyVatNo" readonly="" name="company_vat_no"
                                       type="text" value="174928878-7000">
                            </div>
                        </div>
                        <!-- /.row -->
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
                                        <th>Remarks</th>
                                        <th>QTY</th>
                                        <th>Unit Price (LKR)</th>
                                        <th>Total (LKR)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="2"> @include('layouts.selectors.ims.item-dropdown.index')</th>
                                        <th><button id="addNewItem" type="button" style="width: 100%" class="btn">Add</button></th>
                                    </tr>
                                    </tfoot>
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
                <div class="box-footer">
                    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>Save</button>
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
                var selectModelId = $('#ModelSelectId').val();
                var selectModelName = $('#ModelSelectId option:selected').text();

                $.ajax('{!! url('api/item-code') !!}/'+selectModelId+'/stock', {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {

                        if(data && data.length === 1){
                            data = data[0];

                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>'+RawCount+'<input style="display:none" name="row['+count+'][insert]" type="checkbox" checked></td>\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+selectModelId+'" name="row['+count+'][model_id]" >\n' +
                                '                            <input readonly type="text" name="row['+count+'][model_name]" value="'+selectModelName+' | Unit Price : '+data.unit_price_with_tax+'/=" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  style="width: 100%" type="text" name="row['+count+'][remark]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  onkeyup="calTol('+(count+1)+')" id="qty'+count+'"  type="number" name="row['+count+'][qty]" value="1" style="width: 100%; text-align: right">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input onkeyup="calTol('+(count+1)+')" id="price'+count+'"  type="number"  name="row['+count+'][unit_price]" value="'+data.unit_price_with_tax+'" style="width: 100%;text-align: right">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="tol'+count+'"  type="number" readonly name="row['+count+'][tol]" style="width: 100%;text-align: right">\n' +
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
