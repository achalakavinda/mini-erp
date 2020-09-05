@extends('layouts.admin')

@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Account Entries</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

    <div class="box-body">

        <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>

        <a href="{{ url('/accounting') }}" class="btn btn-menu">
            <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
        </a>

        <a href="{{ url('/accounting/create') }}" class="btn btn-menu">
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
Form::open(['action'=>'Accounting\AccountingController@store','class'=>'form-horizontal','id'=>'Form'])
!!}
<div class="row">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("Account Type") !!}
                    <select class="form-control" id="companyId" name="account_type_id">
                        <option value="null">Select an account type</option>
                        @foreach($AccountTypes as $AccountType)
                        <option value="{{ $AccountType->id }}">{{ $AccountType->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("Account Entry Name") !!}
                    {!! Form::text('name',null,['class'=>'form-control','id'=>'nameId',
                    'placeholder'=>'Account Name']) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label("Description") !!}
                    {!! Form::text('description',null,['class'=>'form-control','id'=>'descriptionId',
                    'placeholder'=>'Description']) !!}
                </div>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>Save
            </button>

        </div>
    </div>
    <!-- /.box -->
</div>
<!-- /.row -->
{!! Form::close() !!}
<!-- /main section -->
@endsection