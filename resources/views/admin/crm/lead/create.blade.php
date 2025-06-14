@extends('layouts.admin')

@section('main-content-header')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">New Lead</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-app">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{{ url('lead') }}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
        </a>
        <a href="{{ url('lead/create') }}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
    </div>
</div>
@endsection

@section('main-content')
<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">New Lead</h3>
                @include('error.error')
            </div>

            {!! Form::open(['action'=>'LeadController@store','class'=>'form-horizontal','id'=>'Form']) !!}
            <div class="box-body">

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label("Post URL") !!}
                        {!! Form::text('post_url', null, ['class'=>'form-control','id'=>'post_url','placeholder'=>'Post URL']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label("Email") !!}
                        {!! Form::email('email', null, ['class'=>'form-control','id'=>'email','placeholder'=>'Email']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label("Company Name") !!}
                        {!! Form::text('company_name', null, ['class'=>'form-control','id'=>'company_name','placeholder'=>'Company Name']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label("Company") !!}
                        {!! Form::select('company_id', $Company, null, ['class'=>'form-control','id'=>'companyId']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label("Lead Type") !!}
                        {!! Form::select('lead_type_id', $LeadTypes, null, ['class'=>'form-control','id'=>'lead_type_id']) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label("Message") !!}
                        {!! Form::textarea('message', null, ['class'=>'form-control','id'=>'message','rows'=>3,'placeholder'=>'Enter message']) !!}
                    </div>
                </div>

            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-app pull-right">
                    <i style="color: #00a157" class="fa fa-save"></i> Save
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('js')
@include('error.swal')
@endsection
