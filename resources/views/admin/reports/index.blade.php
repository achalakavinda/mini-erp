@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard</h3>
        </div>
        @include('admin.header-widgets.dashboard-header')
    </div>
    <div class="box">
        <div style="padding: 10px" class="row">

            <?php $testArr = [1,2,3,4,5,6,7,8,9,10] ?>

            @foreach($testArr as $data)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="#">
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon"><i class="fa fa-cube"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Report {!! $data !!}</span>
                                    <span class="info-box-number"></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 70%"></div>
                                    </div>
                                    <span class="progress-description">
                                        Employee Contribution
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div><!--/.col -->
            @endforeach


        </div>
        <!-- /.row -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->