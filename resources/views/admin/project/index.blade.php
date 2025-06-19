@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Projects</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/project/create') }}" class="btn btn-menu">
                <i  class="main-action-btn-danger fa fa-plus"></i> New
            </a>
        </div>
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection

@section('main-content')
    <!-- main section -->
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
    <!-- /main section -->
@endsection

@section('js')
    @include('layouts.components.dataTableJs.index')
@endsection
