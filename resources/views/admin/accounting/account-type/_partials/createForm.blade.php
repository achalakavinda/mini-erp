<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Main Account Type") !!}
            <select class="form-control" id="companyId" name="main_account_types_id">
                <option value="null">Select a Main Account Type</option>
                @foreach($MainAccountTypes as $MainAccountType)
                <option value="{{ $MainAccountType->id }}">{{ $MainAccountType->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Parent Brand") !!}
            <select class="form-control" id="companyId" name="parent_account_type_id">
                <option value="null">Select a Parent</option>
                @foreach($AccountTypes as $AccountType)
                <option value="{{ $AccountType->id }}">{{ $AccountType->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Account Name") !!}
            {!! Form::text('name',null,['class'=>'form-control','id'=>'nameId',
            'placeholder'=>'Account Name']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Description") !!}
            {!! Form::text('description',null,['class'=>'form-control','id'=>'descriptionId',
            'placeholder'=>'Description']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("company") !!}
            {!! Form::select('company_id',$Company,null,['readonly','class'=>'form-control','id'=>'companyId']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Company Division") !!}
            {!!
            Form::select('company_division_id',$CompanyDivision,null,['readonly','class'=>'form-control','id'=>'companyDivisionId'])
            !!}
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>Save
    </button>

</div>