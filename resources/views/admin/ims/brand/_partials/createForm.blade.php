<div class="box-body">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Parent Brand") !!}
            {!! Form::select('parent_brand_id',$Brands,null
            ,['class'=>'form-control','id'=>'companyId']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Brand Name") !!}
            {!! Form::text('name',null,['class'=>'form-control','id'=>'nameId',
            'placeholder'=>'Brand']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("company") !!}
            {!! Form::select('company_id',$Company,null,['readonly','class'=>'form-control','id'=>'companyId']) !!}
        </div>
    </div>

    <div class="col-md-12">
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