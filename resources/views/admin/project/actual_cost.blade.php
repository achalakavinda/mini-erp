@extends('layouts.admin')
<?php
    $PROJECTOVERHEAD = \App\Models\ProjectOverheadsActual::where('project_id',$Project->id)->get();
    $ShowCreateForm = false;

    if($PROJECTOVERHEAD->isEmpty()){
        $PROJECTOVERHEAD = \App\Models\ProjectOverhead::where('project_id',$Project->id)->get();
        $ShowCreateForm=true;
    }

?>



<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Project Actual Cost | {!! $Project->code !!}</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/project') }}/{!! $Project->id !!}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/project') }}/{!! $Project->id !!}/estimation" class="btn btn-danger">Budget <i class="fa fa-plus-square"></i></a>
            <a href="{{ url('/project') }}/{!! $Project->id !!}/actual-cost" class="btn btn-danger">Actual Cost <i class="fa fa-money"></i></a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">

                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>B.Hrs</th>
                            <th>B.Cost</th>
                            <th>B.Revenue</th>
                            <th>A.Hrs</th>
                            <th>A.Cost By Work</th>
                            <th>A.Cost By Overheads</th>
                            <th>SUM(A.Cost)</th>
                            <th>A.Revenue</th>
                            <th>Cost Variance</th>
                            <th>Recovery Ratio</th>
                            <th>status</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>{!! $Project->budget_number_of_hrs  !!}</td>
                            <td>{!! $Project->budget_cost  !!}</td>
                            <td>{!! $Project->budget_revenue  !!}</td>
                            <td>{!! $Project->actual_number_of_hrs  !!}</td>
                            <td>{!! $Project->actual_cost_by_work  !!}</td>
                            <td>{!! $Project->actual_cost_by_overhead  !!}</td>
                            <td>{!! $Project->actual_cost_by_work+$Project->actual_cost_by_overhead  !!}</td>
                            <td>{!! $Project->actual_revenue  !!}</td>
                            {{--<td>{!! $Project->cost_variance  !!}</td>--}}
                            {{--<td>{!! $Project->recovery_ratio  !!}</td>--}}

                            <?php
                            $revnue = $Project->actual_revenue;
                            $cost = $Project->budget_cost;
                            $recovery_ratio = 0;
                            if($revnue>0 && $cost>0){
                                $recovery_ratio = $revnue / $cost;
                            }

                            $CV = $Project->budget_cost - ($Project->actual_cost_by_work+$Project->actual_cost_by_overhead);
                            ?>

                            <td><?php
                                if($CV>0){
                                    echo '<span style="color: green">'.$CV.' <i class="fa fa-arrow-up"></i></span>';
                                }else{
                                    echo '<span style="color: red">'.$CV.' <i class="fa fa-arrow-down"></i></span>';
                                }
                                ?></td>
                            <td>{{ $recovery_ratio }}</td>

                            <td><b>@if($Project->close)Close @else Pending @endif</b></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!-- /.box-header -->
                @if($ShowCreateForm)
                    <!-- form start -->
                        {!! Form::open(['action'=>'ProjectController@actualCostStore','class'=>'form-horizontal','id'=>'Form']) !!}
                        @include('error.error')
                        @include('admin.project._partials.actualCostForm')
                        {!! Form::close() !!}
                    @else

                    <div class="box-header with-border">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <table id="CostTable" class="table table-responsive table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Cost Type</th>
                                            <th>A.Cost</th>
                                            <th>Remark</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count=0; $CostSum = 0;?>
                                        @foreach($PROJECTOVERHEAD as $item)
                                            <tr>
                                                <td>{!! $item->project_cost_type !!}
                                                    {!! Form::number('items['.$count.'][cost_type_id]',$item->id,['class'=>'form-control','style'=>'display:none']) !!}
                                                    {!! Form::text('items['.$count.'][cost_type_name]',$item->project_cost_type,['class'=>'form-control','style'=>'display:none']) !!}
                                                </td>
                                                <td style="text-align: right">{!! $item->cost !!} /=</td>
                                                <td style="text-align: right">{!! $item->remarks !!}</td>
                                            </tr>
                                            <?php $CostSum = $CostSum+$item->cost; $count++;?>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td><b>Item Count : <span>{!! $count !!}</span></b></td>
                                                <td style="text-align: right"><b><span>{!! $CostSum !!}</span> /=</b></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                @endif
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
@endsection
<!-- /main section -->
