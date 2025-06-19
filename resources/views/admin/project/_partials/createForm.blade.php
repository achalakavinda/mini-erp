<div class="box-body">
    <div class="col-md-12">
        <x-form.select-company :companies="$Company" :selected="old('company_id')" />
    </div>
    
    <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('customer_id','Customer',['class' => 'control-label']) !!}
                {!! Form::select('customer_id',$Customers,null,['class'=>'form-control','id'=>'companyId']) !!}
            </div>
    </div>

    <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('job_types','Jobs',['class' => 'control-label']) !!}
                {!! Form::select('job_type',$JobTypes,null,['class'=>'form-control','id'=>'job_types']) !!}
            </div>
    </div>


    <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('sector_id','Sectors',['class' => 'control-label']) !!}
                {!! Form::select('sector_id',$CustomerSector,null,['class'=>'form-control','id'=>'sectorId']) !!}
            </div>
    </div>

    <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('budget_number_of_hrs','Budgeted Number of Hrs',['class' => 'control-label']) !!}
                {!! Form::number('budget_number_of_hrs',0,['class'=>'form-control','id'=>'budgetNumberOfHrs']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('budget_cost','Budget Cost',['class' => 'control-label']) !!}
                {!! Form::number('budget_cost',0,['readonly','class'=>'form-control','id'=>'budgeCost']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('p_y_quoted_price','P / Y Quoted Price',['class' => 'control-label']) !!}
                {!! Form::number('p_y_quoted_price',null,['class'=>'form-control','id'=>'PYQuotedPrice', 'step'=>'0.01']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('profit_ratio','Profit Mark Up',['class' => 'control-label']) !!}
                {!! Form::number('profit_ratio',10,['class'=>'form-control','id'=>'profitRatio', 'step'=>'0.01']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('quoted_price','Quoted Price',['class' => 'control-label']) !!}
                {!! Form::number('quoted_price',0,['class'=>'form-control','id'=>'quotedPrice', 'step'=>'0.01']) !!}
            </div>
        </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i> Save </button>
</div>