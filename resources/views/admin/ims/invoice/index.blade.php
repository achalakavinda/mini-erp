@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Invoice</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('ims/invoice') !!}" class="btn btn-app">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{!! url('ims/invoice/create') !!}" class="btn btn-app">
                <i class="main-action-btn-danger fa fa-plus"></i> New
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Invoice No</th>
                            <th>PO. No</th>
                            <th>Customer</th>
                            <th>Dispatched Date</th>
                            <th>Delivery Method</th>
                            <th>Delivery Address</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Items as $item)
                            <tr>
                                <td>{!! $item->id !!}</td>
                                <td>{!! $item->invoice_no !!}</td>
                                <td>{!! $item->purchase_order !!}</td>
                                <td><?php $CM = \App\Models\Customer::find($item->customer_id); if($CM!=null){echo $CM->name;}?></td>
                                <td>{!! $item->dispatched_date !!}</td>
                                <td>by customer</td>
                                <td>{!! $item->delivery_address !!}</td>
                                <td>{!! $item->amount !!}</td>
                                <td>{!! $item->discount !!}</td>
                                <td>{!! $item->total !!}</td>
                                <td><a href="{!! url('ims/invoice') !!}/{!! $item->id !!}/print" class="btn btn-sm btn-danger">view</a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->


@section('js')
    @include('layouts.components.dataTableJs.index')
@endsection
