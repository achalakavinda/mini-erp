@extends('layouts.admin')
@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Payment</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-app">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{!! url('accounting/payment') !!}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
        </a>
        <a href="{{ url('/accounting/invoice/create') }}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- /main header section -->
@endsection

<!-- main section -->
@section('main-content')
<div class="row">
    {!! Form::model($Payment, ['method' => 'PATCH', 'action' => ['Accounting\PaymentController@update',
    $Payment->id],'class'=>'form-horizontal']) !!}

    <div class="col-md-12">
        @include('error.error')
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <div class="box-body">
                <!-- invoice date -->
                <div class="col-md-12">



                    <!-- Table row -->
                    <div style="margin-top: 20px" class="row">
                        <div class="col-xs-12">
                            <table id="invoiceItemTable" class="table table-bordered">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>Invoice</th>
                                        <th>Total Amount (LKR)</th>
                                        <th>Amount (LKR)</th>
                                        <th>Due Amount (LKR)</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1 ;?>
                                    @foreach($Payment->items as $item)
                                    <?php
                                            $Invoice = \App\Models\Ims\Invoice::find($item->invoice_id);
                                        ?>
                                    <tr class="tr_{{ $count }}">
                                        <td>
                                            <input style="display:none" type="number" value="{{ $item->invoice_id }}"
                                                name="row[{{ $count }}][model_id]">
                                            <input readonly type="text" name="row[{{ $count }}][model_name]"
                                                value="{{ $Invoice->code }}" style="width: 100%">
                                        </td>
                                        <td>
                                            <input readonly style="width: 100%" type="text"
                                                name="row[{{ $count }}][total]" value="{{ $Invoice->total }}">
                                        </td>
                                        <td>
                                            <input onkeyup="calTol({{ $count }})" id="amount{{ $count }}" type="number"
                                                name="row[{{ $count }}][amount]" style="width: 100%;"
                                                value="{{ $item->amount }}">
                                        </td>
                                        <td>
                                            <input readonly id="due_amount{{ $count }}" type="number"
                                                name="row[{{ $count }}][due_amount]" value="{{ $item->due_amount }}"
                                                style="width: 100%;">
                                        </td>
                                        <td>
                                            <input id="remark{{ $count }}" type="text" name="row[{{ $count }}][remark]"
                                                value="{{ $item->remarks }}" style="width: 100%;">
                                        </td>
                                        <td>
                                            <a style="cursor: pointer" type="button"
                                                onclick="rowRemove('.tr_{{ $count }}')"><i class="fa fa-remove"></i></a>
                                        </td>
                                        {{--                                            <td>--}}
                                        {{--                                                <a  style="cursor: pointer" type="button" onclick="rowRemove('.tr_{{ $count }}')"><i
                                            class="fa fa-remove"></i></a>--}}
                                        {{--                                            </td>--}}
                                        <tr />

                                        <?php $count ++ ;?>
                                        @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            @include('layouts.selectors.accounting.invoice-dropdown.index')
                                        </th>
                                        <th><button id="addNewInvoiceItem" type="button" style="width: 100%"
                                                class="btn">Add</button></th>
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
                        <div class="col-xs-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Total:</th>
                                        <td><input style="width: 100%" id="total" name="total" type="text"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <div class="box-footer">

                <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>
                    Update</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- /.row -->
<!-- /main section -->
@endsection

@section('js')
<script>
    var table = $('#invoiceItemTable');
        var count = 0;
        var RawCount = 1;

        $( document ).ready(function() {

            $('#addNewInvoiceItem').click(function() {
                var SelecTModelId = $('#ModelSelectId').val();
                var SelecTModelName = $('#ModelSelectId option:selected').text();

                $.ajax('{!! url('api/invoice-for-payment') !!}/'+SelecTModelId, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {

                        if(data.invoice){

                            table.append('<tr class="tr_'+count+'">\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelecTModelId+'" name="row['+count+'][model_id]" >\n' +
                                '                            <input readonly type="text" name="row['+count+'][model_name]" value="'+SelecTModelName+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="total'+count+'" readonly type="number" name="row['+count+'][total]" value="'+data.invoice.total+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input onkeyup="calTol('+(count+1)+')" id="amount'+count+'"  type="number" name="row['+count+'][amount]" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input id="due_amount'+count+'"  type="number" readonly name="row['+count+'][due_amount]" value="'+data.due_amount+'" style="width: 100%">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  style="width: 100%" type="text" name="row['+count+'][remark]">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemove(\'.tr_'+count+'\','+count+')"><i class="fa fa-remove"></i></a>\n' +
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

        function rowRemove(value,i) {
            $('#total').val($("#total").val() - $("#amount"+i).val());
            $(value).remove();
        }

        function calTol(count) {
            let total = 0;
            
            for(let i=0; i<count; i++){
                total = total+parseFloat($('#amount'+i).val());
            }
            $('#total').val(total);
        }

</script>
@endsection