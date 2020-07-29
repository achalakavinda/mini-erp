<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Model") !!}
            {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'Model Name']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Brand") !!}
            {!! Form::select('brand_id',$Brands,null,['class'=>'form-control','id'=>'brand_id']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Description") !!}
            {!!
            Form::text('description',null,['class'=>'form-control','id'=>'description','placeholder'=>'Description'])
            !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Unit Cost (LKR)") !!}
            {!! Form::text('unit_cost',null,['class'=>'form-control','id'=>'unit_cost','placeholder'=>'Unit
            Cost
            (LKR)']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Selling Price (LKR)") !!}
            {!! Form::text('selling_price',null,['class'=>'form-control','id'=>'SellingPrice','placeholder'=>'Selling
            Price (LKR)']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label("Nbt Tax Percentage") !!}
                {!! Form::number('nbt_tax',0,['class'=>'form-control','id'=>'NbtTax'])
                !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label("Vat Tax Percentage") !!}
                {!! Form::number('vat_tax',0,['class'=>'form-control','id'=>'VatTax'])
                !!}
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <hr>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("Opening Stock") !!}
            {!!
            Form::text('opening_stock_qty',null,['class'=>'form-control','id'=>'opening_stock_qty','placeholder'=>'Open
            Stock']) !!}
        </div>
    </div>


</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i> Save
    </button>
</div>