@extends('layouts.admin')

@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Account Type</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

    <div class="box-body">

        <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>

        <a href="{{ url('/accounting/account-type') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
        </a>

        <a href="{{ url('/accounting/account-type/create') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>

    </div>
</div>
<!-- /.box -->
<!-- /main header section -->
@endsection



@section('main-content')
<!-- main section -->
@include('error.error')
<!-- form start -->
{!!
Form::open(['action'=>'Accounting\AccountTypeController@store','class'=>'form-horizontal','id'=>'Form'])
!!}
<div class="row">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        @include('admin.accounting.account-type._partials.createForm')
    </div>
    <!-- /.box -->
</div>
<!-- /.row -->
{!! Form::close() !!}
<!-- /main section -->
@endsection