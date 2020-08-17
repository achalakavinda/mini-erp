@extends('layouts.admin')


@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Settings </h3>
        </div>
        @include('admin.components.header-widgets.dashboard-header')
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection


@section('main-content')
    <!-- main section -->
    <div class="row">

        <div class="col-md-8">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Server Infos</h3>
                </div>
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>KEY</th>
                            <th>VALUE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><td>SERVER_ADDR</td><td>{!! request()->server('SERVER_ADDR'); !!}</td></tr>
                        <tr><td>REMOTE_ADDR</td><td>{!! request()->server('REMOTE_ADDR'); !!}</td></tr>
                        <tr><td>REMOTE_PORT</td><td>{!! request()->server('REMOTE_PORT'); !!}</td></tr>
                        <tr><td>REMOTE_PORT</td><td>{!! request()->server('REMOTE_PORT'); !!}</td></tr>
                        <tr><td>SERVER_SOFTWARE</td><td>{!! request()->server('SERVER_SOFTWARE'); !!}</td></tr>
                        <tr><td>SERVER_PROTOCOL</td><td>{!! request()->server('SERVER_PROTOCOL'); !!}</td></tr>
                        <tr><td>SERVER_PROTOCOL</td><td>{!! request()->server('SERVER_PROTOCOL'); !!}</td></tr>
                        <tr><td>HTTP_HOST</td><td>{!! request()->server('HTTP_HOST'); !!}</td></tr>
                        <tr><td>HTTP_CONNECTION</td><td>{!! request()->server('HTTP_CONNECTION'); !!}</td></tr>
                        <tr><td>HTTP_CACHE_CONTROL</td><td>{!! request()->server('HTTP_CACHE_CONTROL'); !!}</td></tr>
                        <tr><td>HTTP_ACCEPT_ENCODING</td><td>{!! request()->server('HTTP_ACCEPT_ENCODING'); !!}</td></tr>
                        <tr><td>HTTP_ACCEPT_LANGUAGE</td><td>{!! request()->server('HTTP_ACCEPT_LANGUAGE'); !!}</td></tr>
                        <tr><td>HTTP_ACCEPT_LANGUAGE</td><td>{!! request()->server('HTTP_ACCEPT_LANGUAGE'); !!}</td></tr>
                        <tr><td>REQUEST_TIME_FLOAT</td><td>{!! request()->server('REQUEST_TIME_FLOAT'); !!}</td></tr>
                        <tr><td>REQUEST_TIME</td><td>{!! request()->server('REQUEST_TIME'); !!}</td></tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </div>

        <!-- site configuration settings -->
        <div class="col-md-4">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Site Map</h3>
                </div>
                <div class="box-body">
                    <a  href="{!! url('/dashboard') !!}" class="btn btn-app">
                        <i class="fa fa-list"></i> Dashboard
                    </a>



                </div>
                <!-- /.box-body -->
            </div>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Access Control Configurations</h3>
                </div>
                <div class="box-body">
                    <a  href="{!! url('settings/access-control/permissions') !!}" class="btn btn-app">
                        <i class="fa fa-cogs"></i> Permissions
                    </a>
                    <a  href="{!! url('settings/access-control/roles/create') !!}" class="btn btn-app">
                        <i class="fa fa-cogs"></i> User Roles
                    </a>
                    <a  href="{!! url('settings/access-control/user-management') !!}" class="btn btn-app">
                        <i class="fa fa-cogs"></i> User Access Management
                    </a>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
        <!-- /site configuration settings -->
    </div>
    <!-- /main section -->
@endsection


@section('js')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
    {!! Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">
        'use strict'
        $(function () {
            $('#table').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });
            $('#tableServerInfo').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });
        })
    </script>
@endsection

