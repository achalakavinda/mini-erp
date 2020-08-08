<?php
    $Count = 0;
    $dateArray = [\Carbon\Carbon::now()->format('Y-m-d')];

    $from = Request::get('from');
    $to = Request::get('to');

    if($from!=null && $to!=null)
    {
        $to = \Carbon\Carbon::parse($to);
        if(!$to->lessThanOrEqualTo(\Carbon\Carbon::now())){
            Redirect::back()->withErrors(['Invalid Range..']);
            $to = \Carbon\Carbon::now();
            $from = \Carbon\Carbon::now();
        }
        $dateArray=getDatesFromRange($from,$to);
    }

    $ImportTitle = \Carbon\Carbon::now().' Work Sheet Report '.\Carbon\Carbon::parse($from)->format('Y-m-d').' to '.\Carbon\Carbon::parse($to)->format('Y-m-d');


    function getDatesFromRange($start, $end, $format = 'Y-m-d') {
            $array = array();
            $interval = new \DateInterval('P1D');
            $realEnd = new \DateTime($end);
            $realEnd->add($interval);
            $period = new \DatePeriod(new \DateTime($start), $interval, $realEnd);
            foreach($period as $date) {
                $array[] = $date->format($format);
            }
            return $array;
        }

?>
@extends('layouts.admin')
@include('admin.reports._partials.script')
<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Work Sheet Report</h3>
        </div>
        @include('admin.components.header-widgets.dashboard-header')
        @include('admin.reports.shortcuts.index')
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
                    <form>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('from','From',['class' => 'control-label']) !!}
                                @if($from)
                                    {!! Form::date('from',$from,['class'=>'form-control','id'=>'name']) !!}
                                    @else
                                    {!! Form::date('from',\Carbon\Carbon::now(),['class'=>'form-control','id'=>'name']) !!}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('to','To',['class' => 'control-label']) !!}

                                @if($to)
                                    {!! Form::date('to',$to,['class'=>'form-control','id'=>'name']) !!}
                                @else
                                    {!! Form::date('to',\Carbon\Carbon::now(),['class'=>'form-control','id'=>'name']) !!}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('button','Check',['class' => 'control-label']) !!}
                                <button class="form-control">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-header -->
            @include('error.error')
            <div style="overflow: auto" class="box-body">
                <div style="position: relative; text-align: center" id="loader">
                    <img style="display: inline-block" src="{!! asset('loading.gif') !!}">
                </div>
                <table id="table" style="display: none" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>No of Projects</th>
                            <th>Work Hrs</th>
                            <th>Actual Work Hrs</th>
                            <th>Extra Work Hrs</th>
                            <th>Work Hr Cost</th>
                            <th>Extra Hr Cost</th>
                            <th>Aggregated Cost</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($dateArray as $dateItem)
                                <?php
                                    $values = \App\Models\WorkSheet::get()->where('date',$dateItem);
                                    $NoOfProjects = 0;
                                    $work_hrs = 0;
                                    $actual_work_hrs = 0;
                                    $extra_work_hrs = 0;
                                    $hr_cost = 0;
                                    $extra_work_cost = 0;
                                    $actual_hr_cost = 0;

                                    foreach ($values as $value){
                                        $work_hrs = $work_hrs+$value->work_hrs;
                                        $actual_work_hrs = $actual_work_hrs+$value->actual_work_hrs;
                                        $extra_work_hrs = $extra_work_hrs+$value->extra_work_hrs;

                                        $hr_cost = $hr_cost+$value->hr_cost;
                                        $extra_work_cost = $extra_work_cost+$value->extra_work_hrs*$value->hr_rate;
                                        $actual_hr_cost = $actual_hr_cost+$value->actual_hr_cost;
                                        $NoOfProjects++;
                                    }
                                ?>
                                <tr>
                                    <td>{!! $dateItem !!}</td>
                                    <td>{!! $NoOfProjects !!}</td>
                                    <td>{!! $work_hrs !!}</td>
                                    <td>{!! $actual_work_hrs !!}</td>
                                    <td>{!! $extra_work_hrs !!}</td>
                                    <td>{!! $hr_cost !!}</td>
                                    <td>{!! $extra_work_cost !!}</td>
                                    <td>{!! $actual_hr_cost !!}</td>
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


