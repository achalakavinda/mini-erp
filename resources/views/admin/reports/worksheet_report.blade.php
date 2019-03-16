<?php $Count = 0;
    $dateArray = [\Carbon\Carbon::now()->format('Y-m-d')];

    $from = \Illuminate\Support\Facades\Input::get('from');
    $to = \Illuminate\Support\Facades\Input::get('to');

    if($from!=null && $to!=null)
    {
        $to = \Carbon\Carbon::parse($to);
        if(!$to->lessThanOrEqualTo(\Carbon\Carbon::now())){
            Redirect::back()->withErrors(['Invalid Range..']);
            $to = \Carbon\Carbon::now();
        }
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

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Work Sheet Report</h3>
        </div>
        @include('admin.header-widgets.dashboard-header')
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
                    <table id="table" class="table table-responsive table-bordered table-striped">
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
                {!! Form::close() !!}

            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('style')
    {!! Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') !!}
    {!! Html::style('https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css') !!}
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
            var name = "{!! \Carbon\Carbon::now() !!}_Work Sheet Report | {!! \Carbon\Carbon::parse($from)->format('Y-m-d') !!} to {!! \Carbon\Carbon::parse($to)->format('Y-m-d') !!}"
            $('#table').DataTable({
                responsive: true,
                "dom": 'Blfrtip',
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],     // page length options
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: name
                    },
                    {
                        extend: 'pdfHtml5',
                        title: name
                    }
                ]
            })
        })
    </script>

@endsection


