<div class="box-body">

    <!-- requisition date -->
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Requision Date') !!}
            {!!
            Form::date('date',$Requisition->date,['readonly','id'=>'date','class'=>'form-control'])
            !!}
        </div>
    </div> <!-- /requisition date -->


    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Requested By') !!}
            {!!
            Form::text('user_id',$User =
            \App\Models\User::find($Requisition->user_id)->name,['readonly','id'=>'PurchaseOrder','class'=>'form-control'])
            !!}
        </div>
    </div>

    @if ($Requisition->purchase_requisition_status_id == 1)
    <!-- PO number-->
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('PO. No') !!}
            {!! Form::text('po_id',null,['id'=>'po_id','class'=>'form-control']) !!}
        </div>
    </div> <!-- /PO number -->

    <!--Location-->
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Location') !!}
            {!! Form::text('location',null,['id'=>'location','class'=>'form-control']) !!}
        </div>
    </div> <!-- Location -->

    <!--Delivery Address-->
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Delivery Address') !!}
            {!! Form::text('delivery_address',null,['id'=>'delivery_address','class'=>'form-control']) !!}
        </div>
    </div> <!-- Delivery Address -->

    <!--Delivery Date-->
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Delivery Date') !!}
            {!! Form::date('delivery_date',\Carbon\Carbon::now(),['id'=>'delivery_date','class'=>'form-control']) !!}
        </div>
    </div> <!-- Delivery Date -->

    <!--Supplier-->
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Supplier') !!}
            {!!
            Form::select('supplier_id',\App\Models\Ims\Supplier::all()->pluck('name','id'),null,['id'=>'SupplierId'])
            !!}
        </div>
    </div> <!-- Supplier -->
    @endif
    <!-- invoice item table -->
    <div class="col-md-12">

        <table id="invoiceItemTable" class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Model</th>
                    <th>Qty</th>
                    <th>Unit Price (LKR)</th>
                    <th>Stock In Hand</th>
                </tr>
            </thead>
            <tbody>

                @foreach(\App\Models\Ims\PurchaseRequisitionItem::where('purchase_requisition_id',$Requisition->id)->get()
                as $item)
                <tr>
                    <td>{!! $item->id !!}</td>
                    <td><?php $Model = \App\Models\Ims\ItemCode::find($item->item_code_id); if($Model!=null){echo $Model->name;}?>
                    </td>
                    <td>{!! $item->qty !!}</td>
                    <td>{!! $item->price !!}</td>
                    <td>{!! $item->stock_in_hand !!}</td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div><!-- requisition item table -->



</div>
<!-- /.box-body -->