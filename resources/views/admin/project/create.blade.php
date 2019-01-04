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
        $(document).ready(function(){

            var BudgetCost = $('#budgeCost');
            var ProfitRation = $('#profitRatio');
            var QuotedPrice = $('#quotedPrice');

            $('#budgeCost').on('click', function() {
                    calculate(BudgetCost.val(),ProfitRation.val());
                }
            );
            $('#profitRatio').on('click', function() {
                    calculate(BudgetCost.val(),ProfitRation.val())
                }
            );

            $('#budgeCost').on('keyup', function() {
                    calculate(BudgetCost.val(),ProfitRation.val());
                }
            );
            $('#profitRatio').on('keyup', function() {
                    calculate(BudgetCost.val(),ProfitRation.val())
                }
            );


        });

        function calculate(budget_cost, profile_ratio) {

            budget_cost = parseFloat(budget_cost);
            profile_ratio = parseFloat(profile_ratio);

            $('#quotedPrice').val(budget_cost+(budget_cost*profile_ratio));
        }

    </script>
@endsection