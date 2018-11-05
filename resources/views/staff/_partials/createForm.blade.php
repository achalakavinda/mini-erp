<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Name</label>
            {!! Form::text('name',null,['class'=>'form-control','id'=>'name' , 'placeholder'=>'Employee Name']) !!}
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
            {!! Form::text('mobile',null,['class'=>'form-control','id'=>'mobile' , 'placeholder'=>'Mobile']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="address">Hometown Districts</label>
            {!! Form::select('hometown_district_id',[],null,['class'=>'form-control','id'=>'hometowndistrictid']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="address">Mobile</label>
            {!! Form::text('mobile',null,['class'=>'form-control','id'=>'mobile' , 'placeholder'=>'Mobile']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="address">Mobile</label>
            {!! Form::text('mobile',null,['class'=>'form-control','id'=>'mobile' , 'placeholder'=>'Mobile']) !!}
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="address">Residence</label>
            {!! Form::text('residence',null,['class'=>'form-control','id'=>'residence' , 'placeholder'=>'Residence']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="address">Address</label>
            {!! Form::text('address',null,['class'=>'form-control','id'=>'address' , 'placeholder'=>'Employee Address']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="employeeNo">Employee No</label>
            {!! Form::text('emp_no',null,['class'=>'form-control','id'=>'employeeNo' , 'placeholder'=>'Employee No']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="cost">Cost</label>
            {!! Form::text('cost',null,['class'=>'form-control','id'=>'cost' , 'placeholder'=>'Cost']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="hourlyRate">Hourly Rate</label>
            {!! Form::text('hr_rates',null,['class'=>'form-control','id'=>'hourlyRate' , 'placeholder'=>'Hourly Rate']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <!-- select -->
        <div class="form-group">
            {!! Form::label('Designation') !!}
            {!! Form::select('designation_id',$Designation,null,['class'=>'form-control'])  !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('ID Number') !!}
            {!! Form::text('nic',null,['class'=>'form-control','id'=>'employeeNic' , 'placeholder'=>'ID Number']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Email') !!}
            {!! Form::email('email',null,['class'=>'form-control','id'=>'email' , 'placeholder'=>'Email Address']) !!}
        </div>
    </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
</div>
