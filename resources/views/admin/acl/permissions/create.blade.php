@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard / Access Control / Permissions / Create</h3>
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
                    <h3 class="box-title">Add Permission Type</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['action'=>'PermissionsController@store','class'=>'form-horizontal','id'=>'Form']) !!}
                    @include('error.error')
                    @include('admin.acl.permissions._partials.createForm')
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