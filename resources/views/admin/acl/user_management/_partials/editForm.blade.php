<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name','Name*',['class' => 'control-label']) !!}
            {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'Permission Type','disabled','required' => '']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '','disabled', 'required' => '']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('roles', 'Roles*', ['class' => 'control-label']) !!}
            {!! Form::select('roles[]', $Roles, old('roles') ? old('roles') : $User->roles()->pluck('name', 'name'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
        </div>
    </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
</div>