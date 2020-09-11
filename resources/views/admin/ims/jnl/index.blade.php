@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Journal</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('ims/jnl') !!}" class="btn">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{!! url('ims/jnl/create') !!}" class="btn">
                <i class="main-action-btn-danger fa fa-plus"></i> New
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection

@section('main-content')
    <!-- main section -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Journal No</th>
                            <th>PO. No</th>
                            <th>Customer</th>
                            <th>Payment Status</th>
                            <th style="text-align: right">Amount</th>
                            <th style="text-align: right">Discount</th>
                            <th style="text-align: right">Total</th>
                            <th style="text-align: right">Received Payment</th>
                            <th style="text-align: right">Due Amount</th>
                            <th style="text-align: right"><i class="fa fa-cogs"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Items as $item)
                            <tr>
                                <td>{!! $item->code !!}</td>
                                <td>{!! $item->purchase_order !!}</td>
                                <td>
                                    {{ $item->customer?$item->customer->name:'No Customer' }}
                                </td>
                                <td style="color: red;font-weight: bold">{!! $item->paymentStatus?strtoupper($item->paymentStatus->code):'No Payment Status' !!}</td>
                                <td style="text-align: right"> {!! number_format($item->amount,0) !!}</td>
                                <td style="text-align: right">{!! $item->discount !!}%</td>
                                <td style="text-align: right">{!! number_format( $item->total,2) !!}</td>
                                <td style="text-align: right">{!! number_format(0,2) !!}</td>
                                <td style="text-align: right">{!! number_format($item->total,2) !!}</td>
                                <td>
                                    <a style="padding: 10px" href="{!! url('ims/jnl') !!}/{!! $item->id !!}"><i class="fa fa-list"></i> Edit</a>
                                    <a style="padding: 10px" href="{!! url('accounting/payment/jnl/'.$item->id) !!}"><i class="fa fa-credit-card"></i> Make a Payment</a>
                                    <a target="_blank" style="padding: 10px" href="{!! url('ims/jnl') !!}/{!! $item->id !!}/print"><i class="fa fa-print"></i> Print</a>
                                </td>
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
    <!-- /main section -->
@endsection

@section('js')
    @include('layouts.components.dataTableJs.index')
@endsection
