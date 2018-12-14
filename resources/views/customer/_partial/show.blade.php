<?php

$Secretary = \App\Models\CustomerSecretary::all()->pluck('name','id');
$Service = \App\Models\CustomerService::all()->pluck('name','id');
$Sector = \App\Models\CustomerSector::all()->pluck('name','id');

?>

<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Company') !!}
            {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'Company Name']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Code') !!}
            {!! Form::text('code',null,['class'=>'form-control','id'=>'code','placeholder'=>'Company Code']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Contact') !!}
            {!! Form::text('contact',null,['class'=>'form-control','id'=>'contact','placeholder'=>'Contact Code']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Email') !!}
            {!! Form::text('email',null,['class'=>'form-control','id'=>'email','placeholder'=>'Email']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('File No') !!}
            {!! Form::text('file_no',null,['class'=>'form-control','id'=>'fileNo','placeholder'=>'File No']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Address 1') !!}
            {!! Form::textarea('address_1',null,['class'=>'form-control','id'=>'address1','placeholder'=>'Address 1']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Address 2') !!}
            {!! Form::textarea('address_2',null,['class'=>'form-control','id'=>'address2','placeholder'=>'Address 2']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Address 3') !!}
            {!! Form::textarea('address_3',null,['class'=>'form-control','id'=>'address3','placeholder'=>'Address 3']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Fax Number') !!}
            {!! Form::text('fax_number',null,['class'=>'form-control','id'=>'faxNumber','placeholder'=>'Fax Number']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Secretary') !!}
            {!! Form::select('secretary_id',$Secretary,null,['class'=>'form-control','id'=>'service']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Date of Incorporation') !!}
            {!! Form::date('date_of_incorporation',null,['class'=>'form-control','id'=>'dateofincorporation','placeholder'=>'Date of Incorporation']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('TIN No') !!}
            {!! Form::text('tin_no',null,['class'=>'form-control','id'=>'tinNo','placeholder'=>'TIN No']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('VAT No') !!}
            {!! Form::text('vat_no',null,['class'=>'form-control','id'=>'vatNo','placeholder'=>'VAT No']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('CEO') !!}
            {!! Form::text('ceo',null,['class'=>'form-control','id'=>'ceo','placeholder'=>'CEO']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('CEO Contact') !!}
            {!! Form::text('ceo_contact',null,['class'=>'form-control','id'=>'ceoContact','placeholder'=>'CEO Contact']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('CEO Email') !!}
            {!! Form::text('ceo_email',null,['class'=>'form-control','id'=>'ceoEmail','placeholder'=>'CEO Email']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('CFO') !!}
            {!! Form::text('cfo',null,['class'=>'form-control','id'=>'cfo','placeholder'=>'CFO']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('CFO Contact') !!}
            {!! Form::text('cfo_contact',null,['class'=>'form-control','id'=>'cfoContact','placeholder'=>'CFO Contact']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('CFO Email') !!}
            {!! Form::text('cfo_email',null,['class'=>'form-control','id'=>'cfoEmail','placeholder'=>'CFO Email']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <hr/>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Website') !!}
            {!! Form::text('website',null,['class'=>'form-control','id'=>'website','placeholder'=>'Web Site Link']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Service') !!}
            {!! Form::select('service_id',$Service,null,['class'=>'form-control','id'=>'service']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Sector') !!}
            {!! Form::select('sector_id',$Sector,null,['class'=>'form-control','id'=>'sector']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Location') !!}
            {!! Form::text('location',null,['class'=>'form-control','id'=>'location']) !!}
        </div>
    </div>


    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('*Note') !!}
            {!! Form::textarea('description',null,['class'=>'form-control','id'=>'description']) !!}
        </div>
    </div>


</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary">update</button>
</div>
