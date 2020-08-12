@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Dashboard / Requisition</h3>
    </div>
    <div class="box-body">
        <a href="{{ url('/ims/requisition') }}" class="btn btn-success"> Requisition <i class="fa fa-backward"></i> </a>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($Requisition, ['method' => 'PATCH', 'action' => ['Ims\PurchaseRequisitionController@update',
            $Requisition->id],'class'=>'form-horizontal']) !!}
            @include('error.error')
            @include('admin.ims.requisition._partials.showForm')
            {!! Form::close() !!}

            @if(!$Requisition->purchase_requisition_status_id)
            {!!
            Form::open(['action'=>'Ims\PurchaseRequisitionController@postToPurchase','style'=>'display:none','id'=>'postToPurchase'])
            !!}
            @csrf()
            <input type="number" value="{{ $Requisition->id }}" name="grn_id">
            {{ Form::close() }}
            @endif

            <div style="height: 100px" class="box-footer">
                @if(!$Requisition->purchase_requisition_status_id)
                <button disabled style="width: 100px;margin: 2px" type="submit"
                    class="btn btn-primary pull-right">Edit</button>
                <button style="width: 100px;margin: 2px" onclick="Onclick()"
                    class="btn btn-primary  pull-right">Purchase</button>
                @endif
            </div>

        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->

@endsection
<!-- /main section -->
@section('js')
<script>
    function Onclick() {
        $('#postToPurchase').submit();
    }

</script>
@endsection