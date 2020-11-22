@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Company Purchase Requisition Order</h3>
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

            {{--        {!! Form::open(['method' => 'DELETE','route' => ['purchase-requisition.destroy', $Requisition->id]]) !!}--}}
            {{--        <button type="submit" class="btn btn-app pull-right" style="color: #ff0000"><i style="color: #ff0000"--}}
            {{--                                                                                       class="fa fa-recycle"></i> Delete</button>--}}
            {{--        {!! Form::close() !!}--}}
        </div>
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection

@section('main-content')
    <div class="row">
        {!! Form::model($Requisition, ['method' => 'PATCH', 'action' => ['Ims\PurchaseRequisitionController@update',$Requisition->id],'class'=>'form-horizontal']) !!}
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
                                <input id="RequisitionDate" class="form-control" name="date" type="date"
                                       value="{{$Requisition->date}}">
                            </div>
                        </div> <!-- /requisition date -->
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-8"></div>
                        <!-- requisition date -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Requisition Date">Supplier</label>
                                <select name="supplier_id" class="form-control">
                                    <option value="">Select a Supplier</option>
                                    @foreach(\App\Models\Ims\Supplier::all() as $supplier)
                                        <option @if($Requisition->supplier_id === $supplier->id) selected @endif
                                        value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
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
                                        <input style="display:none" type="number" value="{{ $item->id }}"
                                               name="row[{{ $count }}][item_code_id]">
                                        <input style="width: 100%" readonly="" type="text"
                                               name="row[{{ $count }}][model_name]" value="{{ $item->item_code }}">
                                    </td>
                                    <td>
                                        <input style="width: 100%" type="text" name="row[{{ $count }}][remark]"
                                               value="{{ $item->remarks }}">
                                    </td>
                                    <td>
                                        <input style="text-align: right; width: 100%" id="qty{{ $count }}" type="number"
                                               onkeyup="calTol({{ $count+1 }})" name="row[{{ $count }}][qty]"
                                               value="{{ $item->qty }}">
                                    </td>
                                    <td>
                                        <input style="text-align: right; width: 100%" id="price{{ $count }}" type="number"
                                               onkeyup="calTol({{ $count+1 }})" name="row[{{ $count }}][unit_price]"
                                               value="{{ $item->unit_price }}">
                                    </td>
                                    <td>
                                        <input style="text-align: right;width: 100%" id="tol{{ $count }}" type="number"
                                               readonly="" name="row[{{ $count }}][total]"
                                               value="{{ $item->qty*$item->unit_price }}">
                                    </td>
                                    <td>
                                        <a style="cursor: pointer" type="button" onclick="rowRemove('.tr_{{ $count }}')"><i
                                                class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                                <?php $count++?>
                            @endforeach
                            </tbody>
                            @if (!$Requisition->posted_to_po)
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
                                        <button id="addNewItem" style="width: 100%" type="button" class="btn">Add</button>
                                    </th>
                                </tr>
                                </tfoot>
                            @endif

                        </table>
                    </div><!-- requisition item table -->
                    <hr />
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    @if (!$Requisition->posted_to_po)
                        <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>
                            Update</button>

                    @endif
                    <a target="_blank" href="{{ url('ims/purchase-requisition') }}/{{ $Requisition->id }}/print"
                       class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-print"></i>Print</a>

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
                let selectItemId = $('#ModelSelectId').val();
                let selectItemCodeName = $('#ModelSelectId option:selected').text();
                $('#postToPurchaseBtn').fadeOut();

                $.ajax('{!! url('api/item-code') !!}/'+selectItemId+'/stock', {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {
                        if(data && data.length === 1){
                            data = data[0];
                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+selectItemId+'" name="row['+count+'][item_code_id]">\n' +
                                '                            <input style="width: 100%" readonly type="text" name="row['+count+'][model_name]" value="'+selectItemCodeName+'">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="width: 100%"  type="text" name="row['+count+'][remark]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="text-align: right; width: 100%" id="qty'+count+'"  type="number" onkeyup="calTol('+(RawCount)+')" name="row['+count+'][qty]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="text-align: right; width: 100%" id="price'+count+'"  type="number" onkeyup="calTol('+(RawCount)+')" name="row['+count+'][unit_price]" value="'+data.unit_price_with_tax+'">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input style="text-align: right; width: 100%" id="tol'+count+'"  type="number" readonly name="row['+count+'][total]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemove(\'.tr_'+count+'\')"><i class="fa fa-remove"></i></a>\n' +
                                '                        </td>\n' +
                                '                    <tr/>');
                            count++;
                            RawCount++;
                        }else{
                            alert('some error has occurred..., please try again!');
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert('some error has occurred..., please try again!');
                        console.error(errorMessage);
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
