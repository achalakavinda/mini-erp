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
            {!! Form::select('customer_id',$Customers,null,['class'=>'form-control','id'=>'company_id']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('number_of_hrs','Number of Hrs',['class' => 'control-label']) !!}
            {!! Form::text('number_of_hrs',0,['class'=>'form-control','id'=>'number_of_hrs','placeholder'=>'Number of Hrs']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('budget_cost','Budget Cost',['class' => 'control-label']) !!}
            {!! Form::text('budget_cost',0,['class'=>'form-control','id'=>'budget_cost','placeholder'=>'Budget Cost']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('qouted_price','Quoted Price',['class' => 'control-label']) !!}
            {!! Form::text('qouted_price',0,['class'=>'form-control','id'=>'qouted_price','placeholder'=>'Qouted Price']) !!}
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