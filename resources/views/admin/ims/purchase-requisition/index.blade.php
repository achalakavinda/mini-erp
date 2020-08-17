@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Purchase Requisition</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/purchase-requisition') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{{ url('/ims/purchase-requisition/create') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-plus"></i> New
            </a>
        </div>
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
                            <th>#Code</th>
                            <th>Date</th>
                            <th>Supplier</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($PurchaseRequisition as $requisition)
                            <tr>
                                <td>{!! $requisition->code !!}</td>
                                <td>{!! $requisition->date !!}</td>
                                <td></td>
                                <td><?php $User = \App\Models\User::find($requisition->created_by); if($User!=null){echo $User->name;}?>
                                </td>
                                <td>{!! $requisition->purchaseRequisitionStatus->name !!}</td>
                                <td style="text-align: right">{!! number_format($requisition->total,2) !!}</td>
                                <td>
                                    <a style="padding: 10px" href="{!! url('ims/purchase-requisition') !!}/{!! $requisition->id !!}"><i class="fa fa-list"></i></a>
                                    <a style="padding: 10px" href="{!! url('ims/purchase-requisition/'.$requisition->id.'/print') !!}"><i class="fa fa-print"></i></a>
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
