@extends('layouts.admin')
<!-- main header section -->
@section('main-content-header')
   <!-- Default box -->
   <div class="box">
       <div class="box-header with-border">
           <h3 class="box-title">Item</h3>
       </div>
   @include('layouts.components.header-widgets.dashboard-header')
   <!-- /.box-body -->
       <div class="box-body">
           <a onclick="showMegaMenu()" href="#" class="btn btn-app">
               <i class="main-action-btn-info fa fa-list"></i> Quick Menu
           </a>
           <a href="{{ url('/ims/item') }}" class="btn btn-app">
               <i  class="main-action-btn-info fa fa-refresh"></i> Refresh
           </a>
           <a href="{{ url('/ims/brand') }}" class="btn btn-app">
               <i  class="main-action-btn-info fa fa-table"></i> Brand
           </a>
           <a href="{{ url('/ims/invoice') }}" class="btn btn-app">
               <i  class="main-action-btn-info fa fa-table"></i> Invoice
           </a>
           <a href="{{ url('/ims/item/create') }}" class="btn btn-app">
               <i  class="main-action-btn-danger fa fa-plus"></i> New
           </a>
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
                            <th>#ID</th>
                            <th>Company</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Unit Cost (LKR)</th>
                            <th>Selling Price (LKR)</th>
                            <th>NBT</th>
                            <th>VAT</th>
                            <th>Unit Price With Taxes (LKR)</th>
                            <th>Open Stock</th>
                            <th><i class="fa fa-cogs"></i></th>
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
                                        ?>
                                    </td>
                                    <td>{!! $item->name !!}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>{!! $item->unit_cost !!}</td>
                                    <td>{!! $item->selling_price !!}</td>
                                    <td>{!! $item->nbt_tax_percentage !!}%</td>
                                    <td>{!! $item->vat_tax_percentage !!}%</td>
                                    <td>{!! $item->unit_price_with_tax !!}</td>
                                    <td>{!! $item->opening_stock_qty !!}</td>
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
@endsection
<!-- /main section -->
@section('js')
    @include('layouts.components.dataTableJs.index')
@endsection