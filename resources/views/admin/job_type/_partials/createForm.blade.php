<div class="box-body">

    <div class="col-md-6">
           <div class="form-group">
               {!! Form::label('jobType','Job Type',['class' => 'control-label']) !!}
               {!! Form::text('jobType',null,['class'=>'form-control','id'=>'jobType','placeholder'=>'Job Type']) !!}
           </div>
    </div>
    <div class="col-md-6">
           <div class="form-group">
               {!! Form::label('key','Key',['class' => 'control-label']) !!}
               {!! Form::text('key',null,['class'=>'form-control','id'=>'Key','placeholder'=>'Key']) !!}
           </div>
    </div>

    <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('description','Description',['class' => 'control-label']) !!}
                {!! Form::text('description',null,['class'=>'form-control','id'=>'description','placeholder'=>'Description']) !!}
            </div>
    </div>


</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i> Save </button>
</div>