@extends('layouts.admin')

@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Account Types</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{{ url('/accounting/account-type') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
        <a href="{{ url('/accounting/account-type/create') }}" class="btn btn-menu">
            <i class="main-action-btn-danger fa fa-plus"></i> New
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
                            <th>#ID</th>
                            <th>Main Account Type</th>
                            <th>Name</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($AccountTypes as $AccountType)
                        <tr>
                            <td>{!! $AccountType->id !!}</td>
                            <td>{!! $AccountType->mainAccountType ? $AccountType->mainAccountType->name : null!!}</td>
                            <td>{!! $AccountType->name !!}</td>
                            <td>
                                <a href="{!! url('accounting/account-type') !!}/{!! $AccountType->id !!}"><i
                                        class="fa fa-paper-plane"></i></a>
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