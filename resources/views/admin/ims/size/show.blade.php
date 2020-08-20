@extends('layouts.admin')
@section('main-content-header')
<!-- main header section -->
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Size</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-app">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        <a href="{!! url('ims/size') !!}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
        </a>
        <a href="{!! url('/ims/size/') !!}/{!! $Size->id !!}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a>
        <a href="{!! url('ims/size/create') !!}" class="btn btn-app">
            <i class="main-action-btn-danger fa fa-plus"></i> New
        </a>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- /main header section -->
@endsection

@section('main-content')
<div class="row">
    {!! Form::model($Size, ['method' => 'PATCH', 'action' => ['Ims\SizeController@update',
    $Size->id],'class'=>'form-horizontal']) !!}
    <div class="col-md-12">
        @include('error.error')
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label("Size") !!}
                        {!! Form::text('code',$Size->code,['class'=>'form-control','id'=>'code']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label("Description") !!}
                        {!! Form::text('description',$Size->description,['class'=>'form-control','id'=>'description'])
                        !!}
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157"
                            class="fa fa-save"></i> Update
                    </button>
                    <a onclick="Onclick()" style="color:red" class="btn btn-app pull-right"><i style="color:red"
                            class="fa fa-trash"></i>
                        Delete
                    </a>

                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE','route' => ['size.destroy', $Size->id],'id'=> 'deleteForm']) !!}
    {!! Form::close() !!}

</div>
<!-- /.row -->
@endsection


@section('js')
@include('error.swal')
<script>
    function Onclick() {
        $('#deleteForm').submit();
    }
    $('#ShowAdvance').on('click',function () {
                    $('#AdvanceForm').fadeIn('slow');
                    $('#ShowAdvance').hide();
                })
</script>
@endsection