@extends('layouts.admin')

@section('main-content-header')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Appointment: {!! $Appointment->title !!}</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('appointment') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a href="{!! url('appointment') !!}/{!! $Appointment->id !!}/edit" class="btn btn-menu">
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

                    {!! Form::model($Appointment, ['method' => 'PATCH', 'action' => ['AppointmentController@update', $Appointment->id], 'class' => 'form-horizontal', 'id' => 'Form']) !!}

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <x-form.select-company :companies="$Company" :selected="$Appointment->company_id" />
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('customer_id', 'Customer', ['class' => 'control-label']) !!}
                            {!! Form::select('customer_id', $Customers, null, [
                                'class' => 'form-control',
                                'placeholder' => 'Select Customer',
                                'required',
                            ]) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('appointment_date', 'Appointment Date', ['class' => 'control-label']) !!}
                            {!! Form::date('appointment_date', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('appointment_time', 'Appointment Time', ['class' => 'control-label']) !!}
                            {!! Form::time('appointment_time', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
                            {!! Form::select('status', [
                                'scheduled' => 'Scheduled',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled'
                            ], null, [
                                'class' => 'form-control',
                                'placeholder' => 'Select Status',
                                'required',
                            ]) !!}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('location', 'Location', ['class' => 'control-label']) !!}
                            {!! Form::text('location', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) !!}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::submit('Update Appointment', ['class' => 'btn btn-success']) !!}
                            <a href="{!! url('appointment') !!}" class="btn btn-default">Cancel</a>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection