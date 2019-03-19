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
            <button id="ShowAdvance" type="button" class=" btn btn-light">Show All Fields <i class="fa fa-list"></i></button>
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

        $('#GenerateBtn').on('click',function () {
           if( getCost()>0){
               calculate();
           }
        })



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
            $('#AdvanceForm').fadeIn('slow');
            $('#ShowAdvance').hide();
        })
    </script>
@endsection