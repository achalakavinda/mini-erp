<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('jobType','Job Type',['class' => 'control-label']) !!}
            {!! Form::text('jobType',null,['class'=>'form-control','id'=>'jobType','placeholder'=>'Job Type']) !!}
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
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
</div>