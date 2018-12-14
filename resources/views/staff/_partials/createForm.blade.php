<?php

    $CA_TRAINGINS = \App\Models\CaTraining::all()->pluck('name','id');
    $CM_LOCATION_DISTRICTS = \App\Models\CmbLocationDistrict::all()->pluck('name','id');
    $HOMETOWN_DISTRICTS = \App\Models\HometownDistrict::all()->pluck('name','id');
?>
<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Name</label>
            {!! Form::text('name',null,['class'=>'form-control','id'=>'name' , 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Date Joined</label>
            {!! Form::date('date_joined',null,['class'=>'form-control','id'=>'datejoined']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="address">Mobile</label>
            {!! Form::text('mobile',null,['class'=>'form-control','id'=>'mobile' , 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="address">Residence</label>
            {!! Form::text('residence',null,['class'=>'form-control','id'=>'residence' , 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="address">Hometown Districts</label>
            {!! Form::select('hometown_district_id',$HOMETOWN_DISTRICTS,null,['class'=>'form-control','id'=>'hometowndistrict']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="address">Hometown City</label>
            {!! Form::text('hometown_city',null,['class'=>'form-control','id'=>'hometowncity' , 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="address">Colombo Location</label>
            {!! Form::select('cmb_location_district',$CM_LOCATION_DISTRICTS,null,['class'=>'form-control','id'=>'cmblocationdistrict']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="address">Colombo City</label>
            {!! Form::text('cmb_city',null,['class'=>'form-control','id'=>'cmbcity' , 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="address">Address</label>
            {!! Form::text('address',null,['class'=>'form-control','id'=>'address' , 'placeholder'=>'']) !!}
        </div>
    </div>



    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="employeeNo">Employee No</label>
            {!! Form::text('emp_no',null,['class'=>'form-control','id'=>'employeeNo' , 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="employeeNo">EPF No</label>
            {!! Form::text('epf_no',null,['class'=>'form-control','id'=>'epfno' , 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Designation') !!}
            {!! Form::select('designation_id',$Designation,null,['class'=>'form-control'])  !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Email') !!}
            {!! Form::email('email',null,['class'=>'form-control','id'=>'email' , 'placeholder'=>'Email Address']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('NIC Number') !!}
            {!! Form::text('nic',null,['class'=>'form-control','id'=>'employeeNic' , 'placeholder'=>'NIC Number']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Supervising Member') !!}
            {!! Form::select('user_id',[],null,['class'=>'form-control','id'=>'userid'])  !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('CA Agreement No') !!}
            {!! Form::text('ca_agree_no',null,['class'=>'form-control','id'=>'caagreeno' , 'placeholder'=>'']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('From') !!}
            {!! Form::date('ca_training_period_from',null,['class'=>'form-control','id'=>'catrainingperiodfrom']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('To') !!}
            {!! Form::date('ca_training_period_to',null,['class'=>'form-control','id'=>'catrainingperiodto']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('CA Training') !!}
            {!! Form::select('ca_training',$CA_TRAINGINS,null,['class'=>'form-control','id'=>'catraining'])  !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="cost">Basic Salary</label>
            {!! Form::text('basic_sal',null,['class'=>'form-control','id'=>'basicsal' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cost">EPF Cost</label>
            {!! Form::text('epf_cost',null,['class'=>'form-control','id'=>'epfcost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cost">ETF Cost</label>
            {!! Form::text('etf_cost',null,['class'=>'form-control','id'=>'etfcost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cost">Allowance Cost</label>
            {!! Form::text('allowance_cost',null,['class'=>'form-control','id'=>'allowancecost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cost">Gratuity Cost</label>
            {!! Form::text('gratuity_cost',null,['class'=>'form-control','id'=>'gratuitycost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cost">Other Cost</label>
            {!! Form::text('other_cost',null,['class'=>'form-control','id'=>'othercost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cost">Cost</label>
            {!! Form::text('cost',null,['class'=>'form-control','id'=>'cost' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="hourlyRate">Hourly Rate</label>
            {!! Form::text('hr_rates',null,['class'=>'form-control','id'=>'hourlyRate' , 'placeholder'=>'']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="hourlyRate">Hourly Billing Rate</label>
            {!! Form::text('hr_billing_rates',null,['class'=>'form-control','id'=>'hrbillingrates' , 'placeholder'=>'']) !!}
        </div>
    </div>




</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
</div>
