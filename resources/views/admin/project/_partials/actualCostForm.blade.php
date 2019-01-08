<?php
    $PROJECTOVERHEAD = \App\Models\ProjectOverhead::where('project_id',$Project->id)->get();
    $PROJECTJOBTYPE = \App\Models\ProjectJobType::where('project_id',$Project->id)->get();
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
                <?php $CostSum = 0;?>
                    @foreach($PROJECTOVERHEAD as $item)
                        <tr>
                            <td>{!! $item->project_cost_type !!}</td>
                            <td>{!! $item->cost !!}</td>
                            <td>{!! Form::number('cost[]',$item->cost,['class'=>'form-control']) !!}</td>
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
            <div class="col-md-2">
                <div class="form-group">
                    <button class="form-control" type="button" id="addNewCost">Add</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <button class="form-control" type="button" id="calculateNewCost">Calculate</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>

    </div>
</div>
<!-- /Cost assignment-->


@section('js')

@endsection
