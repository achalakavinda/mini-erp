@extends('layouts.admin')

<?php
    $showUpdate = false;

    $PROJECTJOBTYPE = \App\Models\ProjectJobType::where('project_id',$Project->id)->get();
    $ProjectDesignation = \App\Models\ProjectDesignation::where('project_id',$Project->id)->get();
    $ProjectOverHeads = \App\Models\ProjectOverhead::where('project_id',$Project->id)->get();



    if($ProjectDesignation->isEmpty() && $ProjectOverHeads->isEmpty()){
        $showUpdate = true;
    }else{
        $showUpdate = false;
    }


?>

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Project Estimations | {!! $Project->code !!}</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/project') }}/{!! $Project->id !!}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/project') }}/{!! $Project->id !!}/estimation" class="btn btn-danger">Budget <i class="fa fa-plus-square"></i></a>
            <a href="{{ url('/project') }}/{!! $Project->id !!}/actual-cost" class="btn btn-danger">Actual Cost <i class="fa fa-money"></i></a>
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

                @if($showUpdate)
                <!-- form start -->
                {!! Form::open(['action'=>'ProjectController@finalized','class'=>'form-horizontal','id'=>'Form']) !!}
                        @include('error.error')
                        @include('admin.project._partials.estimateForm')
                {!! Form::close() !!}
                @else
                        @include('admin.project._partials.estimateForm')
                @endif
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->