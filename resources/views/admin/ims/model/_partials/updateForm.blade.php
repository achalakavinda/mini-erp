<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Designation Type') !!}
            {!! Form::text('designationType',null,['class'=>'form-control','id'=>'designationType','placeholder'=>'Designation Type']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Description') !!}
            {!! Form::text('description',null,['class'=>'form-control','id'=>'description','placeholder'=>'Description']) !!}
        </div>
    </div>


</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Edit',['class'=>'btn btn-danger']) !!}
</div>