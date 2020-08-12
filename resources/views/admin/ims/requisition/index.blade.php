@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Dashboard / Requisition</h3>
    </div>
    <div class="box-body">
        <a href="{{ url('/requisition/create') }}" class="btn btn-success">Requisition <i class="fa fa-plus"></i> </a>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">#Requisitions</h3>
            </div>
            <!-- /.box-header -->
            <div style="overflow: auto" class="box-body">
                <table id="dataTable" class="table table-responsive table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Requisition ID</th>
                            <th>Date</th>
                            <th>Requested By</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($PurchaseRequisition as $requisition)
                        <tr>
                            <td>{!! $requisition->id !!}</td>
                            <td>{!! $requisition->date !!}</td>
                            <td><?php $User = \App\Models\User::find($requisition->user_id); if($User!=null){echo $User->name;}?>
                            </td>
                            <td>{!! $requisition->purchase_requisition_status_id !!}</td>
                            <td><a href="{!! url('ims/requisition') !!}/{!! $requisition->id !!}"
                                    class="btn btn-sm btn-danger">view</a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

@endsection
<!-- /main section -->


@section('js')

<style type="text/css" href="{!! asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">
</style>
<style type="text/css">
    .dataTables_filter {
        float: right;
    }
</style>
<script type="text/javascript" src="{!! asset('bower_components/datatables.net/js/jquery.dataTables.min.js') !!}">
</script>
<script type="text/javascript" src="{!! asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}">
</script>

<script type="text/javascript">
    $('#dataTable').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
</script>

@endsection