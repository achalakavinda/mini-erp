@extends('layouts.admin')

@section('main-content-header')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Item Table</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{{ url('/ims/item') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{{ url('/ims/brand') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-table"></i> Item Brand
            </a>
            <a href="{{ url('/ims/size') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-table"></i> Item Size
            </a>
            <a href="{{ url('/ims/color') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-table"></i> Item Color
            </a>

            <a href="{{ url('/ims/item/create') }}" class="btn btn-menu">
                <i  class="main-action-btn-info fa fa-plus"></i> New Item
            </a>
        </div>
    </div>
@endsection


@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div id="itemCodeList" style="overflow: auto" class="box-body">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ mix('js/item.js') }}"></script>
@endsection
