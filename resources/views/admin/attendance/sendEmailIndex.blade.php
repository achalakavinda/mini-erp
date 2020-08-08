@extends('layouts.admin')

@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Email Sender...</h3>
        </div>
    @include('admin.components.header-widgets.dashboard-header')
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
            @include('error.error')
            <!-- form start -->
                {!! Form::open(['action'=>'AttendanceController@sendEmailToMissingAttendance','class'=>'form-horizontal','id'=>'Form']) !!}
                <div class="box-footer">
                    {!! Form::submit('Send Report Missing Remind Mail',['class'=>'btn btn-info pull-right']) !!}
                </div>
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Send Mail</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $Count = 0;
                        ?>
                            @foreach($Rows as $row)
                                <?php $User = \App\Models\User::find($row['user_id']);?>
                                @continue(!$User)
                                <tr>
                                    <td>{!! $User->name !!}</td>
                                    <td>{!! $User->email !!}</td>
                                    <td>{!! $row['date'] !!}</td>
                                    <td>
                                        <input name="row[{!! $Count !!}][send]" type="checkbox" checked>
                                        <input style="display: none" type="number" name="row[{!! $Count !!}][user_id]" value="{!! $User->id !!}">
                                        <input style="display: none" type="text" name="row[{!! $Count !!}][email]" value="{!! $User->email !!}">
                                        <input style="display: none" type="text" name="row[{!! $Count !!}][date]" value="{!! $row['date'] !!}">
                                    </td>
                                    <?php $Count++;?>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                {!! Form::close() !!}

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


