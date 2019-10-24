<?php

    $ROWS_1 = DB::table('item_codes')
        ->select(DB::raw('sum(item_codes.opening_stock_qty*item_codes.unit_cost) as sum, count(item_codes.name) as items,item_codes.brand_id'))
        ->groupBy('item_codes.brand_id')
        ->get();

    $ROWS_2 = DB::table('stock_items')
            ->select(DB::raw('sum(stock_items.open_qty*stock_items.unit_price) as sum,count(stock_items.item_code_id) as items,stock_items.brand_id'))
            ->groupBy('stock_items.brand_id')
            ->get();

    $ROWS = $ROWS_1;

?>
@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard / Report / Open Stock Cost</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/report') }}" class="btn btn-success"> Back <i class="fa fa-backward"></i> </a>
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
                    <h3 class="box-title">Open Stock Cost</h3>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="open_stock_costs" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Row Label</th>
                            <th>Num of Items</th>
                            <th>Stock Value</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                            $SUM_VALUE = 0;
                            $SUM_ITEM = 0;
                        ?>
                        @foreach($ROWS as $row)
                            <tr>
                                <td>{!! \App\Models\Brand::find($row->brand_id)->name !!}</td>
                                <td>{!! $row->items !!}</td>
                                <td>{!! $row->sum !!}</td>
                                <?php
                                $SUM_VALUE = $SUM_VALUE+$row->sum;
                                $SUM_ITEM = $SUM_ITEM+$row->items;
                                ?>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total : </th>
                                <th>{!! $SUM_ITEM !!}</th>
                                <th>{!! $SUM_VALUE !!}</th>
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

@endsection
<!-- /main section -->

@section('js')

    <script src="{!! asset('js/table_export/fileSaver.js') !!}"></script>
    <script src="{!! asset('js/table_export/tableexport.js') !!}"></script>

    <script>
        $("#open_stock_costs").tableExport({
            headings: true,                    // (Boolean), display table headings (th/td elements) in the <thead>
            footers: true,                     // (Boolean), display table footers (th/td elements) in the <tfoot>
            formats: ["csv"],    // (String[]), filetypes for the export
            fileName:'id',                    // (id, String), filename for the downloaded file
            bootstrap: true,                   // (Boolean), style buttons using bootstrap
            position: "bottom",                 // (top, bottom), position of the caption element relative to table
            ignoreRows: null,                  // (Number, Number[]), row indices to exclude from the exported file(s)
            ignoreCols: null,                  // (Number, Number[]), column indices to exclude from the exported file(s)
            ignoreCSS: ".tableexport-ignore",  // (selector, selector[]), selector(s) to exclude from the exported file(s)
            emptyCSS: ".tableexport-empty",    // (selector, selector[]), selector(s) to replace cells with an empty string in the exported file(s)
            trimWhitespace: false              // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s)
        });
    </script>

@endsection
