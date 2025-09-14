@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Appointment: {!! $Appointment->title !!}</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('appointment') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a href="{!! url('appointment') !!}/{!! $Appointment->id !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{!! url('appointment') !!}/{!! $Appointment->id !!}/edit" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-edit"></i> Edit
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection

@section('main-content')
    <!-- main section -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    @include('error.error')

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Title:</label>
                                <p class="form-control-static">{!! $Appointment->title !!}</p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Status:</label>
                                <p class="form-control-static">
                                    <span class="label label-{{ $Appointment->status == 'scheduled' ? 'primary' : ($Appointment->status == 'completed' ? 'success' : 'danger') }}">
                                        {!! ucfirst($Appointment->status) !!}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Company:</label>
                                <p class="form-control-static">{!! $Appointment->company->name ?? 'N/A' !!}</p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Customer:</label>
                                <p class="form-control-static">{!! $Appointment->customer->name ?? 'N/A' !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Appointment Date:</label>
                                <p class="form-control-static">{!! $Appointment->appointment_date !!}</p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Appointment Time:</label>
                                <p class="form-control-static">{!! $Appointment->appointment_time !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Location:</label>
                                <p class="form-control-static">{!! $Appointment->location ?? 'N/A' !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Description:</label>
                                <p class="form-control-static">{!! nl2br($Appointment->description) ?? 'N/A' !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Created At:</label>
                                <p class="form-control-static">{!! $Appointment->created_at !!}</p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Updated At:</label>
                                <p class="form-control-static">{!! $Appointment->updated_at !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- /main section -->
@endsection

@section('js')
    @include('error.swal')
@endsection