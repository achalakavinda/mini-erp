@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Requisition</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/purchase-requisition') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Requisitions
            </a>
            <a href="{{ url('/ims/purchase-requisition/create') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-plus"></i> New
            </a>
            @if ($Requisition->purchase_requisition_status_id == 1)
                <a onclick="postToPurchase()" id="postToPurchaseBtn" class="btn btn-menu">
                    <i class="main-action-btn-info fa fa-save"></i> Post To Purchase
                </a>
                {!! Form::open(['action'=>'Ims\PurchaseRequisitionController@postToPurchase','style'=>'display:none','id'=>'postToPurchase']) !!}
                    @csrf()
                    <input type="hidden" value="{{ $Requisition->id }}" name="requisition_id">
                {{ Form::close() }}
            @endif
        </div>
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection

@section('main-content')
    <div class="row">
        {!! Form::model($Requisition, ['method' => 'PATCH', 'action' => ['Ims\PurchaseRequisitionController@update', $Requisition->id],'class'=>'form-horizontal']) !!}
        <div class="col-md-12">
        @include('error.error')
        <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="col-md-8"></div>
                        <!-- requisition date -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Requisition Date">Requisition Date</label>
                                <input id="RequisitionDate" class="form-control" name="date" type="date" value="{{$Requisition->date}}">
                            </div>
                        </div> <!-- /requisition date -->
                    </div>

                    <!-- requisition item table -->
                    <div class="col-md-12">
                        <table id="requisitionItemTable" class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Remark</th>
                                <th>QTY</th>
                                <th>Unit Price (LKR)</th>
                                <th>Total (LKR)</th>
                                <th><i class="fa fa-remove"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 0?>
                            @foreach($Requisition->items as $item)
                                <tr class="tr_{{ $count }}">
                                    <td>
                                        <input style="display:none" type="number" value="{{ $item->id }}" name="row[{{ $count }}][item_code_id]" class="form-control">
                                        <input readonly="" type="text" name="row[{{ $count }}][model_name]" value="{{ $item->item_code }}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="row[{{ $count }}][remark]" value="{{ $item->remarks }}" class="form-control">
                                    </td>
                                    <td>
                                        <input style="text-align: right" id="qty{{ $count }}" type="number" onkeyup="calTol({{ $count+1 }})" name="row[{{ $count }}][qty]" value="{{ $item->qty }}" class="form-control">
                                    </td>
                                    <td>
                                        <input style="text-align: right" id="price{{ $count }}" type="number" onkeyup="calTol({{ $count+1 }})" name="row[{{ $count }}][unit_price]" value="{{ $item->unit_price }}" class="form-control">
                                    </td>
                                    <td>
                                        <input  style="text-align: right" id="tol{{ $count }}" type="number" readonly="" name="row[{{ $count }}][total]" value="{{ $item->qty*$item->unit_price }}" class="form-control">
                                    </td>
                                    <td>
                                        <a style="cursor: pointer" type="button" onclick="rowRemove('.tr_{{ $count }}')"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                                <?php $count++?>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>
                                    <!-- requisition item -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!!  Form::select('item_code_id',\App\Models\Ims\ItemCode::all()->pluck('name','id'),null,['id'=>'ItemCodeId','class'=>'form-control']) !!}
                                        </div>
                                    </div> <!-- /requisition item -->
                                </th>
                                <th>
                                    <button id="addNewItem" style="width: 100%" type="button" class="btn">Add</button>
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- requisition item table -->
                    <hr />
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-print"></i> Print</button>
                    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i> Update</button>
                </div>
            </div>
            <!-- /.box -->
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.row -->
@endsection

@section('js')
    <script>
        function postToPurchase() {
            if(confirm("Are you want post requisition to create a Purchase Order")){
                $('#postToPurchase').submit();
            }
        }

        function postToGRN() {
            $('#postToGRN').submit();
        }

        var table = $('#requisitionItemTable');
        var count = parseInt({{ $count }});
        var RawCount = parseInt({{ $count+1 }});

        $( document ).ready(function() {

            $('#addNewItem').click(function() {
                var SelecTItemId = $('#ItemCodeId').val();
                var SelecTModelName = $('#ItemCodeId option:selected').text();
                $('#postToPurchaseBtn').fadeOut();

                $.ajax('{!! url('api/item-code-for-purchase-requisitions') !!}/'+SelecTItemId, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {
                        if(data.item){
                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelecTItemId+'" name="row['+count+'][item_code_id]" class="form-control">\n' +
                                '                            <input readonly type="text" name="row['+count+'][model_name]" value="'+SelecTModelName+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="row['+count+'][remark]" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="text-align: right" id="qty'+count+'"  type="number" onkeyup="calTol('+(RawCount)+')" name="row['+count+'][qty]" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="text-align: right" id="price'+count+'"  type="number" onkeyup="calTol('+(RawCount)+')" name="row['+count+'][unit_price]" value="'+data.item.unit_price_with_tax+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="text-align: right" id="tol'+count+'"  type="number" readonly name="row['+count+'][total]" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemove(\'.tr_'+count+'\')"><i class="fa fa-remove"></i></a>\n' +
                                '                        </td>\n' +
                                '                    <tr/>');
                            count++;
                            RawCount++;
                            $('#ItemCodeId option:selected').remove();
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
        }
    </script>
@endsection
