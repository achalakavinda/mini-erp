<div class="box-body">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Parent Category") !!}
            <select class="form-control" id="companyId" name="parent_brand_id">
                <option value="null">Select a Parent</option>

                @foreach($Categories as $item)
                    <option @if($Category->parent_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Category Name") !!}
            {!! Form::text('name',$Category->name,['class'=>'form-control','id'=>'nameId']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("company") !!}
            {!! Form::select('company_id',$Company,$Category->company_id,['readonly','class'=>'form-control','id'=>'companyId'])  !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Company Division") !!}
            {!!  Form::select('company_division_id',$CompanyDivision,$Category->company_division_id,['readonly','class'=>'form-control','id'=>'companyDivisionId'])  !!}
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>Update
    </button>
</div>
