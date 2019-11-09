@extends('layouts.admin')
<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Stock</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <!-- /.box-body -->

        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/brand') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{{ url('/ims/item') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-table"></i> Item
            </a>
            <a href="{{ url('/ims/invoice') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-table"></i> Invoice
            </a>
            {{--<a href="{{ url('/ims/stock/create') }}" class="btn btn-app">--}}
                {{--<i  class="main-action-btn-danger fa fa-plus"></i> New--}}
            {{--</a>--}}
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
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Brand</th>
                            <th>Qty</th>
                            <th>Open Stock Qty</th>
                            <th>Total Qty </th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($Stocks as $stock)
                            <?php
                            $CODE = \App\Models\Ims\ItemCode::find($stock->item_code_id);
                            $BRAND = \App\Models\Ims\Brand::find($CODE->brand_id);
                            ?>
                            <tr>
                                <td>{!! $CODE->name !!}</td>
                                <td>{!! $BRAND->name !!}</td>
                                <td>{!! $stock->qty !!}</td>
                                <td>{!! $stock->open_qty !!}</td>
                                <td>{!! $stock->tol_qty !!}</td>
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

