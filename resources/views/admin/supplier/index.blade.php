@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Suppliers</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-app">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{!! url('supplier') !!}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
        <a href="{!! url('supplier/create') !!}" class="btn btn-app">
            <i class="main-action-btn-danger fa fa-plus"></i> New
        </a>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
<!-- /main header section -->

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div id="supplierTable" style="overflow: auto" class="box-body">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ mix('js/supplier.js') }}"></script>
@endsection
