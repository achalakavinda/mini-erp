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
            <h3 class="box-title">Dashboard / Access Control / Roles</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/settings') }}" class="btn btn-success"> Settings</a>
            <a href="{{ url('/settings/access-control') }}" class="btn btn-success"> Access Control</a>
            <a href="{{ url('/settings/access-control/permissions') }}" class="btn btn-success"> Permissions</a>
            <a href="{{ url('/settings/access-control/roles') }}" class="btn btn-success"> Roles</a>
            <a href="{{ url('/settings/access-control/user-management') }}" class="btn btn-success"> User Management</a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <!-- row -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Roles </h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <a href="{{ url('/settings/access-control/roles/create') }}" class="btn btn-sm btn-danger"><i class="fa fa-plus-square"></i> New</a>
                    <a href="{{ url('/settings/access-control/permissions/create') }}" class="btn btn-sm btn-danger"><i class="fa fa-plus-square"></i> Permission</a>
                    <a href="{{ url('/settings/access-control/user-management/create') }}" class="btn btn-sm btn-danger"><i class="fa fa-plus-square"></i> User Controls</a>
                </div>

                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($Roles as $role)
                            <tr data-entry-id="{{ $role->id }}">
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{!! url('/settings/access-control/roles') !!}/{{ $role->id }}/edit">Edit <i class="fa fa-paper-plane"></i></a>
                                </td>
                                    {{--{!! Form::model($permission, ['method' => 'PATCH', 'action' => ['PermissionsController@update', $permission->id],'class'=>'form-horizontal']) !!}--}}
                                    {{--{!! Form::text('set_delete',"value",['style'=>'display:none']) !!}--}}
                                        {{--<a style="position:relative;display: block" type="submit" ><i class="fa fa-trash"></i></a>--}}
                                    {{--{!! Form::close() !!}--}}
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

