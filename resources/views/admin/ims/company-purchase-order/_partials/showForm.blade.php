<div class="box-body">

    <!--Supplier-->
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Supplier') !!}
            {!!
            Form::select('supplier_id',\App\Models\Ims\Supplier::all()->pluck('name','id'),$CompanyPurchaseOrder->supplier_id,['id'=>'SupplierId','readonly'])
            !!}
        </div>
    </div> <!-- Supplier -->

    <!-- PO number-->
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('PO. No') !!}
            {!! Form::text('po_id',$CompanyPurchaseOrder->po_id,['id'=>'po_id','class'=>'form-control','readonly']) !!}
        </div>
    </div> <!-- /PO number -->

    <!--Location-->
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Location') !!}
            {!!
            Form::text('location',$CompanyPurchaseOrder->location,['id'=>'location','class'=>'form-control','readonly'])
            !!}
        </div>
    </div> <!-- Location -->

    <!--Delivery Address-->
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Delivery Address') !!}
            {!!
            Form::text('delivery_address',$CompanyPurchaseOrder->delivery_address,['id'=>'delivery_address','class'=>'form-control','readonly'])
            !!}
        </div>
    </div> <!-- Delivery Address -->

    <!--Delivery Date-->
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Delivery Date') !!}
            {!!
            Form::date('delivery_date',$CompanyPurchaseOrder->delivery_date,['id'=>'delivery_date','class'=>'form-control','readonly'])
            !!}
        </div>
    </div> <!-- Delivery Date -->



    <!-- Table row -->
    <div style="margin-top: 20px" class="row">
        <div class="col-xs-12">
            <table id="invoiceItemTable" class="table table-bordered">
                <thead>
                    <tr style="text-align: center">
                        <th>No</th>
                        <th>Item</th>
                        <th>QTY</th>
                        <th>Unit Price (LKR)</th>
                        <th>Total (LKR)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <?php $count = 1 ;?>
                    @foreach($CompanyPurchaseOrder->items as $item)
                    <tr class="tr_{{ $count }}">
                        <td>{{ $count }} <input style="display:none" name="row[{{ $count }}][insert]" type="checkbox"
                                checked></td>
                        <td>
                            <input style="display:none" type="number" value="{{ $item->item_code_id }}"
                                name="row[{{ $count }}][model_id]">
                            <input disabled type="text" name="row[{{ $count }}][model_name]"
                                value="<?php $Model = \App\Models\Ims\ItemCode::find($item->item_code_id); if($Model!=null){echo $Model->name;}?>"
                                style="width: 100%">
                        </td>

                        <td>
                            <input disabled onkeyup="calTol({{ $count }})" id="qty{{ $count }}" type="number"
                                name="row[{{ $count }}][qty]" style="width: 100%; text-align: right"
                                value="{{ $item->qty }}">
                        </td>
                        <td>
                            <input disabled id="price{{ $count }}" type="text" readonly name="row[{{ $count }}][unit]"
                                value="{{ number_format($item->price,2) }}" style="width: 100%;text-align: right">
                        </td>
                        <td>
                            <input disabled id="tol{{ $count }}" type="text" readonly name="row[{{ $count }}][tol]"
                                style="width: 100%;text-align: right"
                                value="{{ number_format(($item->qty * $item->price),2) }}">
                        </td>
                    </tr>

                    <?php $count ++ ;?>
                    @endforeach
                </tfoot>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


</div>
<!-- /.box-body -->