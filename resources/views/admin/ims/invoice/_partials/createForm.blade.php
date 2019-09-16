<div class="box-body">

    <div class="col-md-12">

        <div class="col-md-8">
        </div>
        <div class="col-md-4">
            <!-- invoice date -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Order Date') !!}
                    {!! Form::date('order_date',\Carbon\Carbon::now(),['id'=>'OrderDate','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice date -->

            <!-- invoice purchase order -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('PO. No') !!}
                    {!! Form::text('purchase_order',null,['id'=>'PurchaseOrder','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice purchase order -->

            <!-- invoice no -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Invoice No') !!}
                    {!! Form::text('invoice_no','JAT/AV/18/663',['id'=>'InvoiceNo','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice No -->

            <!-- company vat no -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Our Vat No') !!}
                    {!! Form::text('company_vat_no','174928878-7000',['id'=>'CompanyVatNo','readonly','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /company vat no -->

            <!-- dispatched date -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Dispatched Date') !!}
                    {!! Form::date('dispatched_date',\Carbon\Carbon::now(),['id'=>'DispatchedDate','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice date -->

            <!-- invoice purchase order -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Delivery Method') !!}
                    {!! Form::select('delivery_method_id',['By Customer'],null,['id'=>'PoId','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice purchase order -->

            <!-- invoice customer -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Customer') !!}
                    {!! Form::select('customer_id',\App\Models\Customer::all()->pluck('name','id'),null,['id'=>'CustomerId','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice customer -->

        </div>
    </div>

    <!-- /invoice address text area -->
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="form-group">
                 {!! Form::label('Delivery Address') !!}
                 {!! Form::textarea('delivery_address',null,['id'=>'DeliveryAddress','class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Customer Details') !!}
                {!! Form::textarea('customer_detail',null,['id'=>'CustomerDetail','class'=>'form-control']) !!}
            </div>
        </div>
    </div><!-- /invoice address text area -->

    <!-- invoice item table -->
    <div class="col-md-12">

        <table id="invoiceItemTable" class="table table-responsive table-bordered table-striped">
            <thead>
            <tr>
                <th>Item</th>
                <th>Model</th>
                <th>Qty</th>
                <th>Unit Price (LKR)</th>
                <th>Total</th>
                <th><i class="fa fa-remove"></i></th>
            </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div><!-- invoice item table -->

    <hr/>
    <!-- discount  -->
    <div class="col-md-12">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Discount Percentage') !!}
                {!! Form::number('discount_percentage',null,['id'=>'DiscountPercentage','class'=>'form-control']) !!}
            </div>
        </div>
    </div> <!-- /discount  -->


    <!-- model selection -->
    <div class="col-md-12">

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('Select Model') !!}
                {!! Form::select('model_select_id',\App\Models\Ims\ItemCode::all()->pluck('name','id'),null,['id'=>'ModelSelectId','class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-11"></div>
        <div class="col-md-1">
            {!! Form::label('') !!}
            <button id="addNewItem" type="button" class="btn btn-success btn-sm">Add</button>
        </div>

    </div> <!-- /model selection -->



    <!-- special remarks -->
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Special Remarks') !!}
            {!! Form::textarea('special_remarks',null,['id'=>'SpecialRemarks','class'=>'form-control']) !!}
        </div>
    </div><!-- special remarks -->


</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

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
                            console.log(data);

                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>'+RawCount+'<input style="display:none" name="row['+count+'][insert]" type="checkbox" checked></td>\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelecTModelId+'" name="row['+count+'][model_id]" class="form-control">\n' +
                                '                            <input readonly type="text" name="row['+count+'][model_name]" value="'+SelecTModelName+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="number" name="row['+count+'][qty]" placeholder="In Stock '+data.qty+' items" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="number" readonly name="row['+count+'][unit]" value="'+data.item.unit_price_with_tax+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="number" readonly name="row['+count+'][tol]" class="form-control">\n' +
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
    </script>

@endsection