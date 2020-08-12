<div class="box-body">

    <!-- requisition date -->
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Requision Date') !!}
            {!!
            Form::date('date',$Requisition->date,['readonly','id'=>'date','class'=>'form-control'])
            !!}
        </div>
    </div> <!-- /requisition date -->

    <!-- invoice purchase order -->
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Requested By') !!}
            {!!
            Form::text('user_id',$User =
            \App\Models\User::find($Requisition->user_id)->name,['readonly','id'=>'PurchaseOrder','class'=>'form-control'])
            !!}
        </div>
    </div> <!-- /invoice purchase order -->


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