<?php
    $DESIGNATION_UI = null;

    $DESIGNATION = \App\Models\Designation::find($User->designation_id);
    if(!empty($DESIGNATION)){
        $DESIGNATION_UI = $DESIGNATION->designationType;
    }

    //worksheet table
        $WORKSHEETS = DB::table('work_sheets')
            ->join('projects','work_sheets.project_id','=','projects.id')
            ->join('job_types','work_sheets.job_type_id','=','job_types.id')
            ->select('work_sheets.date as date','work_sheets.from','work_sheets.to','projects.code as project','job_types.jobType')
            ->where('work_sheets.user_id',$User->id)
            ->paginate(15,['*'],'worksheet');
    //--worksheet table


    //project
        $PROJECTS = DB::table('work_sheets')
            ->select(['work_sheets.project_id',DB::raw('sum(work_sheets.work_hrs) as hrs')])
            ->where('work_sheets.user_id',$User->id)->where('project_id','!=',null)
            ->groupBy('work_sheets.project_id')
            ->paginate(15,['*'],'projects');
    //--project



?>

@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile | {!! $User->name !!}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! url('/') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">profile</li>
        </ol>
    </section>


    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{!! asset('admin/dist/img/user4-128x128.jpg') !!}" alt="User profile picture">

                        <h3 class="profile-username text-center">{!! $User->name !!}</h3>

                        <p class="text-muted text-center">{!! $DESIGNATION_UI !!}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Project</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Working Hours</b> <a class="pull-right">543</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> NIC</strong>

                        <p class="text-muted">
                           {!! $User->nic !!}
                        </p>
                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                        <p class="text-muted">{!! $User->address !!}</p>
                        <hr>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->


            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#workdays" data-toggle="tab">Work Days</a></li>
                        <li><a href="#project" data-toggle="tab">Projects</a></li>
                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="workdays">

                            <table id="table" class="table table-responsive table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date </th>
                                        <th>Project</th>
                                        <th>Job</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($WORKSHEETS as $row)
                                            <tr>
                                               <td>{!! $row->date !!}</td>
                                               <td>{!! $row->project !!}</td>
                                               <td>{!! $row->jobType !!}</td>
                                               <td>{!! $row->from !!}</td>
                                               <td>{!! $row->to !!}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            {{ $WORKSHEETS->links() }}

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="project">

                            <table id="table" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Project </th>
                                    <th>Company </th>
                                    <th>Work Hrs</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($PROJECTS as $row)
                                    <?php
                                        $proj = 'undefine';
                                        $comp = 'undefine';
                                        $PJ = \App\Models\Project::find($row->project_id);
                                        if(!empty($PJ)){
                                            $proj = $PJ->code;
                                            $CM = \App\Models\Customer::find($PJ->customer_id);
                                            if(!empty($CM)){
                                                $comp = $CM->name;
                                            }
                                        }
                                    ?>
                                    <tr>
                                        <th>{{ $proj }} </th>
                                        <th>{{ $comp }} </th>
                                        <th>{{ $row->hrs }} </th>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $PROJECTS->links() }}

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">

                            {!! Form::model($User, ['method' => 'PATCH', 'action' => ['StaffController@update', $User->id],'class'=>'form-horizontal']) !!}
                               @include('error.error')
                               @include('admin.staff._partials.profileForm')
                           {!! Form::close() !!}
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>



@endsection
<!-- /main header section -->