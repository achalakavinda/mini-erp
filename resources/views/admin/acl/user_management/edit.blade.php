@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard / Access Control / Permissions / Update</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/settings/access-control/permissions') }}" class="btn btn-success"> Back <i class="fa fa-backward"></i></a>
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
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Roles</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::model($User, ['method' => 'PATCH', 'action' => ['UserManagementController@update', $User->id],'class'=>'form-horizontal']) !!}
                    @include('error.error')
                    @include('admin.acl.user_management._partials.editForm')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('js')
    @include('error.swal')
@endsection

@section('model')

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Employees work report</h4>
                </div>
                <div class="modal-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Permission</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Premissions as $row)

                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection