<?php
    $Customers = \App\Models\Customer::all()->pluck('name','id');
    $JobTypes = \App\Models\JobType::all()->pluck('jobType','id');
?>

<div class="box-body">

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('code','Code',['class' => 'control-label']) !!}
            {!! Form::text('code',null,['class'=>'form-control','id'=>'code','placeholder'=>'Code']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('customer_id','Company',['class' => 'control-label']) !!}
            {!! Form::select('customer_id',$Customers,null,['class'=>'form-control','id'=>'companyId']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('budget_number_of_hrs','Budgeted Number of Hrs',['class' => 'control-label']) !!}
            {!! Form::number('budget_number_of_hrs',0,['class'=>'form-control','id'=>'budgetNumberOfHrs']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('budget_cost','Budget Cost',['class' => 'control-label']) !!}
            {!! Form::number('budget_cost',0,['class'=>'form-control','id'=>'budgeCost']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('profit_ratio','Profit Ratio',['class' => 'control-label']) !!}
            {!! Form::number('profit_ratio',0,['class'=>'form-control','id'=>'profitRatio', 'step'=>'0.01']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('quoted_price','Quoted Price',['class' => 'control-label']) !!}
            {!! Form::number('quoted_price',0,['class'=>'form-control','id'=>'quotedPrice', 'step'=>'0.01']) !!}
        </div>
    </div>


</div>
<!-- /.box-body -->

<div class="box-header with-border">
    <h4 class="box-title">Assign Jobs</h4>
</div>

<div class="box-body">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('job_types','Jobs',['class' => 'control-label']) !!}
            {!! Form::select('job_types',$JobTypes,null,['class'=>'form-control','id'=>'job_types','name'=>'job_types[]']) !!}
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
</div>