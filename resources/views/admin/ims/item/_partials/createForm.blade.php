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
                    {!! Form::select('brand_id',$Brands,null,['class'=>'form-control','id'=>'brand_id']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Brand">Category</label>
                    {!! Form::select('category_id',$Categories,null,['class'=>'form-control','id'=>'category_id']) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label("Name") !!}
                    {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'Model Name']) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label("Description") !!}
                    {!! Form::text('description',null,['class'=>'form-control','id'=>'description','placeholder'=>'Description']) !!}
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
                    {!! Form::number('unit_cost',null,['class'=>'form-control','id'=>'unit_cost','placeholder'=>'Unit Cost (LKR)']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("Selling Price (LKR)") !!}
                    {!! Form::number('selling_price',null,['class'=>'form-control','id'=>'SellingPrice','placeholder'=>'Selling Price (LKR)']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label("Market Price (LKR)") !!}
                    {!! Form::number('market_price',null,['class'=>'form-control','id'=>'MarketPrice']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label("Min Price (LKR)") !!}
                    {!! Form::number('min_price',null,['class'=>'form-control','id'=>'MinPrice']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label("Max Price (LKR)") !!}
                    {!! Form::number('max_price',null,['class'=>'form-control','id'=>'MaxPrice']) !!}
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("Nbt Tax Percentage %") !!}
                    {!! Form::number('nbt_tax',0,['class'=>'form-control','id'=>'NbtTax']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("Vat Tax Percentage %") !!}
                    {!! Form::number('vat_tax',0,['class'=>'form-control','id'=>'VatTax'])  !!}
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label("Opening Stock") !!}
                    {!!  Form::number('opening_stock_qty',0,['class'=>'form-control','id'=>'opening_stock_qty']) !!}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i> Save
            </button>
        </div>
    </div>
    <!-- /.box -->
</div>
