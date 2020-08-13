@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
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
                            <th>Requisition ID</th>
                            <th>Date</th>
                            <th>Requested By</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($PurchaseRequisition as $requisition)
                        <tr>
                            <td>{!! $requisition->id !!}</td>
                            <td>{!! $requisition->date !!}</td>
                            <td><?php $User = \App\Models\User::find($requisition->user_id); if($User!=null){echo $User->name;}?>
                            </td>
                            <td>{!! $requisition->purchaseRequisitionStatus->name !!}</td>
                            <td><a style="padding: 10px"
                                    href="{!! url('ims/purchase-requisition') !!}/{!! $requisition->id !!}"><i
                                        class="fa fa-list"></i></a></td>
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
