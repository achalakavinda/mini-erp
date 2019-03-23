@extends('layouts.admin')

@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection
<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Job Type</h3>
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
                                {!! Form::date('from',$from,['class'=>'form-control','id'=>'name']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('to','To',['class' => 'control-label']) !!}
                                {!! Form::date('to',$to,['class'=>'form-control','id'=>'name']) !!}
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
                            <th>Date</th>
                            <th>Holiday</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach([1,2,3,4,5,6,7,8,9,] as $row)
                            <tr>
                                <td>{{ $row }}</td>
                                <td>{{ $row }}</td>
                                <td>
                                    <a href="{{ url('/job-type') }}/{{ $row->id }}"><i class="fa fa-paper-plane"></i></a>
                                </td>
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