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
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
        <div class="box-body">
            <a href="{!! url('/project') !!}/{!! $Project->id !!}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('/project') !!}/{!! $Project->id !!}/budget-cost" class="btn btn-app">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{!! url('/project') !!}/{!! $Project->id !!}/staff" class="btn btn-app">
                <i class="main-action-btn-info fa fa-table"></i> Staff
            </a>
            <a href="{{ url('/project') }}/{!! $Project->id !!}/actual-cost" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-table"></i> Actual Cost
            </a>
        </div>
        <!-- /.box -->
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
                {{--summery table--}}
                @include('admin.project.table.project_cost_summary_table')
                {{--/summery table--}}
            </div><!-- /general form elements -->


            <div class="box box-primary">
            @if($showUpdate)
                <!-- form start -->
                {!! Form::open(['action'=>'ProjectController@budgetCostStore','class'=>'form-horizontal','id'=>'Form']) !!}
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