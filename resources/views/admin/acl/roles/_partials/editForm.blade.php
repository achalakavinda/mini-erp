<div class="box-body">

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('name_label','Name*',['class' => 'control-label']) !!}
            {!! Form::text('name', $role->name,['class'=>'form-control','id'=>'name','readonly']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <table id="table" class="table table-responsive table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Access</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permission as $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
</div>