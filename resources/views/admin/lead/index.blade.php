@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Leads</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('lead') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{!! url('lead/create') !!}" class="btn btn-menu">
                <i class="main-action-btn-danger fa fa-plus"></i> New
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection

@section('main-content')
    <!-- main section -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Post Url</th>
                            <th>Message</th>
                            <th>Time</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Leads as $item)
                            <tr>
                                <td>{!! $item->id !!}</td>
                                <td>{!! $item->company->name ?? 'N/A' !!}</td>
                                <td>{!! $item->email !!}</td>
                                <td>{!! $item->post_url !!}</td>
                                <td>{!! $item->message !!}</td>                    
                                <td>{!! $item->created_at !!}</td>
                                <td>
                                    <a href="{!! url('/lead/') !!}/{!! $item->id !!}"><i class="fa fa-paper-plane"></i></a>
                                </td>
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
    <!-- /main section -->
@endsection

@section('js')
    @include('layouts.components.dataTableJs.index')
@endsection
