<div class="box-body">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Parent Brand") !!}
            <select class="form-control" id="companyId" name="parent_account_type_id">
                <option value="null">Select a Parent</option>
                @foreach($AccountTypes as $type)
                <option @if($AccountType->parent_id === $type->id) selected @endif
                    value="{{ $type->id }}">{{ $type->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Account Name") !!}
            {!! Form::text('name',$AccountType->name,['class'=>'form-control','id'=>'nameId',
            'placeholder'=>'Account Name']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("company") !!}
            {!!
            Form::select('company_id',$Company,$AccountType->company_id,['readonly','class'=>'form-control','id'=>'companyId'])
            !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("Company Division") !!}
            {!!
            Form::select('company_division_id',$CompanyDivision,$AccountType->company_division_id,['readonly','class'=>'form-control','id'=>'companyDivisionId'])
            !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("Description") !!}
            {!! Form::text('description',$AccountType->description,['class'=>'form-control','id'=>'descriptionId',
            'placeholder'=>'Description']) !!}
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>Update
    </button>

</div>