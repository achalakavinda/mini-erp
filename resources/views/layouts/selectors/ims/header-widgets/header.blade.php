<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Dashboard / Brands</h3>
    </div>
    <div class="box-body">
        <a href="{{ url('/customer/create') }}" class="btn btn-success"> Customer <i class="fa fa-plus"></i> </a>
        <a href="{{ url('ims/brand/create') }}" class="btn btn-success"> Brand <i class="fa fa-plus"></i> </a>
        <a href="{{ url('ims/item/create') }}" class="btn btn-success"> Item <i class="fa fa-plus"></i> </a>
        <a href="{{ url('ims/invoice/create') }}" class="btn btn-success"> Invoice <i class="fa fa-plus"></i> </a>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->