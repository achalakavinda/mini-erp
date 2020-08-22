<?php
    $Designation = \App\Models\Designation::all()->pluck('designationType','id');
    $CA_TRAINGINS = \App\Models\CaTraining::all()->pluck('name','id');
    $CM_LOCATION_DISTRICTS = \App\Models\CmbLocationDistrict::all()->pluck('name','id');
    $HOMETOWN_DISTRICTS = \App\Models\HometownDistrict::all()->pluck('name','id');

    if(Auth::user()->hasAnyPermission([config('constant.Permission_Profile_Update')])){
        $disabled=null;
    }else{
        $disabled ='disabled';
    }
?>
<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name','Name',['class' => 'control-label']) !!}
            {!! Form::text('name',null,['class'=>'form-control','id'=>'name' ,$disabled]) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('date_joined','Date Joined',['class' => 'control-label']) !!}
            {!! Form::date('date_joined',$User->Employee?$User->Employee->date_joined:null,['class'=>'form-control','id'=>'dateJoined',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('mobile','Mobile',['class' => 'control-label']) !!}
            {!! Form::text('mobile',$User->Employee?$User->Employee->mobile:null,['class'=>'form-control','id'=>'mobile' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('residence','Residence',['class' => 'control-label']) !!}
            {!! Form::text('residence',$User->Employee?$User->Employee->residence:null,['class'=>'form-control','id'=>'residence' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('hometown_district_id','Hometown Districts',['class' => 'control-label']) !!}
            {!! Form::select('hometown_district_id',$HOMETOWN_DISTRICTS,$User->Employee?$User->Employee->hometown_district_id:null,['class'=>'form-control','id'=>'homeTownDistrict',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('hometown_city','Hometown City',['class' => 'control-label']) !!}
            {!! Form::text('hometown_city',$User->Employee?$User->Employee->hometown_city:null,['class'=>'form-control','id'=>'homeTownCity' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('cmb_location_district','Colombo Location',['class' => 'control-label']) !!}
            {!! Form::select('cmb_location_district',$CM_LOCATION_DISTRICTS,$User->Employee?$User->Employee->cmb_location_district:null,['class'=>'form-control','id'=>'cmbLocationDistrict',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('cmb_city','Colombo City',['class' => 'control-label']) !!}
            {!! Form::text('cmb_city',$User->Employee?$User->Employee->cmb_city:null,['class'=>'form-control','id'=>'cmbCity' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('address','Address',['class' => 'control-label']) !!}
            {!! Form::text('address',$User->Employee?$User->Employee->address:null,['class'=>'form-control','id'=>'address' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>



    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('emp_no','Employee No',['class' => 'control-label']) !!}
            {!! Form::text('emp_no',$User->Employee?$User->Employee->emp_no:null,['class'=>'form-control','id'=>'employeeNo' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('epf_no','EPF No',['class' => 'control-label']) !!}
            {!! Form::text('epf_no',$User->Employee?$User->Employee->epf_no:null,['class'=>'form-control','id'=>'epfNo' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('designation_id','Designation',['class' => 'control-label']) !!}
            {!! Form::select('designation_id',$Designation,$User->Employee?$User->Employee->designation_id:null,['class'=>'form-control',$disabled])  !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('email','Email',['class' => 'control-label']) !!}
            {!! Form::email('email',$User->Employee?$User->Employee->email:null,['class'=>'form-control','id'=>'email' , 'placeholder'=>'Email Address',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('nic','NIC Number',['class' => 'control-label']) !!}
            {!! Form::text('nic',$User->Employee?$User->Employee->nic:null,['class'=>'form-control','id'=>'employeeNic' , 'placeholder'=>'NIC Number',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('user_id','Supervising Member',['class' => 'control-label']) !!}
            {!! Form::select('user_id',[],$User->Employee?$User->Employee->supervisor_user_id:null,['class'=>'form-control','id'=>'userid',$disabled])  !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('ca_agree_no','CA Agreement No',['class' => 'control-label']) !!}
            {!! Form::text('ca_agree_no',$User->Employee?$User->Employee->ca_agree_no:null,['class'=>'form-control','id'=>'caAgreeNo' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('ca_training_period_from','From',['class' => 'control-label']) !!}
            {!! Form::date('ca_training_period_from',$User->Employee?$User->Employee->ca_training_period_from:null,['class'=>'form-control','id'=>'caTrainingPeriodFrom',$disabled]) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('ca_training_period_to','To',['class' => 'control-label']) !!}
            {!! Form::date('ca_training_period_to',$User->Employee?$User->Employee->ca_training_period_to:null,['class'=>'form-control','id'=>'caTrainingPeriodTo',$disabled]) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('ca_training','CA Training',['class' => 'control-label']) !!}
            {!! Form::select('ca_training',$CA_TRAINGINS,$User->Employee?$User->Employee->ca_training:null,['class'=>'form-control','id'=>'caTraining',$disabled])  !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('basic_sal','*Basic Salary',['class' => 'control-label']) !!}
            {!! Form::text('basic_sal',$User->Employee?$User->Employee->basic_sal:null,['class'=>'form-control','id'=>'basicSal' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('epf_cost','EPF Cost',['class' => 'control-label']) !!}
            {!! Form::text('epf_cost',$User->Employee?$User->Employee->epf_cost:null,['class'=>'form-control','id'=>'epfCost' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('etf_cost','ETF Cost',['class' => 'control-label']) !!}
            {!! Form::text('etf_cost',$User->Employee?$User->Employee->etf_cost:null,['class'=>'form-control','id'=>'etfCost' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('allowance_cost','Allowance Cost',['class' => 'control-label']) !!}
            {!! Form::text('allowance_cost',$User->Employee?$User->Employee->allowance_cost:null,['class'=>'form-control','id'=>'allowanceCost' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('gratuity_cost','Gratuity Cost',['class' => 'control-label']) !!}
            {!! Form::text('gratuity_cost',$User->Employee?$User->Employee->gratuity_cost:null,['class'=>'form-control','id'=>'gratuityCost' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('other_cost','Other Cost',['class' => 'control-label']) !!}
            {!! Form::text('other_cost',$User->Employee?$User->Employee->other_cost:null,['class'=>'form-control','id'=>'otherCost' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('cost','*Cost',['class' => 'control-label']) !!}
            {!! Form::text('cost',$User->Employee?$User->Employee->cost:null,['class'=>'form-control','id'=>'cost' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('hr_rates','*Hourly Rate',['class' => 'control-label']) !!}
            {!! Form::text('hr_rates',$User->Employee?$User->Employee->hr_rates:null,['class'=>'form-control','id'=>'hourlyRate' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('hr_billing_rates','Hourly Billing Rate',['class' => 'control-label']) !!}
            {!! Form::text('hr_billing_rates',$User->Employee?$User->Employee->hr_billing_rates:null,['class'=>'form-control','id'=>'hrBillingRates' , 'placeholder'=>'',$disabled]) !!}
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    @if($disabled!='disabled')
        <button type="submit" class="btn btn-app pull-right"><i class="fa fa-save"></i> Update </button>
    @endif
</div>
