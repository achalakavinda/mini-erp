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
                                <th style="background-color: #0b93d5">Budget Hrs</th>
                                <th style="background-color: #0b93d5">Budget Cost</th>
                                <th style="background-color: #0b93d5">Budget Revenue</th>
                                <th style="background-color: #00a157">Actual Hrs</th>
                                <th style="background-color: #00a157">Actual Cost</th>
                                <th style="background-color: #00a157">Actual Revenue</th>
                                <th>Cost Variance</th>
                                <th>Recovery Ratio</th>
                                <th>status</th>
                                <th><i class="fa fa-paper-plane"></i></th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php $Rows = \App\Models\Project::all();?>

                        @foreach($Rows as $row)
                           <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->code }}</td>
                                <td>{{ $row->customer_name }}</td>
                                <td>{{ $row->budget_number_of_hrs }}</td>
                                <td>{{ $row->budget_cost }}</td>
                                <td>{{ $row->budget_revenue }}</td>
                                <td>{{ $row->actual_number_of_hrs }}</td>
                                <td>{{ $row->actual_cost_by_work+$row->actual_cost_by_overhead }}</td>
                                <td>{{ $row->actual_revenue }}</td>
                                <td>{{ $row->cost_variance }}</td>
                                <td>{{ $row->recovery_ratio }}</td>
                                <td><b>@if($row->close)Closed @else Pending @endif</b></td>
                                <td>
                                    <a href="{{ url('/project') }}/{{ $row->id }}"><i class="fa fa-paper-plane"></i></a>
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