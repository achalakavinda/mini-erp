<?php

$Secretary = \App\Models\CustomerSecretary::all()->pluck('name','id');
$Service = \App\Models\CustomerService::all()->pluck('name','id');
$Sector = \App\Models\CustomerSector::all()->pluck('name','id');

?>

<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name','*Company',['class' => 'control-label']) !!}
            {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'Company Name']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('code','*Code',['class' => 'control-label']) !!}
            {!! Form::text('code',null,['class'=>'form-control','id'=>'code','placeholder'=>'Company Code']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('contact','Contact',['class' => 'control-label']) !!}
            {!! Form::text('contact',null,['class'=>'form-control','id'=>'contact','placeholder'=>'Contact Code']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email','Email',['class' => 'control-label']) !!}
            {!! Form::text('email',null,['class'=>'form-control','id'=>'email','placeholder'=>'Email']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('file_no','File No',['class' => 'control-label']) !!}
            {!! Form::text('file_no',null,['class'=>'form-control','id'=>'fileNo','placeholder'=>'File No']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('address_1','Address 1',['class' => 'control-label']) !!}
            {!! Form::textarea('address_1',null,['class'=>'form-control','id'=>'address1','placeholder'=>'Address 1']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('address_2','Address 2',['class' => 'control-label']) !!}
            {!! Form::textarea('address_2',null,['class'=>'form-control','id'=>'address2','placeholder'=>'Address 2']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('address_3','Address 3',['class' => 'control-label']) !!}
            {!! Form::textarea('address_3',null,['class'=>'form-control','id'=>'address3','placeholder'=>'Address 3']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('fax_number','Fax Number',['class' => 'control-label']) !!}
            {!! Form::text('fax_number',null,['class'=>'form-control','id'=>'faxNumber','placeholder'=>'Fax Number']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('secretary_id','Secretary',['class' => 'control-label']) !!}
            {!! Form::select('secretary_id',$Secretary,null,['class'=>'form-control','id'=>'service']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('date_of_incorporation','Date of Incorporation',['class' => 'control-label']) !!}
            {!! Form::date('date_of_incorporation',null,['class'=>'form-control','id'=>'dateofincorporation','placeholder'=>'Date of Incorporation']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('tin_no','TIN No',['class' => 'control-label']) !!}
            {!! Form::text('tin_no',null,['class'=>'form-control','id'=>'tinNo','placeholder'=>'TIN No']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('vat_no','VAT No',['class' => 'control-label']) !!}
            {!! Form::text('vat_no',null,['class'=>'form-control','id'=>'vatNo','placeholder'=>'VAT No']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('ceo','CEO',['class' => 'control-label']) !!}
            {!! Form::text('ceo',null,['class'=>'form-control','id'=>'ceo','placeholder'=>'CEO']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('ceo_contact','CEO Contact',['class' => 'control-label']) !!}
            {!! Form::text('ceo_contact',null,['class'=>'form-control','id'=>'ceoContact','placeholder'=>'CEO Contact']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('ceo_email','CEO Email',['class' => 'control-label']) !!}
            {!! Form::text('ceo_email',null,['class'=>'form-control','id'=>'ceoEmail','placeholder'=>'CEO Email']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('cfo','CFO',['class' => 'control-label']) !!}
            {!! Form::text('cfo',null,['class'=>'form-control','id'=>'cfo','placeholder'=>'CFO']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('cfo_contact','CFO Contact',['class' => 'control-label']) !!}
            {!! Form::text('cfo_contact',null,['class'=>'form-control','id'=>'cfoContact','placeholder'=>'CFO Contact']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('cfo_email','CFO Email',['class' => 'control-label']) !!}
            {!! Form::text('cfo_email',null,['class'=>'form-control','id'=>'cfoEmail','placeholder'=>'CFO Email']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('website','Website',['class' => 'control-label']) !!}
            {!! Form::text('website',null,['class'=>'form-control','id'=>'website','placeholder'=>'Web Site Link']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('service_id','Service',['class' => 'control-label']) !!}
            {!! Form::select('service_id',$Service,null,['class'=>'form-control','id'=>'service']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('sector_id','Sector',['class' => 'control-label']) !!}
            {!! Form::select('sector_id',$Sector,null,['class'=>'form-control','id'=>'sector']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('location','Location',['class' => 'control-label']) !!}
            {!! Form::text('location',null,['class'=>'form-control','id'=>'location']) !!}
        </div>
    </div>


    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('description','Description',['class' => 'control-label']) !!}
            {!! Form::textarea('description',null,['class'=>'form-control','id'=>'description']) !!}
        </div>
    </div>


</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('update',['class'=>'btn btn-primary']) !!}
</div>
