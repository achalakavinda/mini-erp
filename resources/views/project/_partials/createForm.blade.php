<?php
    $Customers = \App\Models\Customer::all()->pluck('name','id');
    $JobTypes = \App\Models\JobType::all()->pluck('jobType','id');
//    $Employess = \App\Models\User::where('designation_id','!=',-999)->pluck('name','id');
?>

<div class="box-body">

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Code') !!}
            {!! Form::text('code',null,['class'=>'form-control','id'=>'code','placeholder'=>'Code']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Company') !!}
            {!! Form::select('customer_id',$Customers,null,['class'=>'form-control','id'=>'company_id']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Number of Hrs') !!}
            {!! Form::text('number_of_hrs',0,['class'=>'form-control','id'=>'number_of_hrs','placeholder'=>'Number of Hrs']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Budget Cost') !!}
            {!! Form::text('budget_cost',0,['class'=>'form-control','id'=>'budget_cost','placeholder'=>'Budget Cost']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Quoted Price') !!}
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
            {!! Form::label('Jobs') !!}
            {!! Form::select('job_types',$JobTypes,null,['class'=>'form-control','id'=>'job_types','name'=>'job_types[]']) !!}
        </div>
    </div>
</div>
<!-- /.box-body -->


{{--<div class="box-header with-border">--}}
    {{--<h4 class="box-title">Assign Employees</h4>--}}
{{--</div>--}}

{{--<div class="box-body">--}}
    {{--<div class="col-md-12">--}}
        {{--<div class="form-group">--}}
            {{--{!! Form::label('Employee') !!}--}}
            {{--{!! Form::select('employee',$Employess,null,['class'=>'form-control','id'=>'employee']) !!}--}}

        {{--</div>--}}
        {{--<div style="position: relative; height: 50px;" class="form-group">--}}
            {{--<button style="position: absolute;top: 5px; right: 5px" class="btn btn-sm  btn-primary" type="button"  id="add">Add</button>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-12">--}}
       {{--<div class="form-group" id="box"></div>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- /.box-body -->


<div class="box-footer">
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
</div>