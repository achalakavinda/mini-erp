@extends('layouts.admin')

@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Work Sheet</h3>
        </div>

        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a href="{!! url('work-sheet') !!}" class="btn btn-app">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('work-sheet/create') !!}" class="btn btn-app">
                <i class="main-action-btn-danger fa fa-plus"></i> New
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
                            <th>Date</th>
                            <th>Employee</th>
                            <th>Project</th>
                            <th>Company</th>
                            <th>From</th>
                            <th>To</th>
                            <th>No of Hrs</th>
                            <th>Cost</th>
                            <th>view</th>
                            @can(config('constant.Permission_Work_Sheet_Update'))
                                <th><i class="fa fa-cogs"></i></th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($WorkSheet as $row)

                            <?php
                                $Customer_name = "";
                                $Project_name = "";
                                $Staff_name = "";
                                $customer  = \App\Models\Customer::find($row->customer_id);
                                $project  = \App\Models\Project::find($row->project_id);
                                $user = \App\Models\User::find($row->user_id);

                                if(!empty($customer)){
                                    $Customer_name = '<a href="'.url('customer').'/'.$row->customer_id.'">'.$customer->name.'</a>';
                                }
                                if(!empty($project)){
                                    $Project_name = '<a href="'.url('project').'/'.$row->project_id.'">'.$project->code.'</a>';
                                }
                                if(!empty($user)){
                                    $Staff_name = '<a href="'.url('staff/profile').'/'.$row->user_id.'">'.$user->name.'</a>';
                                }
                            ?>

                            <tr>
                                <td>{!! $row->date !!}</td>
                                <td>{!! $Staff_name !!}</td>
                                <td>{!! $Project_name !!}</td>
                                <td>{!! $Customer_name !!}</td>
                                <td>{!! \Carbon\Carbon::parse($row->from)->format('h:i a') !!}</td>
                                <td>{!! \Carbon\Carbon::parse($row->to)->format('h:i a') !!}</td>
                                <td><?php if($row->work_hrs<0){echo "<i style='color:red'>Leave</i>";}else{echo number_format($row->work_hrs,2);}?></td>
                                <td>{!! number_format($row->hr_cost,2) !!}</td>
                                <td></td>
                                @can(config('constant.Permission_Work_Sheet_Update'))
                                    <th>
                                        {!! Form::open(['action'=>'WorkSheetController@delete','class'=>'form-horizontal','id'=>'Form']) !!}
                                            <input name="work_sheet_id" value="{{ $row->id }}" style="display: none">
                                            <button type="submit" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash"></i></button>
                                        {!! Form::close() !!}
                                    </th>
                                @endcan
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