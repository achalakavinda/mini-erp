<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('date','Date',['class' => 'control-label']) !!}
            {!! Form::Date('date',\Carbon\Carbon::now(),['class'=>'form-control','id'=>'date']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('g_l_code_id','GL Code',['class' => 'control-label']) !!}
            {!! Form::select('g_l_code_id',$GLCodes,null,['class'=>'form-control','id'=>'g_l_code_id']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('description','Description',['class' => 'control-label']) !!}
            {!! Form::text('description',null,['class'=>'form-control','id'=>'description']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('journal_code_id','Journal Code',['class' => 'control-label']) !!}
            {!! Form::select('journal_code_id',$JournalCodes,null,['class'=>'form-control','id'=>'journal_code_id']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('amount','Amount',['class' => 'control-label']) !!}
            {!! Form::number('amount',null,['class'=>'form-control','id'=>'amount']) !!}
        </div>
    </div>



</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i> Save </button>
</div>
