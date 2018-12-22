<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('designationType','*Designation Type',['class' => 'control-label']) !!}
            {!! Form::text('designationType',null,['class'=>'form-control','id'=>'designationType','placeholder'=>'Designation Type']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('description','Description',['class' => 'control-label']) !!}
            {!! Form::text('description',null,['class'=>'form-control','id'=>'description','placeholder'=>'Description']) !!}
        </div>
    </div>


</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Update',['class'=>'btn btn-danger']) !!}
</div>