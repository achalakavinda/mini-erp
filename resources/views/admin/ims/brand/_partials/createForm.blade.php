<div class="box-body">

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Brand Name") !!}
            {!! Form::text('name',null,['class'=>'form-control','id'=>'name', 'placeholder'=>'Brand']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("company") !!}
            {!! Form::select('company_id',$Company,null,['readonly','class'=>'form-control','id'=>'companyid']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("division") !!}
            {!! Form::select('division_id',$Division,null,['readonly','class'=>'form-control','id'=>'divisionid']) !!}
        </div>
    </div>


</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>