@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Work Sheet</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/work-sheet') }}" class="btn btn-success">Work Sheet</a>
            <a href="{{ url('/work-sheet/create') }}" class="btn btn-success">New</a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Work Sheet |  {{ new \Carbon\Carbon() }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">

                        <div class="form-group">
                            <label>Employee</label>
                            <select class="form-control">
                                <option>Samith</option>
                            </select>
                        </div>

                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th>Work</th>
                                <th>Customer</th>
                                <th>Job Type</th>
                                <th>Remark</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($Rows as $row)

                                <tr>
                                    <td>{{ $row->from }} - {{ $row->to }}</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                          <?php $Company =  \App\Models\Customer::all()->pluck('name','id') ?>
                                        {!! Form::select('company',$Company,null,['class'=>'form-control']) !!}
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                            @endforeach


                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->
