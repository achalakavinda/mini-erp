@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard / Models</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/customer/create') }}" class="btn btn-success"> Customer <i class="fa fa-plus"></i> </a>
            <a href="{{ url('/brand/create') }}" class="btn btn-success"> Brand <i class="fa fa-plus"></i> </a>
            <a href="{{ url('/model/create') }}" class="btn btn-success"> Model <i class="fa fa-plus"></i> </a>
            <a href="{{ url('/invoice/create') }}" class="btn btn-success"> Invoice <i class="fa fa-plus"></i> </a>
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
                    <h3 class="box-title">Models</h3>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="dataTable" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Company</th>
                            <th>Model</th>
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

                            @foreach($Models as $model)
                                <tr>
                                    <td>{!! $model->id !!}</td>
                                    <td>
                                        <?php
                                            $brand = \App\Models\Brand::find($model->brand_id);
                                            if(!empty($brand)){echo $brand->name;}
                                        ?>
                                    </td>
                                    <td>{!! $model->name !!}</td>
                                    <td>{!! $model->description !!}</td>
                                    <td>{!! $model->unit_cost !!}</td>
                                    <td>{!! $model->selling_price !!}</td>
                                    <td>{!! $model->nbt_tax_percentage !!}%</td>
                                    <td>{!! $model->vat_tax_percentage !!}%</td>
                                    <td>{!! $model->unit_price_with_tax !!}</td>
                                    <td>{!! $model->opening_stock_qty !!}</td>
                                    <td><a class="btn btn-sm" href="{!! url('model') !!}/{!! $model->id !!}"><i class="fa fa-paper-plane"></i></a></td>
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

    <style type="text/css" href="{!! asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}"></style>
    <style type="text/css">
        .dataTables_filter{
            float: right;
        }
    </style>
    <script type="text/javascript" src="{!! asset('bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>

    <script type="text/javascript">
        $('#dataTable').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    </script>

@endsection