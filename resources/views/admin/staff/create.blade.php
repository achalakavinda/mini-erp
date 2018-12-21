@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Staff Board</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/staff') }}" class="btn btn-success">Staff</a>
            <a href="{{ url('/staff/create') }}" class="btn btn-success">New</a>
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
                    <h3 class="box-title">Add New Employee</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                {!! Form::open(['action'=>'StaffController@store','class'=>'form-horizontal','id'=>'Form']) !!}
                    @include('error.error')
                    @include('admin.staff._partials.createForm')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('js')
    <script type="text/javascript">

        $("#cost").keyup(function () {
            calculate();
        });

        $( "#cost" ).change(function() {
            calculate();
        });

        function calculate() {
            var cost =parseFloat($( "#cost" ).val());
            $("#hourlyRate").val(cost/240);
        }

    </script>

    @include('error.swal')
@endsection