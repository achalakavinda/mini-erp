<?php
    $Customers = \App\Models\Customer::all()->pluck('name','id');
    $JobTypes = \App\Models\JobType::all()->pluck('jobType','id');
    $Employess = \App\Models\User::where('designation_id','!=',-999)->pluck('name','id');
    $PROJECTJOBTYPE = \App\Models\ProjectJobType::where('project_id',$Project->id)->get();
    $PROJECTEMPLOYEES = \App\Models\ProjectEmployee::where('project_id',$Project->id)->get();
    $WORKSHEETS =  DB::table('work_sheets')->select(DB::raw('sum(hr_cost) as cost,sum(work_hrs) as hrs,sum(hr_rate) as rate, user_id'))->where('project_id',$Project->id)->groupBy('user_id')->get();
?>

<div style="overflow: auto" class="box-body">
    <table id="table" class="table table-responsive table-bordered table-striped">
        <thead>
        <tr>
            <th>Code</th>
            <th>Customer</th>
            <th>Job</th>
            <th>B.Hrs</th>
            <th>B.Cost</th>
            <th>B.Revenue</th>
            <th>A.Hrs</th>
            <th>A.Cost</th>
            <th>A.Revenue</th>
            <th>Cost Variance</th>
            <th>Recovery Ratio</th>
            <th>status</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>{!! $Project->code !!}</td>
            <td>{!! \App\Models\Customer::where('id',$Project->customer_id)->first()->name !!}</td>
            <td>
                <?php
                foreach ($PROJECTJOBTYPE as $val){
                    $JBTYPE =  \App\Models\JobType::find($val->jop_type_id);
                    echo $JBTYPE->jobType;
                }
                ?>
            </td>
            <td>{!! $Project->budget_number_of_hrs  !!}</td>
            <td>{!! $Project->budget_cost  !!}</td>
            <td>{!! $Project->budget_revenue  !!}</td>
            <td>{!! $Project->actual_number_of_hrs  !!}</td>
            <td>{!! $Project->actual_cost  !!}</td>
            <td>{!! $Project->actual_revenue  !!}</td>
            <td>{!! $Project->cost_variance  !!}</td>
            <td>{!! $Project->recovery_ratio  !!}</td>
            <td><b>@if($Project->close)Close @else Open @endif</b></td>
        </tr>
        </tbody>
    </table>
</div>


<div class="box-body">

    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('number_of_hrs','Number of Hrs',['class' => 'control-label']) !!}
            {!! Form::text('number_of_hrs',$Project->budget_number_of_hrs,['class'=>'form-control','id'=>'numberOfHrs','placeholder'=>'Number of Hrs','readonly']) !!}
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('budget_cost','Budget Cost',['class' => 'control-label']) !!}
            {!! Form::number('budget_cost',0,['class'=>'form-control','id'=>'BudgetCost','placeholder'=>'Budget Cost','readonly', 'step'=>'0.01']) !!}
            {!! Form::number('project_id',$Project->id,['class'=>'form-control','id'=>'ProjectId','style'=>'display:none']) !!}
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('profit_margin','Profit Margin',['class' => 'control-label']) !!}
            {!! Form::number('profit_margin',0,['class'=>'form-control','id'=>'ProfitMargin','placeholder'=>'Profit Margin in Decimal', 'step'=>'0.01']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('quoted_price','Quoted Price',['class' => 'control-label']) !!}
            {!! Form::number('quoted_price',0,['class'=>'form-control','id'=>'QuotedPrice','placeholder'=>'Quoted Price','readonly', 'step'=>'0.01']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('refresh_value','Refresh values',['class' => 'control-label']) !!}
            <button class="form-control" type="button" id="CalculateBtn">Calculate <i class="fa fa-calculator"></i></button>
        </div>
    </div>

</div>
<!-- /.box-body -->

<!-- staff allocation estimations -->
<div class="box-header with-border">
    <h4 class="box-title">Staff Allocation Estimation  <b id="DESIGNATIONCOSTESTIMATIONVALUE"></b> <i id="DESIGNATIONCOSTESTIMATIONVALUEREFRESH" style="font-size: 70%; color: green; cursor: pointer" class="fa fa-refresh"></i></h4>
</div>
<div class="box-body">
    <div class="col-md-12">
        <table id="DesignationTable" class="table table-responsive table-bordered table-striped">
            <thead>
            <tr>
                <th>Designation</th>
                <th>Hour Rate</th>
                <th>Work Hours</th>
                <th>Cost</th>
            </tr>
            </thead>
            <tbody>
            <?php $DesiginationHrs = 0; $DesignationCost = 0;?>
                @foreach(\App\Models\ProjectDesignation::where('project_id',$Project->id)->get() as $item)
                    <tr>
                        <td><?php $Designation = \App\Models\Designation::find($item->project_designation_id);if($Designation)echo $Designation->designationType;?></td>
                        <td>{!! $item->hr_rates !!}</td>
                        <td>{!! $item->hr !!}</td>
                        <td>{!! $item->total !!}</td>
                        <td><a href="#"><i class="fa fa-close"></i></a></td>
                    </tr>
                    <?php $DesiginationHrs = $DesiginationHrs+$item->hr; $DesignationCost = $DesignationCost+$item->total;?>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-md-8">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::select('designation_type_id',\App\Models\Designation::get()->pluck('designationType','id'),null,['class'=>'form-control','id'=>'DesignationTypeId']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <button class="form-control" type="button" id="addNewDesignation">Add <i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <button class="form-control" type="button" id="addNewDesignationCalculation">Calculate <i class="fa fa-calculator"></i></button>
            </div>
        </div>
    </div>

</div>
<!-- /Employee assignment -->


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
                    </tr>
                </thead>
                <tbody>
                <?php $CostSum = 0;?>
                    @foreach(\App\Models\ProjectOverhead::where('project_id',$Project->id)->get() as $item)
                        <tr>
                            <td>{!! $item->project_cost_type !!}</td>
                            <td>{!! $item->cost !!}</td>
                            <td>{!! $item->remark !!}</td>
                            <td><a href="#"><i class="fa fa-close"></i></a></td>
                        </tr>
                        <?php $CostSum = $CostSum+$item->cost;?>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-8">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::select('cost_type_id',\App\Models\ProjectCostType::get()->pluck('name','id'),null,['class'=>'form-control','id'=>'CostTypeId','placeholder'=>'Other Cost']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <button class="form-control" type="button" id="addNewCost">Add <i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <button class="form-control" type="button" id="calculateNewCost">Calculate <i class="fa fa-calculator"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Cost assignment-->

<div class="box-footer">
    <button type="submit" class="btn btn-success pull-right">Update <i class="fa fa-save"></i></button>
</div>


@section('js')
    <script>
        'use strict'

        var BugetCost = 0;

        var costTable = $('#CostTable');
        var designationTable = $('#DesignationTable');

        var count = 0;
        var RawCount = 1;
        var CostTypeSum = 0;

        var designation_count = 0;
        var designation_RawCount = 1;
        var DesignationCostSum = 0;

        $( document ).ready(function() {

            $('#COSTESTIMATIONVALUEREFRESH').click(function() {
                calculateCostForTypes(count);
            });

            $('#DESIGNATIONCOSTESTIMATIONVALUEREFRESH').click(function() {
                calculateCostDesignationTypes(designation_count);
            });

            $('#addNewDesignation').click(function() {
                addNewDesignationCost();
            });

            $('#addNewCost').click(function() {
                addNewCostTypes();
            });

            $('#calculateNewCost').click(function() {
                calculateCostForTypes(count);
            });

            $('#addNewDesignationCalculation').click(function() {
                calculateCostDesignationTypes(designation_count);
            });



            $('#CalculateBtn').click(function () {
                calculateCostForTypes(count);
                calculateCostDesignationTypes(designation_count);
                var bugetTol = parseFloat(CostTypeSum)+parseFloat(DesignationCostSum)+parseFloat(BugetCost);
                var margin = parseFloat($('#ProfitMargin').val())
                $('#QuotedPrice').val(bugetTol+(bugetTol*margin));
            });

        });

        function calculateCostForTypes(count) {
            CostTypeSum = parseFloat(<?php echo $CostSum?>);
            for (var i=0;i<count;i++){
                var costField = $("#CostRow"+i).val();
                if(parseFloat(costField)>0){
                    CostTypeSum = CostTypeSum + parseFloat(costField);
                }
            }
            $('#COSTESTIMATIONVALUE').text(" : "+CostTypeSum+'/=');
            budgetCost();
        }

        function calculateCostDesignationTypes(count) {
            DesignationCostSum =parseFloat(<?php echo $DesignationCost;?>);
            for (var i=0;i<count;i++){
                var costField = $("#total"+i).val();
                if(parseFloat(costField)>0){
                    DesignationCostSum = DesignationCostSum + parseFloat(costField);
                }
            }
            $('#DESIGNATIONCOSTESTIMATIONVALUE').text(" : "+DesignationCostSum+'/=');
            budgetCost();
        }

        function budgetCost() {
            var bugetTol = parseFloat(CostTypeSum)+parseFloat(DesignationCostSum)+parseFloat(BugetCost);
            $('#BudgetCost').val(bugetTol);
        }

        //add new cost type rows
        function addNewCostTypes() {

            var SelectCostTypeId = $('#CostTypeId').val();
            var SelectCostTypeName = $('#CostTypeId option:selected').text();

            costTable.append('<tr class="tr_'+count+'">\n' +
                '                        <td>\n' +
                '                            <input style="display:none" type="number" value="'+SelectCostTypeId+'" name="cost_row['+count+'][cost_type_id]" class="form-control">\n' +
                '                            <input type="text" name="cost_row['+count+'][cost_type_name]" value="'+SelectCostTypeName+'" class="form-control">\n' +
                '                        </td>\n' +
                '                        <td>\n' +
                '                            <input  type="number" name="cost_row['+count+'][cost]" id="CostRow'+count+'" value="" class="form-control">\n' +
                '                        </td>\n' +
                '                        <td>\n' +
                '                            <input  type="text" name="cost_row['+count+'][remark]"  value="" class="form-control">\n' +
                '                        </td>\n' +
                '                        <td>\n' +
                '                            <a style="cursor: pointer" type="button" onclick="rowRemoves(\'.tr_'+count+'\')"><i class="fa fa-remove"></i></a>\n' +
                '                        </td>\n' +
                '                    <tr/>');
            count++;
            RawCount++;
            calculateCostForTypes(count);
        }

        //add designation cost type rows
        function addNewDesignationCost(){

            var SelectDesignationTypeId = $('#DesignationTypeId').val();
            var SelectDesignationTypeName = $('#DesignationTypeId option:selected').text();


            try {

                var url = '{!! url('api/designation/') !!}/'+SelectDesignationTypeId;

                $.ajax({
                    url: url,
                    success: function (data) {
                        if(data.status.length>0 && data.status =='ok'){
                            console.log(data);
                            designationTable.append('<tr class="tr_designation_'+designation_count+'">\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelectDesignationTypeId+'" name="designation_row['+designation_count+'][designation_id]" class="form-control">\n' +
                                '                            <input type="text" name="designation_row['+designation_count+'][designation_name]" value="'+SelectDesignationTypeName+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="designation_row['+designation_count+'][hr_rate]" value="'+data.designation.avg_hr_rate+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="designation_row['+designation_count+'][hrs]"  value="" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="designation_row['+designation_count+'][total]"  id="total'+designation_count+'" value="" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemoves(\'.tr_designation_'+designation_count+'\')"><i class="fa fa-remove"></i></a>\n' +
                                '                        </td>\n' +
                                '                    <tr/>');

                            designation_count++;
                            designation_RawCount++;
                            calculateCostDesignationTypes(designation_count);

                        }else {
                            designationTable.append('<tr class="tr_designation_'+designation_count+'">\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelectDesignationTypeId+'" name="designation_row['+designation_count+'][designation_id]" class="form-control">\n' +
                                '                            <input type="text" name="designation_row['+designation_count+'][designation_name]" value="'+SelectDesignationTypeName+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="designation_row['+designation_count+'][hr_rate]" value="" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="designation_row['+designation_count+'][hrs]"  value="" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="designation_row['+designation_count+'][total]"  id="total'+designation_count+'" value="" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemoves(\'.tr_designation_'+designation_count+'\')"><i class="fa fa-remove"></i></a>\n' +
                                '                        </td>\n' +
                                '                    <tr/>');

                            designation_count++;
                            designation_RawCount++;
                            calculateCostDesignationTypes(designation_count);
                        }
                    },
                    statusCode: {
                        404: function() {
                            alert( "Error Request" );
                        }
                    }
                });

            }catch (e) {

                designationTable.append('<tr class="tr_designation_'+designation_count+'">\n' +
                    '                        <td>\n' +
                    '                            <input style="display:none" type="number" value="'+SelectDesignationTypeId+'" name="designation_row['+designation_count+'][designation_id]" class="form-control">\n' +
                    '                            <input type="text" name="designation_row['+designation_count+'][designation_name]" value="'+SelectDesignationTypeName+'" class="form-control">\n' +
                    '                        </td>\n' +
                    '                        <td>\n' +
                    '                            <input  type="text" name="designation_row['+designation_count+'][hr_rate]" value="" class="form-control">\n' +
                    '                        </td>\n' +
                    '                        <td>\n' +
                    '                            <input  type="text" name="designation_row['+designation_count+'][hrs]"  value="" class="form-control">\n' +
                    '                        </td>\n' +
                    '                        <td>\n' +
                    '                            <input  type="text" name="designation_row['+designation_count+'][total]"  id="total'+designation_count+'" value="" class="form-control">\n' +
                    '                        </td>\n' +
                    '                        <td>\n' +
                    '                            <a style="cursor: pointer" type="button" onclick="rowRemoves(\'.tr_designation_'+designation_count+'\')"><i class="fa fa-remove"></i></a>\n' +
                    '                        </td>\n' +
                    '                    <tr/>');

                designation_count++;
                designation_RawCount++;
                calculateCostDesignationTypes(designation_count);
            }
        }

        //remove selected row
        function rowRemoves(value) {
            $(value).remove();
            calculateCostDesignationTypes(designation_count);
            calculateCostForTypes(count);
        }


    </script>

@endsection
