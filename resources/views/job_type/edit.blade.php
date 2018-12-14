@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Job Type</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/job-type') }}" class="btn btn-success">Job Type</a>
            <a href="{{ url('/job-type/create') }}" class="btn btn-success">New</a>
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
                    <h3 class="box-title">{{ $JobType->jobType }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::model($JobType, ['method' => 'PATCH', 'action' => ['JobTypeController@update', $JobType->id],'class'=>'form-horizontal']) !!}
                @include('error.error')
                @include('job_type._partials.updateForm')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->