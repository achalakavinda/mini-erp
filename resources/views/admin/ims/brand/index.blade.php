@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Brand/Category</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/brand') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{{ url('/ims/item') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-table"></i> Item
            </a>
            <a href="{{ url('/ims/invoice') }}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-table"></i> Invoice
            </a>
            <a href="{{ url('/ims/brand/create') }}" class="btn btn-menu">
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
                            <th>Name</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Brands as $brand)
                            <tr>
                                <td>{!! $brand->id !!}</td>
                                <td>{!! $brand->name !!}</td>
                                <td>
                                    <a href="{!! url('ims/brand') !!}/{!! $brand->id !!}"><i
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
