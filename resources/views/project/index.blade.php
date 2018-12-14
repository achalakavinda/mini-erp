@extends('layouts.admin')

@section('style')
    {!! Html::style('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection

@section('js')
    {!! Html::script('bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">

        $(function () {
            $('#table').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })
        })
    </script>

@endsection

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Projects</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/project') }}" class="btn btn-success">Project</a>
            <a href="{{ url('/project/create') }}" class="btn btn-success">New</a>
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
                    <h3 class="box-title">Projects</h3>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Code</th>
                            <th>Customer</th>
                            <th>Number OF Hrs</th>
                            <th>Budget</th>
                            <th>Quoted</th>
                            <th>Cost</th>
                            <th>Revenue</th>
                            <th>Recovery Ratio</th>
                            <th>status</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $Rows = \App\Models\Project::all();?>

                        @foreach($Rows as $row)
                            <?php
                            $Customer="";
                            $CM = \App\Models\Customer::find($row->customer_id );
                            if(!empty($CM)){
                                $Customer = $CM->name;
                            }
                            ?>
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->code }}</td>
                                <td>{{ $Customer }}</td>
                                <td>{{ $row->number_of_hrs }}</td>
                                <td>{{ $row->budget_cost }}</td>
                                <td>{{ $row->quoted_price }}</td>
                                <td>{{ $row->actual_cost }}</td>
                                <td>{{ $row->revenue }}</td>
                                <td>{{ $row->recovery_ratio }}</td>
                                <td>{{ $row->close }}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{ url('/project') }}/{{ $row->id }}">view</a>
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