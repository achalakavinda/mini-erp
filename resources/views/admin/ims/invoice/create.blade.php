@extends('layouts.admin')
@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Post Invoice</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-app">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{{ url('/ims/invoice/create') }}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
        <a href="{{ url('/ims/item') }}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-table"></i> Item
        </a>

        <a href="{{ url('/ims/invoice/create') }}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-plus"></i> New
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

    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a href="#classic-tab" data-toggle="tab" aria-expanded="false">Classic</a></li>
                <li><a class="active" href="#react-tab" data-toggle="tab" aria-expanded="true">React</a></li>
            </ul>
            <div class="tab-content">
                @include('error.error')

                <div class="tab-pane" id="classic-tab">

                    <div class="box-content">
                        {!!
                        Form::open(['action'=>'Ims\InvoiceController@store','class'=>'form-horizontal','id'=>'Form','ng-app'=>'xApp','ng-controller'=>'xAppCtrl'])
                        !!}
                        @include('error.error')
                        @include('admin.ims.invoice._partials.createForm')
                        {!! Form::close() !!}
                    </div>
                </div>

                <!-- /.tab-pane -->
                <div class="tab-pane  active" id="react-tab">
                    <div class="box-content">
                        <div id="invoice"></div>
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div><!-- end tab-content -->
        </div>
    </div>

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
            $('#CustomerId').click(function() {
                var customer_id =$('#CustomerId').val();
                $.ajax('{!! url('api/customer-for-invoices') !!}/'+customer_id, {
                    type: 'GET',  // http method
                    success: function (data, status, xhr) {
                        $('#CustomerDetail').val(data.address);
                        $('#DeliveryAddress').val(data.address);
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
                                '                            <input style="display:none" type="number" value="'+SelecTModelId+'" name="row['+count+'][model_id]" class="form-control">\n' +
                                '                            <input readonly type="text" name="row['+count+'][model_name]" value="'+SelecTModelName+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="number" onkeyup="calTol('+(count+1)+')" id="qty'+count+'" name="row['+count+'][qty]" placeholder="In Stock '+data.qty+' items" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="number" onkeyup="calTol('+(count+1)+')" id="price'+count+'" readonly name="row['+count+'][unit_price]" value="'+data.item.unit_price_with_tax+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  id="tol'+count+'" type="number" readonly name="row['+count+'][tol]" class="form-control">\n' +
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