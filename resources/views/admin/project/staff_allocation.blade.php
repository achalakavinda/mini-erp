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
        <div class="box-body">
            <a href="{{ url('/project') }}" class="btn btn-success">Go Back</a>
            <a href="{!! url('/project') !!}/{!! $Project->id !!}/staff" class="btn btn-info">Staff <i class="fa fa-plus-square"></i></a>
            <a href="{!! url('/project') !!}/{!! $Project->id !!}/budget-cost" class="btn btn-danger">Budget <i class="fa fa-plus-square"></i></a>
            <a href="{{ url('/project') }}/{!! $Project->id !!}/actual-cost" class="btn btn-danger">Actual Cost <i class="fa fa-money"></i></a>
        </div>
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
                <div class="box-header with-border">
                    <h3 class="box-title">Assign User</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::model($Project, ['method' => 'PATCH','action' => ['ProjectController@staffAllocationUpdate', $Project->id],'class'=>'form-horizontal','id'=>'Form']) !!}
                @include('error.error')
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

                <div class="box-footer">
                    {!! Form::submit('Submit',['class'=>'pull-right btn btn-primary']) !!}
                </div>

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
