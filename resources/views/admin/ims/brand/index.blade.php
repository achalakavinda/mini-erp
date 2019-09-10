@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard / Brands</h3>
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
                    <h3 class="box-title">Brands</h3>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="dataTable" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th><i class="fa fa-cogs"></i></th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Brands as $brand)

                            <tr>
                                <td>{!! $brand->id !!}</td>
                                <td>{!! $brand->name !!}</td>
                                <td>
                                    {!! Form::model($brand, ['method' => 'PATCH', 'action' => ['BrandController@update', $brand->id],'class'=>'form-horizontal']) !!}
                                        {!! Form::text('set_delete',"value",['style'=>'display:none']) !!}
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    {!! Form::close() !!}
                                </td>
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