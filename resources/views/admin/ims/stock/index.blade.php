<?php
    $Stocks = [];
    $Stocks = \Illuminate\Support\Facades\DB::table('stock_items')
        ->select(DB::raw('sum(stock_items.open_qty) as open_qty, sum(stock_items.qty) as qty , sum(stock_items.tol_qty) as tol_qty,stock_items.item_code_id'))
        ->where(['stock_items.company_division_id'=>1])
        ->groupBy('stock_items.item_code_id')
        ->get();
?>

@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Stock</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/') }}" class="btn btn-success"> back <i class="fa fa-backward"></i> </a>
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
                <div class="box-header">
                    <h3 class="box-title"> Stock </h3>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="StockSummery" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>Brand</th>
                            <th>Code</th>
                            <th>Qty</th>
                            <th>Open Stock Qty</th>
                            <th>Total Qty </th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($Stocks as $stock)
                            <?php
                            $CODE = \App\Models\ItemCode::find($stock->item_code_id);
                            $BRAND = \App\Models\Brand::find($CODE->brand_id);
                            ?>
                            <tr>
                                <td>
                                    {!! $BRAND->name !!}
                                </td>
                                <td>{!! $CODE->name !!}</td>
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

    <script src="{!! asset('js/table_export/fileSaver.js') !!}"></script>
    <script src="{!! asset('js/table_export/tableexport.js') !!}"></script>

    <script>
        $("#StockSummery").tableExport({
            headings: true,                    // (Boolean), display table headings (th/td elements) in the <thead>
            footers: true,                     // (Boolean), display table footers (th/td elements) in the <tfoot>
            formats: ["csv"],    // (String[]), filetypes for the export
            fileName:'id',                    // (id, String), filename for the downloaded file
            bootstrap: true,                   // (Boolean), style buttons using bootstrap
            position: "bottom",                 // (top, bottom), position of the caption element relative to table
            ignoreCSS: ".tableexport-ignore",  // (selector, selector[]), selector(s) to exclude from the exported file(s)
            emptyCSS: ".tableexport-empty",    // (selector, selector[]), selector(s) to replace cells with an empty string in the exported file(s)
            trimWhitespace: false              // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s)
        });
    </script>

@endsection

