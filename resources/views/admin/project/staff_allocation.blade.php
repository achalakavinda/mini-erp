@extends('layouts.admin')
@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection
<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Project | {!! $Project->code !!}</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <!-- /.box-body -->
            <div class="box-body">
                <a href="{!! url('/project') !!}/{!! $Project->id !!}" class="btn btn-app">
                    <i  class="main-action-btn-info fa fa-arrow-left"></i> Go Back
                </a>
                <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                    <i class="main-action-btn-info fa fa-list"></i> Quick Menu
                </a>
                <a href="{!! url('/project') !!}/{!! $Project->id !!}/staff" class="btn btn-app">
                    <i class="main-action-btn-info fa fa-refresh"></i> Refresh
                </a>
                <a href="{!! url('/project') !!}/{!! $Project->id !!}/budget-cost" class="btn btn-app">
                    <i class="main-action-btn-info fa fa-table"></i> Budget
                </a>
                <a href="{{ url('/project') }}/{!! $Project->id !!}/actual-cost" class="btn btn-app">
                    <i  class="main-action-btn-info fa fa-table"></i> Actual Cost
                </a>
            </div>
        <!-- /.box -->
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">

                <!-- form start -->
                {!! Form::model($Project, ['method' => 'PATCH','action' => ['ProjectController@staffAllocationUpdate', $Project->id],'class'=>'form-horizontal','id'=>'Form']) !!}
                <div class="box-body">
                @include('error.error')
                <button type="submit" class="btn btn-app"><i style="color: #00a157" class="fa fa-save"></i> Save </button>
                </div>
                    <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <table id="table" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Emp No</th>
                                    <th>Name</th>
                                    <th>Assign</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count = 0;
                                ?>
                                @foreach(\App\Models\User::all() as $user)
                                    <tr>
                                        <td>{{ $user->emp_no }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <?php
                                                $ProjectStaff = \App\Models\ProjectEmployee::get()->where('project_id',$Project->id)->where('user_id',$user->id)->first();
                                            ?>
                                            {!! Form::number('items['.$count.'][project_id]',$Project->id,['style'=>'display:none']) !!}
                                            {!! Form::number('items['.$count.'][user_id]',$user->id,['style'=>'display:none']) !!}
                                            {!! Form::checkbox('items['.$count.'][assigned]',1,$ProjectStaff?true:false) !!}
                                        </td>
                                    </tr>
                                    <?php
                                        $count++;
                                    ?>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('js')
    {!! Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
    @include('error.swal')

    <script type="text/javascript">

        $(function () {
            $('#table').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            })
        })
    </script>

@endsection
