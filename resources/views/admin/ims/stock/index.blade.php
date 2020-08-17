@extends('layouts.admin')
@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Stock</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/brand') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{{ url('/ims/item') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-table"></i> Item
            </a>
            <a href="{{ url('/ims/invoice') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-table"></i> Invoice
            </a>
            <a href="{{ url('/ims/stock/create') }}" class="btn btn-menu">
                <i  class="main-action-btn-danger fa fa-plus"></i> New
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
        <div class="col-md-6">
            <div class="box">
                <div style="overflow: auto" class="box-body">
                    <table id="table2" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>GRN</th>
                            <th>Invoice</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0;?>
                        @foreach($StockBatch as $stock)
                            <tr>
                                <td>{!! $stock->code !!}</td>
                                <td>{!! $stock->is_open_stock !!}</td>
                                <td>{!! $stock->created_date !!}</td>
                                <td>
                                    @if($stock->grn_id)
                                        <a target="_blank" href="{{ url('ims/grn/'.$stock->grn_id) }}">View</a>
                                    @endif
                                </td>
                                <td>
                                    @if($stock->invoice_id)
                                        <a target="_blank" href="{{ url('ims/invoice/'.$stock->invoice_id) }}">View</a>
                                    @endif
                                </td>
                                <td style="text-align: right">{!! number_format($stock->total, 2) !!}/=</td>
                                <?php $total = $total + $stock->total;?>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="5" style="text-align: right">Total Inventory :</th>
                            <th style="text-align: right">{{ number_format($total, 2) }}/=</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-6">
            <div class="box">
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Brand</th>
                            <th>Stock Qty</th>
                            <th>Total Inventory</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $total = 0;?>
                        @foreach($Stocks as $stock)
                            <?php
                            $CODE = \App\Models\Ims\ItemCode::find($stock->item_code_id);
                            $BRAND = \App\Models\Ims\Brand::find($CODE->brand_id);
                            ?>
                            <tr>
                                <td>{!! $CODE->name !!}</td>
                                <td>{!! $BRAND->name !!}</td>
                                <td style="text-align: right">{!! $stock->tol_qty !!}</td>
                                <td style="text-align: right">{!! number_format($stock->total, 2) !!}/=</td>
                                <?php $total = $total + $stock->total;?>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <th colspan="3" style="text-align: right"></th>
                            <th style="text-align: right">{{ number_format($total, 2) }}/=</th>
                        </tr>
                        </tfoot>

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
    <script type="text/javascript">
        'use strict'
        $(function () {
            $('#table2').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });
        })
    </script>
@endsection
