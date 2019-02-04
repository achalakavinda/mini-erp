@extends('layouts.admin')
@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Project Actual Cost | {!! $Project->code !!}</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/project') }}/{!! $Project->id !!}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/project') }}/{!! $Project->id !!}/budget-cost" class="btn btn-danger">Budget <i class="fa fa-plus-square"></i></a>
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
                {{--summery table--}}
                @include('admin.project.table.project_cost_summary_table')
                {{--/summery table--}}
            </div><!-- /general form elements -->


            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Project Staff Cost Change</h4>
                </div>
                <div style="overflow: auto" class="box-body">

                    {!! Form::open(['action'=>'ProjectController@StoreNewBudgetDesignationCost','class'=>'form-horizontal','id'=>'Form']) !!}
                    <input type="number" style="display: none" value="{!! $Project->id !!}" name="project_id">
                    <div class="col-md-12">
                        @include('error.error')
                        <table id="DesignationTable" class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Designation</th>
                                <th>Hour Rate</th>
                                <th>Work Hours</th>
                                <th>Total</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 0;?>
                                    @foreach(\App\Models\ProjectDesignation::where('project_id',$Project->id)->get() as $item)
                                        <tr>
                                            <td>
                                                <?php
                                                    $Designation = \App\Models\Designation::find($item->project_designation_id);
                                                    if($Designation)
                                                        echo $Designation->designationType;
                                                ?>
                                                    <input style="display: none" value="{{ $item->project_designation_id }}" type="number" id="DesignationID_{{ $count }}">
                                                    <input style="display: none" value="{{ $item->id }}" type="number" id="ProjectDesignationCostID_{{ $count }}">
                                            </td>
                                            <td style="text-align: right;">
                                                {!! number_format($item->hr_rates,2) !!}
                                                <input style="display: none" value="{{ $item->hr_rates }}" type="number" id="rowWorkHourRates_{{ $count }}">
                                            </td>
                                            <td style="text-align: right;">
                                                {!! number_format($item->hr,2) !!}
                                                <input style="display: none" value="{{ $item->hr }}" type="number" id="rowWorkHours_{{ $count }}">
                                            </td>
                                            <td style="text-align: right;">
                                                {!! number_format($item->hr_rates*$item->hr,2) !!}
                                            </td>
                                            <td>
                                                <a onclick="openRowModel({!! $item->id  !!},{!! $count !!})"><i class="fa fa-2x fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        <?php $count++;?>
                                    @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th style="max-width: 100px">
                                        {!! Form::select('designation_type_id',\App\Models\Designation::get()->pluck('designationType','id'),null,['class'=>'form-control','id'=>'DesignationTypeId']) !!}
                                    </th>
                                    <th colspan="3"></th>
                                    <th>
                                        <a type="button" id="addNewDesignation" class="fa fa-2x fa-plus-square"></a>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="pull-right btn btn-sm btn-success">Save <i class="fa fa-save"></i></button>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('model')
    <!-- edit model -->
    <div class="modal fade" id="editModel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <div class="box">
                        @include('error.error')
                        <!-- /.box-header -->
                        <div style="overflow: auto" class="box-body">
                            {!! Form::open(['action'=>'ProjectController@editBudgetDesignationCost','class'=>'form-horizontal']) !!}
                            <table class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Designation</th>
                                    <th>Hour Rate</th>
                                    <th>Work Hours</th>
                                    <th>Total</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <td>
                                        <input name="selected_row_id" id="selectedRowId" style="display: none;">
                                        <input name="selected_project_id" value="{!! $Project->id !!}" style="display: none;">
                                        {!! Form::select('selected_designation_type_id',\App\Models\Designation::get()->pluck('designationType','id'),null,['class'=>'form-control','id'=>'selectedDesignationTypeId']) !!}</td>
                                    <td>{!! Form::number('selected_hr_rates',null,['class'=>'form-control','id'=>'selectedHrRates','step'=>'0.01']) !!}</td>
                                    <td>{!! Form::number('selected_work_hrs',null,['class'=>'form-control','id'=>'selectedWorkHrs','step'=>'0.01']) !!}</td>
                                    <td>{!! Form::number('selected_total',null,['class'=>'form-control','id'=>'selectedTotal','step'=>'0.01']) !!}</td>
                                    <td>{!! Form::checkbox('selected_row_delete',null,['checked'=>false,'class'=>'form-control','id'=>'selectedRowDelete']) !!}</td>
                                </tbody>
                            </table>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right">Save <i class="fa fa-save"></i></button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>--}}
                {{--</div>--}}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- staff rates model -->
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

        var designationTable = $('#DesignationTable');
        var designation_count = 0;
        var designation_RawCount = 1;
        var DesignationCostSum = 0;
        var ClickRow = 0;
        var EmployeeTable = $('#tableEmployee').DataTable();

        $('#addNewDesignation').click(function() {
            addNewDesignationCost();
        });

        $('#tableEmployee tbody').on( 'click', 'tr', function () {
            var d = EmployeeTable.row( this ).data();
            if (typeof d != "undefined") {
                updateHourRate(ClickRow,d[2]);
            }
            $('#staffRatesModel').modal('hide');
        });

        function updateHourRate(row,rate) {
            $("#hrRate"+row).val(parseFloat(rate));
        }

        function openRowModel(id,row) {
            $('#editModel').modal('show');

            var ProjectDesignationCostID = '#ProjectDesignationCostID_'+row;
            var DesignationID = '#DesignationID_'+row;
            var rowWorkHourRates = '#rowWorkHourRates_'+row;
            var rowWorkHours = '#rowWorkHours_'+row;

            var ProjectDesignationCostIDValue = parseFloat($(ProjectDesignationCostID).val());
            var designationIDValue = parseFloat($(DesignationID).val());
            var rowWorkHourRatesValue = parseFloat($(rowWorkHourRates).val());
            var rowWorkHoursValue = parseFloat($(rowWorkHours).val());

            $('#selectedRowId').val(ProjectDesignationCostIDValue);
            $('#selectedDesignationTypeId').val(designationIDValue);
            $('#selectedHrRates').val(rowWorkHourRatesValue);
            $('#selectedWorkHrs').val(rowWorkHoursValue);
            $('#selectedTotal').val(rowWorkHourRatesValue*rowWorkHoursValue);
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
                console.log(e);
            }
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

        function calculateCostDesignationTypes(count)
        {
            DesignationCostSum =parseFloat(0);
            for (var i=0;i<count;i++){
                var ElementValueHrs =$("#hrs"+i).val();
                var ElementValueHrRates =$("#hrRate"+i).val();
                if(parseFloat(ElementValueHrs)>0 && parseFloat(ElementValueHrRates)>0){
                    $("#total"+i).val(parseFloat(ElementValueHrs)*parseFloat(ElementValueHrRates));
                }
            }
        }

        //remove selected row
        function rowRemoves(value)
        {
            $(value).remove();
            calculateCostDesignationTypes(designation_count);
        }

    </script>

@endsection

