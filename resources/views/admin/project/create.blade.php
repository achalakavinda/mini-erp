@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Project</h3>
        </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
        <div class="box-body">
            <a href="{{ url('/project') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/project/create') }}" class="btn btn-app">
                <i  class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
        </div>
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create a new Project</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['action'=>'ProjectController@store','class'=>'form-horizontal','id'=>'Form']) !!}
                    @include('error.error')
                    @include('admin.project._partials.createForm')
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
        $(document).ready(function()
        {
            var ProfitRation = $('#profitRatio');
            var PYQuotedPrice = $('#PYQuotedPrice');
            var BudgetCost = $('#budgeCost');

            $('#profitRatio').on('click', function() {
                    calculate(PYQuotedPrice.val(),ProfitRation.val())
                }
            );
            $('#PYQuotedPrice').on('keyup', function() {
                    calculate(PYQuotedPrice.val(),ProfitRation.val());
                }
            );
            $('#profitRatio').on('keyup', function() {
                    calculate(PYQuotedPrice.val(),ProfitRation.val())
                }
            );
        });

        function calculate(budget_cost, profile_ratio)
        {
            budget_cost = parseFloat(budget_cost);
            profile_ratio = parseFloat(profile_ratio);
            $('#quotedPrice').val(budget_cost+(budget_cost*(profile_ratio/100)));
            $('#budgeCost').val(budget_cost);
        }
    </script>
@endsection