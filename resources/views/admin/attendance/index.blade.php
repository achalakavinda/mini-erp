@extends('layouts.admin')

@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Attendance</h3>
        </div>
    @include('admin.header-widgets.dashboard-header')
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
                <div class="box-header">
                    <form>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('from','From',['class' => 'control-label']) !!}
                                {!! Form::date('from',\Carbon\Carbon::now(),['class'=>'form-control','id'=>'name']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('to','To',['class' => 'control-label']) !!}
                                {!! Form::date('to',\Carbon\Carbon::now(),['class'=>'form-control','id'=>'name']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('button','Check',['class' => 'control-label']) !!}
                                <button class="form-control">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Work Type</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($dateArray as $dateItem)
                               @foreach($Users as $user)
                                   <?php
                                        $Works = \App\Models\WorkSheet::where('user_id',$user->id)->where('date',$dateItem)->get();
                                   ?>
                                   <tr>
                                       <td>{!! $user->name !!}</td>
                                       <td>{!! $user->email !!}</td>
                                       <td>{!! $dateItem !!}</td>
                                       <td>
                                            @foreach($Works as $work)
                                                {!! $work->work_code !!},
                                           @endforeach
                                           @if($Works->isEmpty())
                                                <span style="color: red">Missing</span>
                                           @endif
                                       </td>
                                   </tr>
                               @endforeach
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


