<?php
    $Secretary = \App\Models\CustomerSecretary::all()->pluck('name','id');
    $Service = \App\Models\CustomerService::all()->pluck('name','id');
    $Sector = \App\Models\CustomerSector::all()->pluck('name','id');
?>

<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('name','Name',['class' => 'control-label']) !!}
                    {!! Form::text('name',null,['class'=>'form-control','id'=>'name']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('contact','Contact',['class' => 'control-label']) !!}
                    {!! Form::text('contact',null,['class'=>'form-control','id'=>'contact']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('email','Email',['class' => 'control-label']) !!}
                    {!! Form::text('email',null,['class'=>'form-control','id'=>'email']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('location','Location',['class' => 'control-label']) !!}
                    {!! Form::text('location',null,['class'=>'form-control','id'=>'location']) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('address_1','Address 1',['class' => 'control-label']) !!}
                    {!! Form::textarea('address_1',null,['class'=>'form-control','id'=>'address1']) !!}
                </div>
            </div>

        </div>
        <!-- /.box-body -->
    </div>
</div>

<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-body">

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('dob','Date of Birth',['class' => 'control-label']) !!}
                    {!! Form::date('dob',\Carbon\Carbon::now(),['class'=>'form-control','id'=>'dob']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('nic','NIC',['class' => 'control-label']) !!}
                    {!! Form::text('nic',null,['class'=>'form-control','id'=>'nic']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('passport','Passport',['class' => 'control-label']) !!}
                    {!! Form::text('passport',null,['class'=>'form-control','id'=>'passport']) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('description','Description',['class' => 'control-label']) !!}
                    {!! Form::textarea('description',null,['class'=>'form-control','id'=>'description']) !!}
                </div>
            </div>

            <!-- Advance Form -->
            <div id="AdvanceForm" style="display: none">

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('contact_1','Other Contact 1',['class' => 'control-label']) !!}
                        {!! Form::text('contact_1',null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('contact_2','Other Contact 2',['class' => 'control-label']) !!}
                        {!! Form::text('contact_2',null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('contact_3','Other Contact 3',['class' => 'control-label']) !!}
                        {!! Form::text('contact_3',null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('code','Incorporation/Registration No: ',['class' => 'control-label']) !!}
                        {!! Form::text('code',null,['class'=>'form-control','id'=>'code']) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <hr/>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('address_2','Address 2',['class' => 'control-label']) !!}
                        {!! Form::textarea('address_2',null,['class'=>'form-control','id'=>'address2']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('address_3','Address 3',['class' => 'control-label']) !!}
                        {!! Form::textarea('address_3',null,['class'=>'form-control','id'=>'address3']) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('fax_number','Fax Number',['class' => 'control-label']) !!}
                        {!! Form::text('fax_number',null,['class'=>'form-control','id'=>'faxNumber']) !!}
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('tin_no','TIN No',['class' => 'control-label']) !!}
                        {!! Form::text('tin_no',null,['class'=>'form-control','id'=>'tinNo']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('vat_no','VAT No',['class' => 'control-label']) !!}
                        {!! Form::text('vat_no',null,['class'=>'form-control','id'=>'vatNo']) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <hr/>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('website','Website',['class' => 'control-label']) !!}
                        {!! Form::text('website',null,['class'=>'form-control','id'=>'website']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i> Save </button>
        </div>
    </div>
</div>


