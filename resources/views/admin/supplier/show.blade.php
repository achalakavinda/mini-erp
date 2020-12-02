@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Supplier : {!! $supplier->name !!}</h3>
    </div>
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->

    <div class="box-body">
        <a onclick="showMegaMenu()" href="#" class="btn btn-app">
            <i class="main-action-btn-info fa fa-list"></i> Quick Menu
        </a>
        {{-- <a href="{{ url('/ims/item/create') }}" class="btn btn-app">
        <i class="main-action-btn-info fa fa-refresh"></i> Refresh
        </a> --}}
        <a href="{{ url('supplier') }}" class="btn btn-app">
            <i class="main-action-btn-info fa fa-table"></i> Suppliers
        </a>
        <a href="{!! url('supplier/create') !!}" class="btn btn-app">
            <i class="main-action-btn-danger fa fa-plus"></i> New
        </a>
    </div>
</div>
<!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
@include('error.error')
<!-- form start -->

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            {!!
            Form::open(['action'=> ['SupplierController@update',
            $supplier->id],'class'=>'form-horizontal','id'=>'Form'])
            !!}
            @csrf
            @method('put')
            @include('error.error')
            @include('admin.supplier._partial.updateForm')
            {!! Form::close() !!}

        </div>
        {!! Form::open([
        'method' => 'DELETE',
        'route' => ['supplier.destroy', $supplier->id]
        ]) !!}
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete
        </button>
        {!! Form::close() !!}
        <!-- /.box -->
    </div>

</div>

@endsection
<!-- /main section -->