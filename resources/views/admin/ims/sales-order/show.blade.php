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
            <i class="main-action-btn-info fa fa-plus"></i> New
        </a>
        @if (!$SalesOrder->posted_to_invoice)
        <a onclick="postToInvoice()" id="postToInvoiceBtn" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-save"></i> Post To Invoice
        </a>
        {!!
        Form::open(['action'=>'Ims\SalesOrderController@postToInvoice','style'=>'display:none','id'=>'postToInvoice'])
        !!}
        @csrf()
        <input type="hidden" value="{{ $SalesOrder->id }}" name="sales_order_id">
        {{ Form::close() }}
        @endif
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- /main header section -->
@endsection

<!-- main section -->
@section('main-content')
<div class="row">
    {!! Form::model($SalesOrder, ['method' => 'PATCH', 'action' => ['Ims\SalesOrderController@update',
    $SalesOrder->id],'class'=>'form-horizontal']) !!}

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
                                <small class="pull-right">Date: {{ $SalesOrder->created_at }}</small>
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
                                <option @if($SalesOrder->customer_id === $customer->id) selected @endif
                                    value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                    <!-- date -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Qoutation Date">Order Date</label>
                            <input id="date" class="form-control" name="date" type="date" value="{{$SalesOrder->date}}">
                        </div>
                    </div> <!-- /date -->

                    <!-- info row -->
                    <div class="col-md-8"></div>
                    <!-- date -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Requisition Date">Our Vat No</label>
                            <input disabled style="width: 100%" id="CompanyVatNo" readonly="" name="company_vat_no"
                                type="text" value="174928878-7000">
                        </div>
                    </div> <!-- /date -->

                    <!-- /.row -->
                    <!-- Table row -->
                    <div style="margin-top: 20px" class="row">
                        <div class="col-xs-12">
                            <table id="invoiceItemTable" class="table table-bordered">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>Item</th>
                                        <th>QTY</th>
                                        <th>Unit Price (LKR)</th>
                                        <th>Total (LKR)</th>
                                        <th><i class="fa fa-remove"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1 ;?>
                                    @foreach($SalesOrder->items as $item)
                                    <tr class="tr_{{ $count }}">
                                        <td>
                                            <input style="display:none" type="number" value="{{ $item->item_code_id }}"
                                                name="row[{{ $count }}][model_id]">
                                            <input disabled type="text" name="row[{{ $count }}][model_name]"
                                                value="{{ $item->item_code }}" style="width: 100%">
                                        </td>

                                        <td>
                                            <input onkeyup="calTol({{ $count }})" id="qty{{ $count }}" type="number"
                                                name="row[{{ $count }}][qty]" style="width: 100%"
                                                value="{{ $item->qty }}">
                                        </td>
                                        <td>
                                            <input id="price{{ $count }}" type="number" name="row[{{ $count }}][unit]"
                                                value="{{ $item->unit_price }}" style="width: 100%">
                                        </td>
                                        <td>
                                            <input disabled id="tol{{ $count }}" type="number" readonly
                                                name="row[{{ $count }}][tol]" style="width: 100%"
                                                value="{{ $item->total }}">
                                        </td>
                                        <td>
                                            <a style="cursor: pointer" type="button"
                                                onclick="rowRemove('.tr_{{ $count }}')"><i class="fa fa-remove"></i></a>
                                        </td>
                                        {{--                                            <td>--}}
                                        {{--                                                <a  style="cursor: pointer" type="button" onclick="rowRemove('.tr_{{ $count }}')"><i
                                            class="fa fa-remove"></i></a>--}}
                                        {{--                                            </td>--}}
                                        <tr />

                                        <?php $count ++ ;?>
                                        @endforeach

                                        {{--                                    <tr>--}}
                                        {{--                                        <th>No</th>--}}
                                        {{--                                        <th>{!! Form::select('model_select_id',\App\Models\Ims\ItemCode::all()->pluck('name','id'),null,['id'=>'ModelSelectId','class'=>'form-control']) !!}</th>--}}
                                        {{--                                        <th>--}}
                                        {{--                                            <button id="addNewItem" type="button" style="width: 100%" class="btn">Add</button></th>--}}
                                        {{--                                    </tr>--}}
                                </tbody>
                                @if (!$SalesOrder->posted_to_invoice)
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
                                            <button id="addNewItem" style="width: 100%" type="button"
                                                class="btn">Add</button>
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
                        <div class="col-xs-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td><input disabled style="width: 100%" id="subtotal" name="subtotal"
                                                type="text" value="{{ $SalesOrder->amount }}"></td>
                                    </tr>
                                    <tr>
                                        <th>Discount:</th>
                                        <td><input disabled style="width: 80%" id="discountpercentage"
                                                name="discount_percentage" type="text"
                                                value="{{ $SalesOrder->discount }}">%</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td><input disabled style="width: 100%" id="total" name="total" type="text"
                                                value="{{ $SalesOrder->total }}"></td>
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
                @if (!$SalesOrder->posted_to_invoice)
                <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>
                    Update</button>

                @endif
                <button type="button" class="btn btn-app pull-right" target="_blank"
                    href="{{ url('ims/sales-Order') }}/{{ $SalesOrder->id }}/print"><i style="color: #00a157"
                        class="fa fa-print"></i>
                    Print</button>

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
    function postToInvoice() {
            if(confirm("Are you want post quotation to create an Invoice")){
                $('#postToInvoice').submit();
            }
    }
    var table = $('#invoiceItemTable');
        var count = parseInt({{ $count }});
        var RawCount = parseInt({{ $count+1 }});

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
                $('#postToInvoiceBtn').fadeOut();

                $.ajax('{!! url('api/item-code-for-invoices') !!}/'+SelecTModelId, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {

                        if(data.item){

                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelecTModelId+'" name="row['+count+'][model_id]" >\n' +
                                '                            <input readonly type="text" name="row['+count+'][model_name]" value="'+SelecTModelName+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input onkeyup="calTol('+(count+1)+')" id="qty'+count+'"  type="number" name="row['+count+'][qty]" placeholder="In Stock '+data.qty+' items" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="price'+count+'"  type="number" name="row['+count+'][unit]" value="'+data.item.unit_price_with_tax+'" style="width: 100%">\n' +
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
                            $('#ModelSelectId option:selected').remove();

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