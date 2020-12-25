@extends('layouts.admin')
@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Sales Order</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{{ url('/ims/sales-order/create') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
        <a href="{{ url('/ims/item') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-table"></i> Item
        </a>

        <a href="{{ url('/ims/sales-order/create') }}" class="btn btn-menu">
            <i class="main-action-btn-danger fa fa-plus"></i> New
        </a>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- /main header section -->
@endsection

<!-- main section -->
@section('main-content')
<div class="row">
    {!!
    Form::open(['action'=>'Ims\SalesOrderController@store','class'=>'form-horizontal','id'=>'Form','ng-app'=>'xApp','ng-controller'=>'xAppCtrl'])
    !!}

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
                                <small class="pull-right">Date: 2/10/2014</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Customer">Customer</label>
                            <select name="customer_id" class="form-control">
                                <option value="">Select a Customer</option>
                                @foreach(\App\Models\Customer::all() as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-8"></div>
                    <!-- date -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sales order Date">Order Date</label>
                            <input id="date" class="form-control" name="date" type="date" value="">
                        </div>
                    </div> <!-- /date -->

                    <div class="col-md-8"></div>
                    <!-- date -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sales Order vat">Our Vat No</label>
                            <input disabled style="width: 100%" id="CompanyVatNo" readonly="" name="company_vat_no"
                                type="text" value="174928878-7000">
                        </div>
                    </div>
                    <div style="margin-top: 20px" class="row">
                        <div class="col-xs-12">
                            <table id="invoiceItemTable" class="table table-bordered">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>No</th>
                                        <th>Item</th>
                                        <th>Remark</th>
                                        <th>QTY</th>
                                        <th>Unit Price (LKR)</th>
                                        <th>Total (LKR)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            @include('layouts.selectors.ims.item-dropdown.index')
                                        </th>
                                        <th><button id="addNewItem" type="button" style="width: 100%"
                                                class="btn">Add</button></th>
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
                        <div class="col-xs-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td><input style="width: 100%" id="subtotal" name="subtotal" type="text"></td>
                                    </tr>
                                    <tr>
                                        <th>Discount:</th>
                                        <td><input style="width: 80%" id="discountpercentage" name="discount_percentage"
                                                type="text">%</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td><input style="width: 100%" id="total" name="total" type="text"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>
                    Submit</button>
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

            $('#CustomerId').click(function() {
                var customer_id =$('#CustomerId').val();
                $.ajax('{!! url('api/customer-for-invoices') !!}/'+customer_id, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {
                        $('#CustomerDetail').val(data.address);
                        $('#DeliveryAddress').val(data.address);
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert(errorMessage);
                    }
                });
            });

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
                                '                            <input style="display:none" type="number" value="'+SelecTModelId+'" name="row['+count+'][model_id]" >\n' +
                                '                            <input readonly type="text" name="row['+count+'][model_name]" value="'+SelecTModelName+' | Unit Price : '+data.item.unit_price_with_tax+'/=" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  style="width: 100%" type="text" name="row['+count+'][remark]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input onkeyup="calTol('+(count+1)+')" id="qty'+count+'"  type="number" name="row['+count+'][qty]" placeholder="In Stock '+data.qty+' items" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input onkeyup="calTol('+(count+1)+')" id="price'+count+'"  type="number"  name="row['+count+'][unit]" value="'+data.item.unit_price_with_tax+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="tol'+count+'"  type="number" readonly name="row['+count+'][tol]" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemove(\'.tr_'+count+'\'); rowRemoveupdateTot('+(count)+');"><i class="fa fa-remove"></i></a>\n' +
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

        function rowRemoveupdateTot(count){
            // let total = 0;
            // let discount = 0;
            // let subtotal = 0;
            // alert($('#subtotal').val());
            // subtotal = parseFloat($('#subtotal').val() - $('#tol'+count).val());
            // $('#subtotal').val(subtotal);

            // if(parseFloat($('#discountpercentage').val())>0){
            //     let disamount = subtotal*(parseFloat($('#discountpercentage').val())/100);
            //     $('#total').val(subtotal-disamount);
            // }else{
            //     $('#total').val(subtotal);
            // }
            // alert($('#tol'+subtotal).val());
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