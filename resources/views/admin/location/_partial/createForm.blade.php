<?php
$Secretary = \App\Models\CustomerSecretary::all()->pluck('name', 'id');
$Service = \App\Models\CustomerService::all()->pluck('name', 'id');
$Sector = \App\Models\CustomerSector::all()->pluck('name', 'id');
?>

<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">

        <div class="box-body">
            <div class="col-md-6">
                 <x-form.select-company :companies="$Company" :selected="old('company_id')" />
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                </div>
            </div>



            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                    {!! Form::textarea('address', null, ['class' => 'form-control', 'id' => 'address1']) !!}
                </div>
            </div>

        </div>
        <!-- /.box-body -->
         <div class="box-footer">
            <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i> Save
            </button>
        </div>
    </div>
</div>
