@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Inventory Item</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/item') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{{ url('/ims/brand') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-table"></i> Brand
            </a>
            <a href="{{ url('/ims/invoice') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-table"></i> Invoice
            </a>
            <a href="{{ url('/ims/item/create') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-plus"></i> New Item
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
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Unit Cost (LKR)</th>
                            <th>Selling Price (LKR)</th>
                            <th>Market Price (LKR)</th>
                            <th>Min Price (LKR)</th>
                            <th>Max Price (LKR)</th>

                            <th>NBT %</th>
                            <th>VAT %</th>
                            <th>Unit Price With Taxes (LKR)</th>
                            <th>In Stock</th>
                            <th><i class="fa fa-plane"></i></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Items as $item)
                            <?php
                            $brand = \App\Models\Ims\Brand::find($item->brand_id);
                            $category = \App\Models\Ims\Category::find($item->category_id);
                            $STOCKITEM = DB::table('stock_items')
                                ->select(DB::raw('sum(stock_items.tol_qty) as qty'))
                                ->where(['stock_items.item_code_id'=>$item->id])
                                ->groupBy('stock_items.item_code_id')
                                ->first();
                            ?>
                            <tr>
                                <td>{!! $item->id !!}</td>
                                <td>{!! $brand?$brand->name:''; !!}</td>
                                <td>{!! $category?$category->name:''; !!}</td>
                                <td>{!! $item->name !!} {{ $item->description?' - '.$item->description:'' }}</td>

                                <td style="text-align: right">{!! number_format($item->unit_cost,2) !!}</td>
                                <td style="text-align: right">{!! number_format($item->selling_price,2) !!}</td>
                                <td style="text-align: right">{!! number_format($item->market_price,2) !!}</td>
                                <td style="text-align: right">{!! number_format($item->min_price,2) !!}</td>
                                <td style="text-align: right">{!! number_format($item->max_price,2) !!}</td>

                                <td style="text-align: right">{!! $item->nbt_tax_percentage !!}%</td>
                                <td style="text-align: right">{!! $item->vat_tax_percentage !!}%</td>
                                <td style="text-align: right">{!! number_format($item->unit_price_with_tax,2) !!}</td>
                                <td style="text-align: right">
                                    @if($STOCKITEM)
                                        {{ $STOCKITEM->qty }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td><a class="btn btn-sm" href="{!! url('ims/item') !!}/{!! $item->id !!}"><i class="fa fa-paper-plane"></i></a></td>
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
