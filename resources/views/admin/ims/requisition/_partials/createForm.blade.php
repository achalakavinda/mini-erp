<div class="box-body">

    <div class="col-md-12">
            <!-- requisition date -->
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('Requisition Date') !!}
                    {!! Form::date('date',\Carbon\Carbon::now(),['id'=>'RequisitionDate','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /requisition date -->

            <!-- purchase requisitions number-->
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('PR. No') !!}
                    {!! Form::text('purchase_requisitions',null,['id'=>'PurchaseRequisition','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /purchase requisitions number -->


            <!-- requisition item -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Select Item') !!}
                    {!! Form::select('item_code_id',\App\Models\ItemCode::all()->pluck('name','id'),null,['id'=>'ItemCodeId','class'=>'form-control']) !!}
                </div>
            </div>  <!-- /requisition item -->
            <div class="col-md-12">
                <div class="form-group">
                    <button id="addNewItem" type="button" class="btn btn-success btn-sm">Add</button>
                </div>
            </div>
    </div>

    <!-- requisition item table -->
    <div class="col-md-12">

        <table id="requisitionItemTable" class="table table-responsive table-bordered table-striped">
            <thead>
            <tr>
                <th>Item Code</th>
                <th>Item Description</th>
                <th>Price (LKR)</th>
                <th>Quantity</th>
                <th>Value</th>
                <th>Stock in Hand</th>
                <th><i class="fa fa-remove"></i></th>
            </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div><!-- requisition item table -->
    <hr/>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

@section('js')
    <script>

        var table = $('#requisitionItemTable');
        var count = 0;
        var RawCount = 1;

        $( document ).ready(function() {

        $('#addNewItem').click(function() {
                var SelecTItemId = $('#ItemCodeId').val();
                var SelecTModelName = $('#ItemCodeId option:selected').text();

                $.ajax('{!! url('api/item-code-for-purchase-requisitions') !!}/'+SelecTItemId, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {

                        if(data.item){
                            console.log(data);

                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelecTItemId+'" name="row['+count+'][item_code_id]" class="form-control">\n' +
                                '                            <input readonly type="text" name="row['+count+'][model_name]" value="'+SelecTModelName+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="row['+count+'][description]" readonly value="'+data.description+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="number" readonly name="row['+count+'][unit]" value="'+data.item.unit_price_with_tax+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="number" name="row['+count+'][qty]" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="number" readonly name="row['+count+'][value]" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                              <input  type="number" readonly name="row['+count+'][stock_in_hand]" value="'+data.qty+'" class="form-control">\n' +
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