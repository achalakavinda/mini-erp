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

@section('main-content')
    <!-- row -->
    <div class="row">
        <div class="col-xs-12">
            <h1>Create a User</h1>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
