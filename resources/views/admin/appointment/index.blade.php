@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Appointments</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('appointment') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{!! url('appointment/create') !!}" class="btn btn-menu">
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
                            <th>Title</th>
                            <th>Company</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Appointments as $item)
                            <tr>
                                <td>{!! $item->id !!}</td>
                                <td>{!! $item->title !!}</td>
                                <td>{!! $item->company->name ?? 'N/A' !!}</td>
                                <td>{!! $item->customer->name ?? 'N/A' !!}</td>
                                <td>{!! $item->appointment_date !!}</td>
                                <td>{!! $item->appointment_time !!}</td>
                                <td>
                                    <span class="label label-{{ $item->status == 'scheduled' ? 'primary' : ($item->status == 'completed' ? 'success' : 'danger') }}">
                                        {!! ucfirst($item->status) !!}
                                    </span>
                                </td>
                                <td>{!! $item->location !!}</td>
                                <td>
                                    <a href="{!! url('/appointment/') !!}/{!! $item->id !!}"><i class="fa fa-eye"></i></a>
                                    <a href="{!! url('/appointment/') !!}/{!! $item->id !!}/edit"><i class="fa fa-edit"></i></a>
                                    <form method="POST" action="{!! url('/appointment/') !!}/{!! $item->id !!}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-link" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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