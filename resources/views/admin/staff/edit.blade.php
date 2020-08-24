@extends('layouts.admin')
@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ config('appStrings.String_Staff_Edit') }} : {!! $Employee->User->name !!}</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a href="{!! url('staff') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-close"></i> Cancel
            </a>
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('staff') !!}/{!! $Employee->id !!}/edit" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a id="ShowAdvance" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Show All Fields
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection


@section('main-content')
    <!-- main section -->
    <div class="row">
                {!! Form::model($Employee, ['method' => 'PATCH', 'action' => ['StaffController@update', $Employee->id],'class'=>'form-horizontal']) !!}
                @include('error.error')
                @include('admin.staff._partials.createForm')
                {!! Form::close() !!}
    </div>
    <!-- /.row -->
    <!-- /main section -->
@endsection

@section('js')
    <script type="text/javascript">

        $("#cost").keyup(function () {
            calculate();
        });

        $( "#cost" ).change(function() {
            calculate();
        });

        $('#GenerateBtn').on('click',function () {
            if( getCost()>0){
                calculate();
            }
        });

        $("#basicSalary").keyup(function () {
            calculateEtfEpf()
        });
        $( "#basicSalary" ).change(function() {
            calculateEtfEpf()
        });

        function calculate() {
            var cost =parseFloat($( "#cost" ).val());
            $("#hourlyRate").val((cost/150).toFixed(2));
            $('#hrBillingRates').val(((cost/150)*5).toFixed(2));
        }

        function getCost() {
            var costValue = 0;
            var Epf_Cost = parseFloat($('#epfCost').val());
            var Etf_Cost = parseFloat($('#etfCost').val());
            var Allowance_Cost = parseFloat($('#allowanceCost').val());
            var Gratuity_Cost = parseFloat($('#gratuityCost').val());
            var Other_Cost = parseFloat($('#otherCost').val());
            var basicSal = parseFloat($('#basicSalary').val());

            if(Epf_Cost>0){
                costValue = costValue+Epf_Cost;
            }
            if(Etf_Cost>0){
                costValue = costValue+Etf_Cost;
            }
            if (Allowance_Cost>0){
                costValue = costValue+Allowance_Cost;
            }
            if(Gratuity_Cost>0){
                costValue = costValue+Gratuity_Cost;
            }
            if(Other_Cost>0){
                costValue = costValue+Other_Cost;
            }
            if(basicSal>0){
                costValue = costValue+basicSal;
            }
            $('#cost').val(costValue.toFixed(2));
            return costValue.toFixed(2);
        }

        function calculateEtfEpf() {
            var basicSal = parseFloat($('#basicSalary').val());
            var epf = basicSal*0.12;
            var etf = basicSal*0.03;
            $('#epfCost').val(epf.toFixed(2));
            $('#etfCost').val(etf.toFixed(2))
        }
    </script>

    @include('error.swal')
    <script>
        $('#ShowAdvance').on('click',function () {
            $('#AdvanceForm1').toggle();
            $('#AdvanceForm2').toggle();
        })
    </script>
@endsection
