@extends('layouts.admin')
<?php
    $PROJECTOVERHEAD = \App\Models\ProjectOverheadsActual::where('project_id',$Project->id)->get();
    $ShowCreateForm = false;
    if($PROJECTOVERHEAD->isEmpty())
    {
        $PROJECTOVERHEAD = \App\Models\ProjectOverhead::where('project_id',$Project->id)->get();
        $ShowCreateForm=true;
    }
?>

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Project Actual Cost | {!! $Project->code !!}</h3>
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
            <a href="{{ url('/project') }}/{!! $Project->id !!}/actual-cost" class="btn btn-app">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{!! url('/project') !!}/{!! $Project->id !!}/staff" class="btn btn-app">
                <i class="main-action-btn-info fa fa-table"></i> Staff
            </a>
            <a href="{!! url('/project') !!}/{!! $Project->id !!}/budget-cost" class="btn btn-app">
                <i class="main-action-btn-info fa fa-table"></i> Budget
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
            </div> <!-- general form elements -->

            <div class="box box-primary">
                <!-- /.box-header -->
                @if($ShowCreateForm)
                    <!-- form start -->
                        {!! Form::open(['action'=>'ProjectController@actualCostStore','class'=>'form-horizontal','id'=>'Form']) !!}
                        @include('error.error')
                        @include('admin.project._partials.actualCostForm')
                        {!! Form::close() !!}
                    @else

                    <div class="box-header with-border">
                            <div class="box-body">
                                {!! Form::open(['action'=>'ProjectController@StoreNewActualCostType','class'=>'form-horizontal','id'=>'Form']) !!}
                                <input type="number" style="display: none" value="{!! $Project->id !!}" name="project_id">
                                <div class="col-md-12">
                                    @include('error.error')
                                    <table id="CostTable" class="table table-responsive table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Cost Type</th>
                                            <th>A.Cost</th>
                                            <th>Remark</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 0?>
                                        @foreach($PROJECTOVERHEAD as $item)
                                            <tr>
                                                <input style="display: none" value="{{ $item->project_cost_type_id }}" type="number" id="ProjectCostTypeID_{{ $count }}">
                                                <input style="display: none" value="{{ $item->project_cost_type }}" id="ProjectCostType_{{ $count }}">
                                                <input style="display: none" value="{{ $item->cost }}" id="Cost_{{ $count }}">
                                                <input style="display: none" value="{{ $item->remarks }}" id="Remark_{{ $count }}">

                                                <td>
                                                    {!! $item->project_cost_type !!}
                                                </td>
                                                <td style="text-align: right">{!! number_format($item->cost,2) !!} /=</td>
                                                <td style="text-align: right">{!! $item->remarks !!}</td>
                                                <td>
                                                    <a onclick="openRowModel({!! $item->id  !!},{!! $count !!})"><i class="fa fa-2x fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            <?php $count++?>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th style="max-width: 100px">
                                                {!! Form::select('cost_type_id',\App\Models\ProjectCostType::get()->pluck('name','id'),null,['class'=>'form-control','id'=>'CostTypeId','placeholder'=>'Other Cost']) !!}
                                            </th>
                                            <th colspan="2"></th>
                                            <th>
                                                <a type="button" id="addNewCostType" class="fa fa-2x fa-plus-square"></a>
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

                @endif
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
                    <!-- /.box-header -->
                    <div style="overflow: auto" class="box-body">
                        {!! Form::open(['action'=>'ProjectController@editActualCostType','class'=>'form-horizontal']) !!}
                        <table class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Cost Type</th>
                                <th>Cost</th>
                                <th>Remark</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <td>
                                <input name="selected_row_id" id="selectedRowId" style="display: none;">
                                <input name="selected_cost_type_id" id="selectedCostTypeId" style="display: none;">
                                <input name="selected_project_id" value="{!! $Project->id !!}" style="display: none;">
                                {!! Form::text('selected_cost_type',null,['readonly','class'=>'form-control','id'=>'selectedCostType']) !!}
                            </td>
                            <td>{!! Form::number('selected_cost',null,['class'=>'form-control','id'=>'selectedCost','step'=>'0.01']) !!}</td>
                            <td>{!! Form::text('selected_remark',null,['class'=>'form-control','id'=>'selectedRemark']) !!}</td>
                            <td>
                                <input type="checkbox" name="selected_row_delete" id="selectedRowDelete">
                            </td>
                            </tbody>
                        </table>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success pull-right">Save <i class="fa fa-save"></i></button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
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

        "use strict"

        var count = 0;
        var RawCount = 1;
        var costTable = $('#CostTable');

        $('#addNewCostType').click(function() {
            addNewCostTypes();
        });

        function openRowModel(id,row) {
            $('#editModel').modal('show');

            var ProjectCostTypeID_ = '#ProjectCostTypeID_'+row;
            var ProjectCostType_ = '#ProjectCostType_'+row;
            var Cost_ = '#Cost_'+row;
            var Remark_ = '#Remark_'+row;

            $('#selectedRowId').val(id);
            $('#selectedCostType').val($(ProjectCostType_).val());
            $('#selectedCost').val($(Cost_).val());
            $('#selectedRemark').val($(Remark_).val());
            $('#selectedCostTypeId').val($(ProjectCostTypeID_).val());
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
        }

        //remove selected row
        function rowRemoves(value)
        {
            $(value).remove();
        }

    </script>
@endsection
