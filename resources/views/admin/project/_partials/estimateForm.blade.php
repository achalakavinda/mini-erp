@if($showUpdate)
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
        @else
        {{--<div class="box-body">--}}

            {{--<div class="col-md-2">--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('number_of_hrs','Number of Hrs',['class' => 'control-label']) !!}--}}
                    {{--{!! Form::text('number_of_hrs',$Project->budget_number_of_hrs,['class'=>'form-control','id'=>'numberOfHrs','placeholder'=>'Number of Hrs','disabled']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="col-md-2">--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('budget_cost','Budget Cost',['class' => 'control-label']) !!}--}}
                    {{--{!! Form::number('budget_cost',$Project->budget_cost,['class'=>'form-control','id'=>'BudgetCost','placeholder'=>'Budget Cost','disabled', 'step'=>'0.01']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="col-md-2">--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('profit_margin','Profit Margin',['class' => 'control-label']) !!}--}}
                    {{--{!! Form::number('profit_margin',$Project->profit_ratio,['class'=>'form-control','id'=>'ProfitMargin','placeholder'=>'Profit Margin in Decimal', 'step'=>'0.01']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="col-md-3">--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('quoted_price','Quoted Price',['class' => 'control-label']) !!}--}}
                    {{--{!! Form::number('quoted_price',$Project->budget_revenue,['class'=>'form-control','id'=>'QuotedPrice','placeholder'=>'Quoted Price','disabled', 'step'=>'0.01']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--@if($showUpdate)--}}
            {{--<div class="col-md-3">--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('refresh_value','Refresh values',['class' => 'control-label']) !!}--}}
                    {{--<button class="form-control" type="button" id="CalculateBtn">Calculate <i class="fa fa-calculator"></i></button>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@endif--}}

        {{--</div>--}}
        <!-- /.box-body -->
    @endif

<!-- staff allocation estimations -->
<div class="box-header with-border">
    <h4 class="box-title">Budget - Staff Cost<b id="DESIGNATIONCOSTESTIMATIONVALUE"></b> <i id="DESIGNATIONCOSTESTIMATIONVALUEREFRESH" style="font-size: 70%; color: green; cursor: pointer" class="fa fa-refresh"></i></h4>
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
                @foreach($ProjectDesignation as $item)
                    <tr>
                        <td><?php $Designation = \App\Models\Designation::find($item->project_designation_id);if($Designation)echo $Designation->designationType;?></td>
                        <td style="text-align: right">{!! number_format($item->hr_rates,2) !!}</td>
                        <td style="text-align: right">{!! number_format($item->hr,2) !!}</td>
                        <td style="text-align: right">{!! number_format($item->total,2) !!}</td>
                    </tr>
                    <?php $DesiginationHrs = $DesiginationHrs+$item->hr; $DesignationCost = $DesignationCost+$item->total;?>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th style="text-align: right">{!! number_format($DesiginationHrs,2)  !!}</th>
                    <th style="text-align: right">{!! number_format($DesignationCost,2)  !!}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    @if($showUpdate)
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
        @else
           <div class="col-md-12">
               <div class="form-group">
                    <a class="pull-right btn btn-sm btn-success" href="{!! url('project') !!}/{!! $Project->id !!}/estimation/edit/staff-allocation-estimation">Change</a>
               </div>
           </div>
    @endif

</div>
<!-- /Employee assignment -->


<!-- Cost assignment-->
    <div class="box-header with-border">
        <h4 class="box-title">Indirect Cost <b id="COSTESTIMATIONVALUE"></b> <i id="COSTESTIMATIONVALUEREFRESH" style="font-size: 70%; color: green; cursor: pointer" class="fa fa-refresh"></i></h4>
    </div>
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
                    @foreach($ProjectOverHeads as $item)
                        <tr>
                            <td>{!! $item->project_cost_type !!}</td>
                            <td style="text-align: right">{!! number_format($item->cost,2) !!}</td>
                            <td>{!! $item->remark !!}</td>
                        </tr>
                        <?php $CostSum = $CostSum+$item->cost;?>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Total Indirect Cost</th>
                    <th style="text-align: right">{!! number_format($CostSum,2) !!}</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>

        @if($showUpdate)
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
        @else
            <div class="col-md-12">
                <div class="form-group">
                    <a class="pull-right btn btn-sm btn-success" href="{!! url('project') !!}/{!! $Project->id !!}/estimation/edit/cost-type">Change</a>
                </div>
            </div>
        @endif


    </div>


<!-- /Cost assignment-->
@if($showUpdate)
    <div class="box-header with-border">
        <h4 class="box-title">Calculate with Administrative Overheads</h4>
    </div>
    <div class="box-body">
        <div class="col-md-3">
            <div class="input-group">
                        <span class="input-group-addon">
                          <input name="check_administrative_overhead" type="checkbox">
                        </span>
                        <input name="administrative_overhead_percentage" placeholder="Administrative Overhead %"  type="number" class="form-control">
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success pull-right">Update <i class="fa fa-save"></i></button>
    </div>
@endif


@if($showUpdate)
@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection

@section('model')

    <div class="modal fade" id="staffRatesModel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Staff Rates</h4>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <!-- /.box-header -->
                        <div style="overflow: auto" class="box-body">
                            <table id="tableEmployee" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Designation ID</th>
                                    <th>Name</th>
                                    <th>Hour Rate</th>
                                </tr>
                                </thead>

                                <tfoot>
                                </tfoot>
                            </table>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection

@section('js')
    {!! Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}

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
        var ClickRow = 0;

        var EmployeeTable;

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
                $('#QuotedPrice').val(bugetTol+(bugetTol*(margin/100)));
            });

            EmployeeTable = $('#tableEmployee').DataTable();

            $('#tableEmployee tbody').on( 'click', 'tr', function () {
                var d = EmployeeTable.row( this ).data();
                if (typeof d != "undefined") {
                    updateHourRate(ClickRow,d[2]);
                }
                $('#staffRatesModel').modal('hide');
            } );

        });

        function calculateCostForTypes(count)
        {
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

        function updateHourRate(row,rate) {
            $("#hrRate"+row).val(parseFloat(rate));
        }

        function calculateCostDesignationTypes(count)
        {
            DesignationCostSum =parseFloat(<?php echo $DesignationCost;?>);
            for (var i=0;i<count;i++){
                var ElementValueHrs =$("#hrs"+i).val();
                var ElementValueHrRates =$("#hrRate"+i).val();
                if(parseFloat(ElementValueHrs)>0 && parseFloat(ElementValueHrRates)>0){
                    $("#total"+i).val(parseFloat(ElementValueHrs)*parseFloat(ElementValueHrRates));
                }
                var costField = $("#total"+i).val();
                if(parseFloat(costField)>0){
                    DesignationCostSum = DesignationCostSum + parseFloat(costField);
                }
            }
            $('#DESIGNATIONCOSTESTIMATIONVALUE').text(" : "+DesignationCostSum+'/=');
            budgetCost();
        }

        //budget cost total calculation
        function budgetCost()
        {
            var bugetTol = parseFloat(CostTypeSum)+parseFloat(DesignationCostSum)+parseFloat(BugetCost);
            $('#BudgetCost').val(bugetTol);
        }

        //add new cost type rows
        function addNewCostTypes()
        {
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
                '                            <a style="cursor: pointer" type="button" onclick="rowRemoves(\'.tr_'+count+'\')"><i class="fa fa-2x fa-remove"></i></a>\n' +
                '                        </td>\n' +
                '                    <tr/>');
            count++;
            RawCount++;
            calculateCostForTypes(count);
        }

        //add designation cost type rows
        function addNewDesignationCost()
        {
            var SelectDesignationTypeId = $('#DesignationTypeId').val();
            var SelectDesignationTypeName = $('#DesignationTypeId option:selected').text();
            try {
                var url = '{!! url('api/designation/') !!}/'+SelectDesignationTypeId;

                $.ajax({
                    url: url,
                    success: function (data) {
                        if(data.status.length>0 && data.status =='ok'){

                            designationTable.append('<tr class="tr_designation_'+designation_count+'">\n' +
                                '                        <td>\n' +
                                '                            <input style="display:none" type="number" value="'+SelectDesignationTypeId+'" name="designation_row['+designation_count+'][designation_id]" class="form-control">\n' +
                                '                            <input type="text" name="designation_row['+designation_count+'][designation_name]" value="'+SelectDesignationTypeName+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="designation_row['+designation_count+'][hr_rate]" id="hrRate'+designation_count+'" value="'+data.designation.avg_hr_rate+'" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="designation_row['+designation_count+'][hrs]" id="hrs'+designation_count+'"  value="" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="designation_row['+designation_count+'][total]"  id="total'+designation_count+'" value="" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="openEmployeeTable('+SelectDesignationTypeId+','+designation_count+')"><i class="fa fa-2x fa-table"></i></a>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemoves(\'.tr_designation_'+designation_count+'\')"><i class="fa fa-2x fa-remove"></i></a>\n' +
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
                                '                            <input  type="text" name="designation_row['+designation_count+'][hr_rate]" id="hrRate'+designation_count+'" value="" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="designation_row['+designation_count+'][hrs]" id="hrs'+designation_count+'"   value="" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <input  type="text" name="designation_row['+designation_count+'][total]"  id="total'+designation_count+'" value="" class="form-control">\n' +
                                '                        </td>\n' +
                                '                        <td>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="openEmployeeTable('+SelectDesignationTypeId+','+designation_count+')"><i class="fa fa-2x fa-remove"></i></a>\n' +
                                '                            <a style="cursor: pointer" type="button" onclick="rowRemoves(\'.tr_designation_'+designation_count+'\')"><i class="fa fa-2x fa-remove"></i></a>\n' +
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
                    '                            <input  type="text" name="designation_row['+designation_count+'][hr_rate]" id="hrRate'+designation_count+'" value="" class="form-control">\n' +
                    '                        </td>\n' +
                    '                        <td>\n' +
                    '                            <input  type="text" name="designation_row['+designation_count+'][hrs]" id="hrs'+designation_count+'"  value="" class="form-control">\n' +
                    '                        </td>\n' +
                    '                        <td>\n' +
                    '                            <input  type="text" name="designation_row['+designation_count+'][total]"  id="total'+designation_count+'" value="" class="form-control">\n' +
                    '                        </td>\n' +
                    '                        <td>\n' +
                    '                            <a style="cursor: pointer" type="button" onclick="openEmployeeTable('+SelectDesignationTypeId+','+designation_count+')"><i class="fa fa-2x fa-remove"></i></a>\n' +
                    '                            <a style="cursor: pointer" type="button" onclick="rowRemoves(\'.tr_designation_'+designation_count+'\')"><i class="fa fa-remove"></i></a>\n' +
                    '                        </td>\n' +
                    '                    <tr/>');
                designation_count++;
                designation_RawCount++;
                calculateCostDesignationTypes(designation_count);
            }
        }

        //remove selected row
        function rowRemoves(value)
        {
            $(value).remove();
            calculateCostDesignationTypes(designation_count);
            calculateCostForTypes(count);
        }

        function openEmployeeTable(id,row) {

            $('#staffRatesModel').modal('show');
            try {
                var url = '{!! url('api/staff/designation') !!}/'+id;

                ClickRow = row;

                $.ajax({
                    url: url,
                    success: function (data) {
                        EmployeeTable.clear()
                            .draw();
                        data.designation.forEach(function (data) {
                            EmployeeTable.row.add([
                                data.designation_id,
                                data.name,
                                data.hr_rates
                            ]).draw(false);
                        });

                    },
                    statusCode: {
                        404: function() {
                            alert( "Error Request" );
                        }
                    }
                });

            }catch (e) {

            }
        }

    </script>

@endsection

@endif
