<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Brand">Brand</label>
                    {!! Form::select('brand_id',$Brands,$Item->brand_id,['class'=>'form-control','id'=>'brand_id']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Brand">Category</label>
                    {!! Form::select('category_id',$Categories,$Item->category_id,['class'=>'form-control','id'=>'category_id']) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label("Name") !!}
                    {!! Form::text('name',$Item->name,['class'=>'form-control','id'=>'name','placeholder'=>'Model Name']) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label("Description") !!}
                    {!! Form::textarea('description',$Item->description,['class'=>'form-control','id'=>'description','placeholder'=>'Description']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("Unit Cost (LKR)") !!}
                    {!! Form::text('unit_cost',$Item->unit_cost,['class'=>'form-control','id'=>'unit_cost','placeholder'=>'Unit Cost (LKR)']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("Selling Price (LKR)") !!}
                    {!! Form::text('selling_price',$Item->selling_price,['class'=>'form-control','id'=>'SellingPrice','placeholder'=>'Selling Price (LKR)']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("Nbt Tax Percentage") !!}
                    {!! Form::number('nbt_tax',$Item->nbt_tax_percentage,['class'=>'form-control','id'=>'NbtTax']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("Vat Tax Percentage") !!}
                    {!! Form::number('vat_tax',$Item->vat_tax_percentage,['class'=>'form-control','id'=>'VatTax'])  !!}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i> Update
            </button>
        </div>
    </div>
    <!-- /.box -->
</div>

