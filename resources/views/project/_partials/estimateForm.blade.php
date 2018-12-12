<?php
$Customers = \App\Models\Customer::all()->pluck('name','id');
$JobTypes = \App\Models\JobType::all()->pluck('jobType','id');
$Employess = \App\Models\User::where('designation_id','!=',-999)->pluck('name','id');

$PROJECTJOBTYPE = \App\Models\ProjectJobType::where('project_id',$Project->id)->get();

$PROJECTEMPLOYEES = \App\Models\ProjectEmployee::where('project_id',$Project->id)->get();

$WORKSHEETS =  DB::table('work_sheets')->select(DB::raw('sum(hr_cost) as cost,sum(work_hrs) as hrs,sum(hr_rate) as rate, user_id'))->where('project_id',$Project->id)->groupBy('user_id')->get();

?>

<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Code') !!}
            {!! Form::text('code',$Project->code,['class'=>'form-control','id'=>'code','placeholder'=>'Code','disabled']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Company') !!}
            {!! Form::select('customer_id',$Customers,$Project->customer_id,['class'=>'form-control','id'=>'company_id','disabled']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Number of Hrs') !!}
            {!! Form::text('number_of_hrs',$Project->number_of_hrs,['class'=>'form-control','id'=>'numberOfHrs','placeholder'=>'Number of Hrs','readonly']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Budget Cost') !!}
            {!! Form::text('budget_cost',$Project->budget_cost,['class'=>'form-control','id'=>'BudgetCost','placeholder'=>'Budget Cost','readonly']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Profit Margin') !!}
            {!! Form::text('profit_margin',null,['class'=>'form-control','id'=>'ProfitMargin','placeholder'=>'Profit Margin in Decimal']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Quoted Price') !!}
            {!! Form::text('qouted_price',$Project->quoted_price,['class'=>'form-control','id'=>'qouted_price','placeholder'=>'Qouted Price','readonly']) !!}
        </div>
    </div>

</div>
<!-- /.box-body -->

<div class="box-header with-border">
    <h4 class="box-title">Assign Jobs</h4>
</div>

<div class="box-body">
    <div class="col-md-12">
        <table class="table table-responsive table-bordered table-striped">
            <?php
            $count =1;
                foreach ($PROJECTJOBTYPE as $val){
                    $JBTYPE =  \App\Models\JobType::find($val->jop_type_id);
                    echo '<tr style="padding-left: 20px"><th>'.$count.',  '.$JBTYPE->jobType.'</th></tr>';
                    $count++;
                }
            ?>

        </table>
    </div>
</div>
<!-- /.box-body -->

<!-- Cost assignment-->
<div class="box-header with-border">
    <h4 class="box-title">Cost Estimation <b id="COSTESTIMATIONVALUE"></b> <i id="COSTESTIMATIONVALUEREFRESH" style="font-size: 70%; color: green; cursor: pointer" class="fa fa-refresh"></i></h4>
    <div class="box-body">
        <div class="col-md-12">
            <table id="CostTable" class="table table-responsive table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Cost Type</th>
                        <th>Cost</th>
                        <th>Remark</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            <div class="col-md-10">
                <div class="form-group">
                    {!! Form::select('cost_type_id',\App\Models\ProjectCostType::get()->pluck('name','id'),null,['class'=>'form-control','id'=>'CostTypeId','placeholder'=>'Other Cost']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <button class="form-control" type="button" id="addNewCost">Cost</button>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Cost assignment-->

<!-- Employee assignment-->
<div class="box-header with-border">
    <h4 class="box-title">Assign Employees</h4>
</div>
<div class="box-body">
    <div class="col-md-12">
        <table class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>Staff Salary Cost</th>
                    <th>Hour Rate</th>
                    <th>Work Hours</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>


    </div>
</div>
<!-- /Employee assignment -->

@section('js')
    <script>

        var table = $('#CostTable');
        var count = 0;
        var RawCount = 1;
        var CostTypeSum = 0;

        $( document ).ready(function() {

            $('#COSTESTIMATIONVALUEREFRESH').click(function() {
                calculateCostForTypes(count);
            });

            $('#addNewCost').click(function() {
                var SelectCostTypeId = $('#CostTypeId').val();
                var SelectCostTypeName = $('#CostTypeId option:selected').text();

                table.append('<tr class="tr_'+count+'">\n' +
                    '                        <td>\n' +
                    '                            <input style="display:none" type="number" value="'+SelectCostTypeId+'" name="cost_row['+count+'][cost_type_id]" class="form-control">\n' +
                    '                            <input type="text" name="cost_row['+count+'][cost_type_name]" value="'+SelectCostTypeName+'" class="form-control">\n' +
                    '                        </td>\n' +
                    '                        <td>\n' +
                    '                            <input  type="text" name="cost_row['+count+'][cost]" id="CostRow'+count+'" value="" class="form-control">\n' +
                    '                        </td>\n' +
                    '                        <td>\n' +
                    '                            <input  type="text" name="cost_row['+count+'][remark]"  value="" class="form-control">\n' +
                    '                        </td>\n' +
                    '                        <td>\n' +
                    '                            <a style="cursor: pointer" type="button" onclick="rowRemove(\'.tr_'+count+'\')"><i class="fa fa-remove"></i></a>\n' +
                    '                        </td>\n' +
                    '                    <tr/>');
                count++;
                RawCount++;

                calculateCostForTypes(count);
            });

        });

        function calculateCostForTypes(count) {
            CostTypeSum =0;
            for (i=0;i<count;i++){
                var costField = $("#CostRow"+i).val();
                if(parseFloat(costField)>0){
                    CostTypeSum = CostTypeSum + parseFloat(costField);
                }
            }
            $('#COSTESTIMATIONVALUE').text(" : "+CostTypeSum+'/=');
        }

        function rowRemove(value) {
            alert(value);
            $(value).remove();
        }
    </script>

@endsection