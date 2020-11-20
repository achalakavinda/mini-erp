@extends('layouts.admin')

@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Accounting</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{!! url('accounting') !!}" class="btn">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
        <a href="{!! url('accounting/create') !!}" class="btn">
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
                            <th>Account</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Opening Date</th>
                            <th>Opening Balance</th>
                            <th style="text-align: right">Debt</th>
                            <th style="text-align: right">Credit</th>
                            <th style="text-align: right"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($AccountItems as $entry)
                        <tr>
                            <td>{!! $entry !!}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
