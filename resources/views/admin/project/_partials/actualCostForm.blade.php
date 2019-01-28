<input name="project_id" type="number" style="display: none" value="{!! $Project->id !!}">
<input name="project_code" type="text" style="display: none" value="{!! $Project->code !!}">

<!-- Cost assignment-->
<div class="box-header with-border">
    <h4 class="box-title">Cost Estimation <b id="COSTESTIMATIONVALUE"></b> <i id="COSTESTIMATIONVALUEREFRESH" style="font-size: 70%; color: green; cursor: pointer" class="fa fa-refresh"></i></h4>
    <div class="box-body">
        <div class="col-md-12">
            <table id="CostTable" class="table table-responsive table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Cost Type</th>
                        <th>B.Cost</th>
                        <th>A.Cost</th>
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody>
                <?php $count=0; $CostSum = 0;?>
                    @foreach($PROJECTOVERHEAD as $item)
                        <tr class="tr_<?php echo $count;?>">
                            <td>{!! $item->project_cost_type !!}
                                {!! Form::number('items['.$count.'][cost_type_id]',$item->id,['class'=>'form-control','style'=>'display:none']) !!}
                                {!! Form::text('items['.$count.'][cost_type_name]',$item->project_cost_type,['class'=>'form-control','style'=>'display:none']) !!}
                            </td>
                            <td>{!! $item->cost !!}</td>
                            <td>{!! Form::number('items['.$count.'][cost]',$item->cost,['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text('items['.$count.'][remark]',null,['class'=>'form-control']) !!}</td>
                            <td><a style="cursor: pointer" type="button" onclick="rowRemoves('.tr_<?php echo $count;?>')"><i class="fa fa-close"></i></a></td>
                        </tr>
                        <?php $CostSum = $CostSum+$item->cost; $count++;?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th style="max-width: 100px">
                            {!! Form::select('cost_type_id',\App\Models\ProjectCostType::get()->pluck('name','id'),null,['class'=>'form-control','id'=>'CostTypeId','placeholder'=>'Other Cost']) !!}
                        </th>
                        <th colspan="3"></th>
                        <th>
                            <a id="addNewCost" class="fa fa-2x fa-plus-square"></a>
                            <a id="calculateNewCost" class="fa fa-2x fa-calculator"></a>
                        </th>
                    </tr>
                </tfoot>
            </table>

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

        var count = 0;
        var RawCount = 1;

        $( document ).ready(function() {

            $('#addNewCost').click(function() {
                addNewCostTypes()
            });
        });



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
        }

        //remove selected row
        function rowRemoves(value) {
            $(value).remove();
        }

    </script>

@endsection