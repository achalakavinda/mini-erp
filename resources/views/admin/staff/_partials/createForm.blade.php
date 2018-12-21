<?php
    $CA_TRAINGINS = \App\Models\CaTraining::all()->pluck('name','id');
    $CM_LOCATION_DISTRICTS = \App\Models\CmbLocationDistrict::all()->pluck('name','id');
    $HOMETOWN_DISTRICTS = \App\Models\HometownDistrict::all()->pluck('name','id');
?>
<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('*Name') !!}
            {!! Form::text('name',null,['class'=>'form-control','id'=>'name' , 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Date Joined') !!}
            {!! Form::date('date_joined',null,['class'=>'form-control','id'=>'dateJoined']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Mobile') !!}
            {!! Form::text('mobile',null,['class'=>'form-control','id'=>'mobile']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Residence') !!}
            {!! Form::text('residence',null,['class'=>'form-control','id'=>'residence']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Hometown Districts') !!}
            {!! Form::select('hometown_district_id',$HOMETOWN_DISTRICTS,null,['class'=>'form-control','id'=>'hometownDistrict']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Hometown City') !!}
            {!! Form::text('hometown_city',null,['class'=>'form-control','id'=>'hometownCity']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Colombo Location') !!}
            {!! Form::select('cmb_location_district',$CM_LOCATION_DISTRICTS,null,['class'=>'form-control','id'=>'cmbLocationDistrict']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Colombo City') !!}
            {!! Form::text('cmb_city',null,['class'=>'form-control','id'=>'cmbCity', 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Address') !!}
            {!! Form::text('address',null,['class'=>'form-control','id'=>'address', 'placeholder'=>'']) !!}
        </div>
    </div>



    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('*Employee No') !!}
            {!! Form::text('emp_no',null,['class'=>'form-control','id'=>'employeeNo', 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EPF No') !!}
            {!! Form::text('epf_no',null,['class'=>'form-control','id'=>'epfNo', 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('*Designation') !!}
            {!! Form::select('designation_id',$Designation,null,['class'=>'form-control', 'placeholder'=>''])  !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('*Email') !!}
            {!! Form::email('email',null,['class'=>'form-control','id'=>'email', 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('*NIC Number') !!}
            {!! Form::text('nic',null,['class'=>'form-control','id'=>'employeeNic' , 'placeholder'=>'NIC Number']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Supervising Member') !!}
            {!! Form::select('user_id',[],null,['class'=>'form-control','id'=>'userId', 'placeholder'=>''])  !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('CA Agreement No') !!}
            {!! Form::text('ca_agree_no',null,['class'=>'form-control','id'=>'caAgreeNo' , 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('From') !!}
            {!! Form::date('ca_training_period_from',null,['class'=>'form-control','id'=>'caTrainingPeriodFrom', 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('To') !!}
            {!! Form::date('ca_training_period_to',null,['class'=>'form-control','id'=>'caTrainingPeriodTo', 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('CA Training') !!}
            {!! Form::select('ca_training',$CA_TRAINGINS,null,['class'=>'form-control','id'=>'caTraining', 'placeholder'=>''])  !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('*Basic Salary') !!}
            {!! Form::text('basic_sal',null,['class'=>'form-control','id'=>'basicSalary', 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EPF Cost') !!}
            {!! Form::text('epf_cost',null,['class'=>'form-control','id'=>'epfCost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('ETF Cost') !!}
            {!! Form::text('etf_cost',null,['class'=>'form-control','id'=>'etfCost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Allowance Cost') !!}
            {!! Form::text('allowance_cost',null,['class'=>'form-control','id'=>'allowanceCost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Gratuity Cost') !!}
            {!! Form::text('gratuity_cost',null,['class'=>'form-control','id'=>'gratuityCost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Other Cost') !!}
            {!! Form::text('other_cost',null,['class'=>'form-control','id'=>'otherCost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('*Cost') !!}
            {!! Form::text('cost',null,['class'=>'form-control','id'=>'cost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('*Hourly Rate') !!}
            {!! Form::text('hr_rates',null,['class'=>'form-control','id'=>'hourlyRate' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Hourly Billing Rate') !!}
            {!! Form::text('hr_billing_rates',null,['class'=>'form-control','id'=>'hrBillingRates' , 'placeholder'=>'']) !!}
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
</div>
