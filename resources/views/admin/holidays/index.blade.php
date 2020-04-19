<?php

    $Count = 0;
    $dateArray = [\Carbon\Carbon::now()->format('Y-m-d')];

    $from = Request::get('from');
    $to = Request::get('to');

    if($from!=null && $to!=null)
    {
        $dateArray=getDatesFromRange($from,$to);
    }

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
@section('style')
    {!! Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') !!}
    {!! Html::style('https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css') !!}
    <style>
        #table_wrapper{
            display: none;
        }
    </style>
@endsection

@section('js')
    {!! Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') !!}
    {!! Html::script('https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js') !!}
    <script type="text/javascript">
        $(function () {
            $('#loader').hide();
            $('#table_wrapper').fadeIn();
            $('#table').fadeIn();
        });
    </script>
@endsection
<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Calender</h3>
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
                {!! Form::open(['action'=>'HolidayController@store','class'=>'form-horizontal','id'=>'Form']) !!}
                <div style="overflow: auto" class="box-body">
                    <div style="position: relative; text-align: center" id="loader">
                        <img style="display: inline-block" src="{!! asset('loading.gif') !!}">
                    </div>
                    <table id="table" style="display: none" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $countRow = 0;
                            ?>
                            @foreach($dateArray as $dateItem)
                                <?php
                                $description = null;
                                $DayTypeId = 1;

                                $Day = \App\Models\Day::where('date',$dateItem)->first();
                                if($Day!=null){
                                    $description = $Day->description;
                                    $DayTypeId = $Day->type_id;
                                }
                                ?>
                                <tr>
                                    <td>
                                        <input style="display: none" name="row[{!! $countRow !!}][date]" type="text" value="{!! $dateItem !!}">
                                        {!! $dateItem !!} @if($Day!=null) <span style="color: limegreen" class="fa fa-save"></span> @endif
                                    </td>
                                    <td>
                                        {!! Form::select('',\App\Models\DayType::get()->pluck('name','id'),$DayTypeId,[ 'name'=>"row[".$countRow."][day_type]",'class'=>'form-control' ]) !!}</td>
                                    <td><input class="form-control" name="row[{!! $countRow !!}][description]" type="text" placeholder="Description" value="{!! $description !!}"></td>
                                </tr>
                                <?php $countRow++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
<!-- /main section -->
