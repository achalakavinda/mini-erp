<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Invoice Details</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
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

            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Discount Percentage') !!}
                    {!! Form::number('discount_percentage',null,['id'=>'DiscountPercentage','class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Customer & Info</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
            <!-- invoice customer -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Customer') !!}
                    {!! Form::select('customer_id',\App\Models\Customer::all()->pluck('name','id'),null,['id'=>'CustomerId','class'=>'form-control']) !!}
                </div>
            </div>
            <!-- /invoice customer -->
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('Delivery Address') !!}
                    {!! Form::textarea('delivery_address',null,['id'=>'DeliveryAddress','class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('Customer Details') !!}
                    {!! Form::textarea('customer_detail',null,['id'=>'CustomerDetail','class'=>'form-control']) !!}
                </div>
            </div>
            <!-- invoice purchase order -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Delivery Method') !!}
                    {!! Form::select('delivery_method_id',['By Customer'],null,['id'=>'PoId','class'=>'form-control']) !!}
                </div>
            </div>

            <!-- special remarks -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Special Remarks') !!}
                    {!! Form::textarea('special_remarks',null,['id'=>'SpecialRemarks','class'=>'form-control']) !!}
                </div>
            </div><!-- special remarks -->

        </div>
    </div>
</div>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
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
                <tfoot>
                    <tr>
                        <th colspan="5">
                            <div class="form-group">
                                {!! Form::select('model_select_id',\App\Models\Ims\ItemCode::all()->pluck('name','id'),null,['id'=>'ModelSelectId','class'=>'form-control']) !!}
                            </div>
                        </th>
                        <th>
                            <button id="addNewItem" type="button" class="btn btn-success btn-sm">Add</button>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <!-- /.box -->
</div>
