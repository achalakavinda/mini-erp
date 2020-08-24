@extends('layouts.admin')

@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Payments</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{!! url('accounting/payment') !!}" class="btn">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
        <a href="{!! url('accounting/payment/create') !!}" class="btn">
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
                            <th>Payment No</th>
                            <th>Payment Type</th>
                            <th>Date</th>
                            <th style="text-align: right">Total</th>
                            <th style="text-align: right"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Payments as $Payment)
                        <tr>
                            <td>{!! $Payment->code !!}</td>
                            <td>{!! $Payment->paymentType->code !!}</td>
                            <td>{!! $Payment->date !!}</td>
                            <td style="text-align: right">{!! number_format( $Payment->total,2) !!}</td>
                            <td>
                                <a style="padding: 10px"
                                    href="{!! url('accounting/payment') !!}/{!! $Payment->id !!}"><i
                                        class="fa fa-list"></i> Edit</a>
                                <a target="_blank" style="padding: 10px"
                                    href="{!! url('accounting/payment') !!}/{!! $Payment->id !!}/print"><i
                                        class="fa fa-print"></i> Print</a>
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