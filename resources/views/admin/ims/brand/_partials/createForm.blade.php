<div class="box-body">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Parent Brand") !!}
            {!! Form::select('parent_brand_id',$Brands,($Brand) ? $Brand->parent_id : null
            ,['class'=>'form-control','id'=>'companyId']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Brand Name") !!}
            {!! Form::text('name',($Brand) ? $Brand->name : null,['class'=>'form-control','id'=>'nameId',
            'placeholder'=>'Brand']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("company") !!}
            {!! Form::select('company_id',$Company,($Brand) ? $Brand->company_id :
            null,['readonly','class'=>'form-control','id'=>'companyId']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Company Division") !!}
            {!!
            Form::select('company_division_id',$CompanyDivision,($Brand) ? $Brand->company_division_id :
            null,['readonly','class'=>'form-control','id'=>'companyDivisionId'])
            !!}
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>{!!($Brand) ?
        'Update' : 'Save'!!}
    </button>
    @if ($Brand)
    {!! Form::open([
    'method' => 'DELETE',
    'route' => ['brand.destroy', $Brand->id]
    ]) !!}
    <button type="submit" style="color: #ff0000" class="btn btn-app pull-right"><i style="color: #ff0000"
            class="fa fa-trash"></i>Delete
    </button>
    {!! Form::close() !!}
    @endif

</div>