@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard / Requisition</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/requisition/create') }}" class="btn btn-success">Requisition <i class="fa fa-plus"></i> </a>
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
                    <h3 class="box-title">#Requisitions</h3>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="dataTable" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Item Code</th>
                            <th>Unit Of Measure</th>
                            <th>Item Description</th>
                            <th>Price (LKR)</th>
                            <th>Quantity</th>
                            <th>Value</th>
                            <th>Stock in Hand</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Items as $item)
                            <tr>
                                <td>{!! $item->id !!}</td>
                                <td>{!! $item->invoice_no !!}</td>
                                <td>{!! $item->purchase_order !!}</td>
                                <td><?php $CM = \App\Models\Customer::find($item->customer_id); if($CM!=null){echo $CM->name;}?></td>
                                <td>{!! $item->dispatched_date !!}</td>
                                <td>by customer</td>
                                <td>{!! $item->delivery_address !!}</td>
                                <td>{!! $item->amount !!}</td>
                                <td>{!! $item->discount !!}</td>
                                <td>{!! $item->total !!}</td>
                                <td><a href="{!! url('/requisition') !!}/{!! $item->id !!}" class="btn btn-sm btn-danger">view</a> </td>
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