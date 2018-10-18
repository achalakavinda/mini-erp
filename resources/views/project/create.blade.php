@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Projects</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/project') }}" class="btn btn-success">Project</a>
            <a href="{{ url('/project/create') }}" class="btn btn-success">New</a>
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
                    <h3 class="box-title">Add New Projects</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['action'=>'ProjectController@store','class'=>'form-horizontal','id'=>'Form']) !!}
                @include('error.error')
                @include('project._partials.createForm')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('js')
    <script>
        $(document).ready(function(){
            var i = 0;
            $('#add').click(function(){
                var emp = $('#employee');
                var inp = $('#box');

                 try {
                     i = $('.sub_count').size();
                 }catch (e) {
                     console.log(e.toString());
                 }

                var empName = $('#employee :selected').text();
                    if(empName.length<1){
                        alert('you already add all employees')
                        return;
                    }
                $('<div style="margin-top: 10px;">' +
                    '<label class="col-md-2 control-label sub_count">Employee</label>' +
                    '<div class="col-sm-2">' +
                    '<div id="box' + i +'">' +
                    '<input type="text" id="employee_name_'+i+'" class="form-control" name="details['+i+'][employee_name]" placeholder=""/>' +
                    '<input type="text" id="employee_id_'+i+'" style="display:none" class="form-control" name="details['+i+'][employee_id]" placeholder=""/>' +
                    '</div>' +
                    '</div>' +
                    '<label class="col-md-2 control-label sub_count">Paying Hrs</label>' +
                    '<div class="col-sm-1">' +
                    '<div id="box' + i +'">' +
                    '<input type="number" id="paying_hrs" class="form-control" name="details['+i+'][paying_hrs]" placeholder=""/>' +
                    '</div>' +
                    '</div>' +
                    '<label class="col-sm-2 control-label">Volunteer Hrs</label>' +
                    '<div class="col-sm-1">' +
                    '<div id="box' + i +'">' +
                    '<input type="number" id="volunteer_hrs" value="0" class="form-control" name="details['+i+'][volunteer_hrs]" placeholder=""/>' +
                    '</div>' +
                    '</div></div><div class="col-md-12" style="padding-bottom: 10px"></div>').appendTo(inp);
                    $('#employee_name_'+i).val(empName);
                    $('#employee_id_'+i).val( $('#employee :selected').val());
                    $('#employee :selected').remove();
                i++;
            });
        });
    </script>
@endsection