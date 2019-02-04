@extends('layouts.admin')

@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
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
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Customer</th>
                                {{--<th>B.Work Hrs</th>--}}
                                {{--<th>B.Work Cost</th>--}}
                                {{--<th>B.AOH</th>--}}
                                {{--<th>B.Other Cost</th>--}}
                                <th>B.Total Cost</th>
                                <th>B.Revenue</th>

                                {{--<th>A.Work Hrs</th>--}}
                                {{--<th>A.Work Cost</th>--}}
                                {{--<th>A.AOH</th>--}}
                                {{--<th>A.Other Cost</th>--}}
                                <th>A.Total Cost</th>
                                <th>A.Revenue</th>

                                <th>Cost Variance</th>
                                <th>Recovery Ratio</th>
                                <th>Status</th>
                                <th>View <i class="fa fa-paper-plane"></i></th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php $Projects = \App\Models\Project::all();?>

                        @foreach($Projects as $Project)
                           <tr>
                                <td>{{ $Project->code }}</td>
                                <td>{{ $Project->customer_name }}</td>

                                {{--<td>{{ number_format($Project->budget_number_of_hrs,2) }}</td>--}}
                                {{--<td>{{ number_format($Project->budget_cost_by_work,2) }}</td>--}}
                                {{--<td>{{ number_format($Project->budget_cost_by_work,2) }}</td>--}}
                                {{--<td>{{ number_format($Project->budget_cost_by_overhead,2) }}</td>--}}
                                <td>{{ number_format($Project->budget_cost_by_work+$Project->budget_cost_by_work+$Project->budget_cost_by_overhead,2) }}</td>
                               <td>{{ number_format($Project->budget_revenue,2) }}</td>

                               {{--<td>{{ number_format($Project->actual_number_of_hrs,2) }}</td>--}}
                               {{--<td>{{ number_format($Project->actual_cost_by_work,2) }}</td>--}}
                               {{--<td>{{ number_format($Project->actual_cost_by_work,2) }}</td>--}}
                               {{--<td>{{ number_format($Project->actual_cost_by_overhead,2) }}</td>--}}
                               <td>{{ number_format($Project->actual_cost_by_work+$Project->actual_cost_by_work+$Project->actual_cost_by_overhead,2) }}</td>
                               <td>{{ number_format($Project->actual_revenue,2) }}</td>

                               @if($Project->close)
                                   <td>{!! number_format($Project->cost_variance,2)  !!}</td>
                                   <td>{!! number_format($Project->recovery_ratio,2)  !!}</td>
                               @else
                                   @include('admin.project.table.td')
                               @endif
                                <td><b>@if($Project->close)Closed @else Pending @endif</b></td>
                                <td>
                                    <a href="{{ url('/project') }}/{{ $Project->id }}"><i class="fa fa-paper-plane"></i></a>
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
