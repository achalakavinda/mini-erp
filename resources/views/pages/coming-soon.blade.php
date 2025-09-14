@extends('layouts.admin')

@section('main-content-header')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Coming Soon</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('/dashboard') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body text-center" style="padding: 60px;">
                    <i class="fa fa-cogs fa-5x text-muted" style="margin-bottom: 30px;"></i>
                    <h2 class="text-muted">Coming Soon</h2>
                    <p class="lead text-muted">This feature is currently under development.</p>
                    <p class="text-muted">We're working hard to bring you this functionality. Please check back soon!</p>
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg" style="margin-top: 20px;">
                        <i class="fa fa-arrow-left"></i> Return to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection