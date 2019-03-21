<div class="box-body">

    <div class="col-md-6">

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('Old_Password','Old Password',['class' => 'control-label']) !!}
                {!! Form::password('old_password',['class'=>'form-control','id'=>'OldPassword']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('new_password','New Password',['class' => 'control-label']) !!}
                {!! Form::password('new_password',['class'=>'form-control','id'=>'NewPassword']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('re_password','Re-Password',['class' => 'control-label']) !!}
                {!! Form::password('re_password',['class'=>'form-control','id'=>'RePassword']) !!}
            </div>
        </div>

    </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    @if($disabled!='disabled')
        {!! Form::submit('Update',['class'=>'btn btn-danger']) !!}
    @endif
</div>
