    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            {!! Form::text('name',null,['class'=>'form-control','id'=>'name' , 'placeholder'=>'Employee Name','disabled']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
            {!! Form::text('address',null,['class'=>'form-control','id'=>'address' , 'placeholder'=>'Employee Address','disabled']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Employee No</label>
        <div class="col-sm-10">
            {!! Form::text('emp_no',null,['class'=>'form-control','id'=>'employeeNo' , 'placeholder'=>'Employee No','disabled']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Cost</label>
        <div class="col-sm-10">
            {!! Form::text('cost',null,['class'=>'form-control','id'=>'cost' , 'placeholder'=>'Cost','disabled']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Hourly Rate</label>
        <div class="col-sm-10">
            {!! Form::text('hr_rates',null,['class'=>'form-control','id'=>'hourlyRate' , 'placeholder'=>'Hourly Rate','disabled']) !!}
        </div>
    </div>


    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">NIC</label>
        <div class="col-sm-10">
            {!! Form::text('nic',null,['class'=>'form-control','id'=>'employeeNic' , 'placeholder'=>'ID Number','disabled']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            {!! Form::email('email',null,['class'=>'form-control','id'=>'email' , 'placeholder'=>'Email Address','disabled']) !!}
        </div>
    </div>



<div class="box-footer">
    {{--{!! Form::submit('Change',['class'=>'btn btn-primary']) !!}--}}
</div>
