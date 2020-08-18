<div class="box-body">

    <div class="col-md-12">

        <div class="col-md-8"></div>
        <!--Date-->
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Date') !!}
                {!! Form::date('date',\Carbon\Carbon::now(),['id'=>'date','class'=>'form-control'])
                !!}
            </div>
        </div>
        <!--Date -->

        <div class="col-md-8"></div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="Requisition Date">Supplier</label>
                <select name="supplier_id" class="form-control" id="SupplierId">
                    <option value="">Select a Supplier</option>
                    @foreach(\App\Models\Ims\Supplier::all() as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>

    <!-- Table row -->
    <div style="margin-top: 20px" class="row">
        <div class="col-xs-12">
            <table id="invoiceItemTable" class="table table-bordered">
                <thead>
                    <tr style="text-align: center">
                        <th>No</th>
                        <th>Item</th>
                        <th>Remarks</th>
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
                        <th>@include('layouts.selectors.ims.item-dropdown.index')</th>
                        <th><button id="addNewItem" type="button" style="width: 100%" class="btn">Add</button></th>
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
    </div>
    <!-- /.row -->





</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>
        Submit</button>
</div>

@section('js')
<script>
    var table = $('#invoiceItemTable');
        var count = 0;
        var RawCount = 1;

        $( document ).ready(function() {

            $('#SupplierId').click(function() {
                var customer_id =$('#SupplierId').val();
                $.ajax('{!! url('api/supplier-for-invoices') !!}/'+supplier_id, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {
                        $('#SupplierDetail').val(data.address);
                        $('#Address').val(data.address);
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
                                '                            <input onkeyup="calTol('+(count+1)+')" id="qty'+count+'"  type="number" name="row['+count+'][qty]" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input onkeyup="calTol('+(count+1)+')" id="price'+count+'"  type="number"  name="row['+count+'][unit_price]" value="'+data.item.unit_price_with_tax+'" style="width: 100%">\n' +
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
            alert(value);
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