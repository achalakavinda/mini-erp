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
                "dom": 'Blfrtip',
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],     // page length options
            })
        })
    </script>

@endsection

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard / Access Control / Permissions</h3>
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
                    <h3 class="box-title"> Permission Types </h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <a href="{{ url('/settings/access-control/roles/create') }}" class="btn btn-sm btn-danger"><i class="fa fa-plus-square"></i> Roles</a>
                    <a href="{{ url('/settings/access-control/user-management/create') }}" class="btn btn-sm btn-danger"><i class="fa fa-plus-square"></i> User Controls</a>
                </div>

                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr data-entry-id="{{ $permission->id }}">
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
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

