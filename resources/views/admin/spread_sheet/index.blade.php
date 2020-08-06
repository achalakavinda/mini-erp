@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard</h3>
        </div>
        @include('admin.components.header-widgets.dashboard-header')
    </div>
    <div class="box">
        <div style="padding: 10px" class="row">

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="{!! url('spread-sheet/view-staff-spread-sheet-import') !!}">
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon"><i class="fa fa-table"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Staff Sheet</span>
                                    <span class="info-box-number"></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        Import Staff Registry
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div><!--/.col -->


        </div>
        <!-- /.row -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->
