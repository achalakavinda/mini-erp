@extends('layouts.admin')

@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Project Table</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <!-- /.box-body -->

        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/project/create') }}" class="btn btn-app">
                <i  class="main-action-btn-danger fa fa-plus"></i> New
            </a>
        </div>
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
                                <th>B.Total Cost</th>
                                <th>B.Revenue</th>

                                <th>A.Total Cost</th>
                                <th>A.Revenue</th>

                                <th>Cost Variance</th>
                                <th>Recovery Ratio</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php $Projects = \App\Models\Project::all();?>

                        @foreach($Projects as $Project)
                           <tr>
                               <td>
                                   <a href="{{ url('/project') }}/{{ $Project->id }}">{{ $Project->code }}</a>
                               </td>
                               <td>
                                   <a href="{{ url('/customer') }}/{{ $Project->customer_id }}">{{ $Project->customer_name }}</a>
                               </td>
                               <td>{{ number_format($Project->budget_cost_by_work+$Project->budget_cost_by_work+$Project->budget_cost_by_overhead,2) }}</td>
                               <td>{{ number_format($Project->budget_revenue,2) }}</td>
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
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            })
        })
    </script>

@endsection
