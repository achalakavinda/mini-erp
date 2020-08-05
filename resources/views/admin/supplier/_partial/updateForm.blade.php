<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Name") !!}
            {!! Form::text('name',$supplier->name,['class'=>'form-control','id'=>'name','placeholder'=>'Name']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Phone No") !!}
            {!! Form::text('contact',$supplier->contact,['class'=>'form-control','id'=>'contact','placeholder'=>'Phone
            Number']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Email") !!}
            {!! Form::text('email',$supplier->email,['class'=>'form-control','id'=>'email','placeholder'=>'Email']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Web URL") !!}
            {!! Form::text('web_url',$supplier->web_url,['class'=>'form-control','id'=>'web_url','placeholder'=>'Web
            URL']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("company") !!}
            {!!
            Form::select('company_id',$Company,$supplier->company_id,['readonly','class'=>'form-control','id'=>'companyId'])
            !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Company Division") !!}
            {!!
            Form::select('company_division_id',$CompanyDivision,$supplier->company_division_id,['readonly','class'=>'form-control','id'=>'companyDivisionId'])
            !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Address') !!}
            {!! Form::textarea('address',$supplier->address,['class'=>'form-control','id'=>'address']) !!}
        </div>
    </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i> Save
    </button>
</div>