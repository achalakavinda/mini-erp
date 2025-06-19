@extends('layouts.admin')

@section('main-content-header')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">New Lead</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('lead') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a href="{!! url('lead/create') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    @include('error.error')

                    {!! Form::open(['action' => 'LeadController@store', 'class' => 'form-horizontal', 'id' => 'Form']) !!}

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('post_url', 'Post URL', ['class' => 'control-label']) !!}
                            {!! Form::text('post_url', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('company_name', 'Company Name', ['class' => 'control-label']) !!}
                            {!! Form::text('company_name', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <x-form.select-company :companies="$Company" :selected="old('company_id')" />
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('lead_type_id', 'Lead Type', ['class' => 'control-label']) !!}
                            {!! Form::select('lead_type_id', $LeadTypes, null, [
                                'class' => 'form-control',
                                'placeholder' => 'Select Lead Type',
                                'required',
                            ]) !!}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::submit('Create Lead', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
