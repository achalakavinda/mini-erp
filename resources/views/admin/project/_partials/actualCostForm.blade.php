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
                        <tr>
                            <td>{!! $item->project_cost_type !!}
                                {!! Form::number('items['.$count.'][cost_type_id]',$item->id,['class'=>'form-control','style'=>'display:none']) !!}
                                {!! Form::text('items['.$count.'][cost_type_name]',$item->project_cost_type,['class'=>'form-control','style'=>'display:none']) !!}
                            </td>
                            <td>{!! $item->cost !!}</td>
                            <td>{!! Form::number('items['.$count.'][cost]',$item->cost,['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text('items['.$count.'][remark]',null,['class'=>'form-control']) !!}</td>
                            <td><a href="#"><i class="fa fa-close"></i></a></td>
                        </tr>
                        <?php $CostSum = $CostSum+$item->cost; $count++;?>
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
            <div class="col-md-2">
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

@endsection
