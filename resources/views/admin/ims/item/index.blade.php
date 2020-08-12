@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Item/Code</h3>
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
        <div class="col-xs-12">
            <div class="box">
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Company</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Unit Cost (LKR)</th>
                            <th>Selling Price (LKR)</th>
                            <th>NBT</th>
                            <th>VAT</th>
                            <th>Unit Price With Taxes (LKR)</th>
                            <th>In Stock</th>
                            <th><i class="fa fa-plane"></i></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Items as $item)
                            <tr>
                                <td>{!! $item->id !!}</td>
                                <td>
                                    <?php
                                    $brand = \App\Models\Ims\Brand::find($item->brand_id);
                                    if(!empty($brand)){echo $brand->name;}
                                    $STOCKITEM = DB::table('stock_items')
                                        ->select(DB::raw('sum(stock_items.tol_qty) as qty'))
                                        ->where(['stock_items.item_code_id'=>$item->id])
                                        ->groupBy('stock_items.item_code_id')
                                        ->first();
                                    ?>
                                </td>
                                <td>{!! $item->name !!}</td>
                                <td>{!! $item->description !!}</td>
                                <td style="text-align: right">{!! number_format($item->unit_cost,2) !!}</td>
                                <td style="text-align: right">{!! number_format($item->selling_price,2) !!}</td>
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
