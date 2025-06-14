<div class="box-body">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Parent Brand") !!}
            <select class="form-control" id="companyId" name="parent_brand_id">
                <option value="null">Select a Parent</option>
                @foreach($Brands as $item)
                    <option @if($Brand->parent_id === $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Brand Name") !!}
            {!! Form::text('name',$Brand->name,['class'=>'form-control','id'=>'nameId',
            'placeholder'=>'Brand']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("company") !!}
            {!!
            Form::select('company_id',$Company,$Brand->company_id,['readonly','class'=>'form-control','id'=>'companyId'])
            !!}
        </div>
    </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>Update
    </button>

</div>
