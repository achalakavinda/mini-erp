@extends('layouts.admin')

@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Payment Window</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-app">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{!! url('accounting/payment') !!}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
        </a>
        <a href="{{ url('/accounting/invoice/create') }}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
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
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a href="#customer-tab" data-toggle="tab" aria-expanded="false">Customer Payment</a></li>
                <li><a href="#supplier-tab" data-toggle="tab" aria-expanded="true">Supplier Payment</a></li>
                <li class="active"><a href="#invoice-tab" data-toggle="tab">Invoice Payment</a></li>
            </ul>
            <div class="tab-content">
                @include('error.error')
                <div class="tab-pane" id="customer-tab">
                    <div class="box-content">
                        <!-- start invoice only form -->
                        {!!
                        Form::open(['action'=>'Accounting\PaymentController@store','class'=>'form-horizontal','id'=>'Form','ng-app'=>'xApp','ng-controller'=>'xAppCtrl'])
                        !!}
                        <!-- Table row -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer">Customer</label>
                                        <select id="customerID" name="customer_id"
                                            class="ui search dropdown form-control">
                                            <option value=""> Choose a customer </option>
                                            @foreach(\App\Models\Customer::all() as $customer)
                                            <option value="{{ $customer->id }}"> {{ $customer->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8"></div>
                            </div>
                        </div>
                        <div style="margin-top: 20px" class="row">
                            <div class="col-xs-12">
                                <table id="invoiceItemTableForCustomer" class="table table-bordered">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Total Amount (LKR)</th>
                                            <th>Amount (LKR)</th>
                                            <th>Due Amount (LKR)</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>
                                                @include('layouts.selectors.accounting.invoice-dropdown.customer-invoice')
                                            </th>
                                            <th><button id="addNewInvoiceItemForCustomer" type="button"
                                                    style="width: 100%" class="btn">Add</button></th>
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
                                            <th>Total:</th>
                                            <td><input style="width: 100%" id="total" name="total" type="text"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157"
                                        class="fa fa-save"></i>Post</button>
                            </div>
                        </div>
                        <!-- /.row -->
                        {!! Form::close() !!}
                        <!-- end invoice only form -->
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="supplier-tab">
                    <div class="row">
                        //supplier payment form
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane  active" id="invoice-tab">
                    <div class="box-content">
                        <!-- start invoice only form -->
                        {!!
                        Form::open(['action'=>'Accounting\PaymentController@store','class'=>'form-horizontal','id'=>'Form','ng-app'=>'xApp','ng-controller'=>'xAppCtrl'])
                        !!}
                        <!-- Table row -->
                        <div style="margin-top: 20px" class="row">
                            <div class="col-xs-12">
                                <table id="invoiceItemTable" class="table table-bordered">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Total Amount (LKR)</th>
                                            <th>Amount (LKR)</th>
                                            <th>Due Amount (LKR)</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>
                                                @include('layouts.selectors.accounting.invoice-dropdown.index')
                                            </th>
                                            <th><button id="addNewInvoiceItem" type="button" style="width: 100%"
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
                                            <th>Total:</th>
                                            <td><input style="width: 100%" id="total" name="total" type="text"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157"
                                        class="fa fa-save"></i>Post</button>
                            </div>
                        </div>
                        <!-- /.row -->
                        {!! Form::close() !!}
                        <!-- end invoice only form -->
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div><!-- end tab-content -->
        </div>
    </div>
</div><!-- /.row -->
<!-- /main section -->
@endsection

@section('js')
<script>
    var table = $('#invoiceItemTable');
    var invoiceTableCustomer = $('#invoiceItemTableForCustomer');
        var count = 0;
        var RawCount = 1;

        var count2 = 0;
        var RawCount2 = 1;

        $( document ).ready(function() {

            $('#addNewInvoiceItem').click(function() {
                var SelecTModelId = $('#ModelSelectId').val();
                var SelecTModelName = $('#ModelSelectId option:selected').text();
                
                $.ajax('{!! url('api/invoice-for-payment') !!}/'+SelecTModelId, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {
                        if(data.invoice){

                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>'+RawCount+'<input style="display:none" name="row['+count+'][insert]" type="checkbox" checked></td>\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelecTModelId+'" name="row['+count+'][model_id]" >\n' +
                                '                            <input readonly type="text" name="row['+count+'][model_name]" value="'+SelecTModelName+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="total'+count+'" readonly type="number" name="row['+count+'][total]" value="'+data.invoice.total+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input onkeyup="calTol('+(count+1)+')" id="amount'+count+'"  type="number" name="row['+count+'][amount]" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="due_amount'+count+'"  type="number" readonly name="row['+count+'][due_amount]" value="'+data.due_amount+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  style="width: 100%" type="text" name="row['+count+'][remark]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemove(\'.tr_'+count+'\','+count+')"><i class="fa fa-remove"></i></a>\n' +
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

            $('#addNewInvoiceItemForCustomer').click(function() {
                var SelecTModelId = $('#CustomerInvoiceModelSelectId').val();
                var SelecTModelName = $('#CustomerInvoiceModelSelectId option:selected').text();
                
                $.ajax('{!! url('api/invoice-for-payment') !!}/'+SelecTModelId, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {
                        if(data.invoice){

                            invoiceTableCustomer.append('<tr class="tr_'+count2+'">\n' +
                                '                        <td>'+RawCount2+'<input style="display:none" name="row['+count2+'][insert]" type="checkbox" checked></td>\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelecTModelId+'" name="row['+count2+'][model_id]" >\n' +
                                '                            <input readonly type="text" name="row['+count2+'][model_name]" value="'+SelecTModelName+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="total'+count2+'" readonly type="number" name="row['+count2+'][total]" value="'+data.invoice.total+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input onkeyup="calTol('+(count2+1)+')" id="amount'+count2+'"  type="number" name="row['+count2+'][amount]" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="due_amount'+count2+'"  type="number" readonly name="row['+count2+'][due_amount]" value="'+data.due_amount+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  style="width: 100%" type="text" name="row['+count2+'][remark]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemove(\'.tr_'+count2+'\','+count2+')"><i class="fa fa-remove"></i></a>\n' +
                                '                        </td>\n' +
                                '                    <tr/>');

                            count2++;
                            RawCount2++;

                        }else{
                            alert('Empty Items');
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert(errorMessage);
                    }
                });
            });

            $('#customerID').change(function(e) {
                var customerID = e.target.value;
                
                $.ajax('{!! url('api/invoice-for-customer') !!}/'+customerID, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {
                        if(data.invoice){
                            $('#CustomerInvoiceModelSelectId').find('option').remove();
                            data.invoice.forEach(function(e, i){
                                $('#CustomerInvoiceModelSelectId').append($('<option></option>').val(e.id).text(e.code)); 
                            });
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

        function rowRemove(value,i) {
            $('#total').val($("#total").val() - $("#amount"+i).val());
            $(value).remove();
        }

        function calTol(count) {
            let total = 0;
            for(let i=0; i<count; i++){
                total = total+parseFloat($('#amount'+i).val());
            }
            $('#total').val(total);
        }
</script>
@endsection