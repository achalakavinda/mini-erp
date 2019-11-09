<?php

    $ItemCode = \App\Models\Ims\ItemCode::all()->pluck('name','id');

?>
<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Model") !!}
            {!! Form::select('model_id',$ItemCode,null,['class'=>'form-control','id'=>'modelid']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Qty") !!}
            {!! Form::text('qty',null,['class'=>'form-control','id'=>'qty']) !!}
        </div>
    </div>


</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
