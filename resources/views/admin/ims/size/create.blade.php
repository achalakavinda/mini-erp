@extends('layouts.admin')
@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">New Size</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-app">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{!! url('ims/size') !!}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
        </a>
        <a href="{!! url('ims/size/create') !!}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- /main header section -->
@endsection

@section('main-content')
<div class="row">
    {!! Form::open(['action'=>'Ims\SizeController@store','class'=>'form-horizontal','id'=>'Form']) !!}
    <div class="col-md-12">
        @include('error.error')
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label("Size") !!}
                        {!! Form::text('code',null,['class'=>'form-control','id'=>'code']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label("Description") !!}
                        {!! Form::text('description',null,['class'=>'form-control','id'=>'description']) !!}
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157"
                            class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- /.row -->
@endsection


@section('js')
@include('error.swal')
<script>
    $('#ShowAdvance').on('click',function () {
                    $('#AdvanceForm').fadeIn('slow');
                    $('#ShowAdvance').hide();
                })
</script>
@endsection