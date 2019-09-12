@extends('layouts.admin')

@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection

@section('js')
    {!! Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
    <script type="text/javascript">

        $(function () {
            $('#table').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            })
        })
    </script>

@endsection

<!-- main header section -->
@section('main-content-header')
   @include('layouts.selectors.ims.header-widgets.header')
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Items</h3>
                </div>
                <!-- /.box-header -->
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