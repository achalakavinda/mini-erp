<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Job Type') !!}
            {!! Form::text('jobType',null,['class'=>'form-control','id'=>'jobType','placeholder'=>'Job Type']) !!}
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
    {!! Form::submit('Update',['class'=>'btn btn-danger']) !!}
</div>