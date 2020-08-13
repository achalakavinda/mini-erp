<div class="box-body">

    <div class="col-md-12">

        <div class="col-md-8">
        </div>
        <div class="col-md-4">
            <!-- invoice date -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Order Date') !!}
                    {!! Form::date('order_date',\Carbon\Carbon::now(),['readonly','id'=>'OrderDate','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice date -->

            <!-- invoice purchase order -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('PO. No') !!}
                    {!! Form::text('purchase_order',null,['readonly','id'=>'PurchaseOrder','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice purchase order -->

            <!-- invoice no -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Invoice No') !!}
                    {!! Form::text('invoice_no',null,['readonly','id'=>'InvoiceNo','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice No -->

            <!-- company vat no -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Our Vat No') !!}
                    {!! Form::text('company_vat_no','174928878-7000',['readonly','id'=>'CompanyVatNo','readonly','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /company vat no -->

            <!-- dispatched date -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Dispatched Date') !!}
                    {!! Form::date('dispatched_date',\Carbon\Carbon::now(),['readonly','id'=>'DispatchedDate','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice date -->

            <!-- invoice purchase order -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Delivery Method') !!}
                    {!! Form::select('delivery_method_id',['By Customer'],null,['readonly','id'=>'PoId','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice purchase order -->

            <!-- invoice customer -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Customer') !!}
                    {!! Form::select('customer_id',\App\Models\Customer::all()->pluck('name','id'),null,['readonly','id'=>'CustomerId','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /invoice customer -->

        </div>
    </div>

    <!-- /invoice address text area -->
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="form-group">
                 {!! Form::label('Delivery Address') !!}
                 {!! Form::textarea('delivery_address',null,['readonly','id'=>'DeliveryAddress','class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Customer Details') !!}
                {!! Form::textarea('customer_detail',null,['readonly','id'=>'CustomerDetail','class'=>'form-control']) !!}
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
            </tr>
            </thead>
            <tbody>

            @foreach(\App\Models\FinancialNotes\InvoiceItem::where('invoice_id',$Invoice->id)->get() as $item)
                <tr>
                    <td>{!! $item->id !!}</td>
                    <td><?php $Model = \App\Models\ItemCode::find($item->item_code_id); if($Model!=null){echo $Model->name;}?></td>
                    <td>{!! $item->qty !!}</td>
                    <td>{!! $item->price !!}</td>
                    <td>{!! $item->value !!}</td>
                </tr>
            @endforeach


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
                {!! Form::number('discount',null,['readonly','id'=>'DiscountPercentage','class'=>'form-control']) !!}
            </div>
        </div>
    </div> <!-- /discount  -->



    <!-- special remarks -->
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Special Remarks') !!}
            {!! Form::textarea('special_remarks',null,['readonly','id'=>'SpecialRemarks','class'=>'form-control']) !!}
        </div>
    </div><!-- special remarks -->


</div>
<!-- /.box-body -->