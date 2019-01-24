<div class="box-header with-border">
    <h4 class="box-title">Project Summary</h4>
</div>
<div style="overflow: auto" class="box-body">
    <table id="table" class="table table-responsive table-bordered table-striped">
        <thead>
        <tr>
            <th >Description</th>
            <th style="text-align: right">Budget</th>
            <th style="text-align: right">Actual</th>
            <th style="text-align: right">Variance</th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <th>Work Hrs</th>
                <td style="text-align: right">{!! number_format($Project->budget_number_of_hrs,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->actual_number_of_hrs,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->budget_number_of_hrs-$Project->actual_number_of_hrs,2)  !!}</td>
            </tr>

            <tr>
                <th>Staff Cost</th>
                <td style="text-align: right">{!! number_format($Project->budget_cost_by_work,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->actual_cost_by_work,2)  !!}</td>
            </tr>

            <tr>
                <th>Other Cost</th>
                <td style="text-align: right">{!! number_format($Project->budget_cost_by_overhead,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->actual_cost_by_overhead,2)  !!}</td>
            </tr>

            <tr>
                <th>Total Cost</th>
                <td style="text-align: right">{!! number_format($Project->budget_cost_by_work+$Project->budget_cost_by_overhead,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->actual_cost_by_work+$Project->actual_cost_by_overhead,2)  !!}</td>
            </tr>

            <tr>
                <th>Total Revenue</th>
                <td style="text-align: right">{!! number_format($Project->budget_revenue,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->actual_revenue,2)  !!}</td>
            </tr>

            <tr>
                <th>Recovery Ratio</th>
                <?php
                    $rrBudget = 0;
                    $rrActual = 0;

                    $BC = $Project->budget_cost_by_work+$Project->budget_cost_by_overhead;
                    $BR = $Project->budget_revenue;
                    if($BC!=0 && $BR!=0){
                        $rrBudget = $BC/$BR;
                    }

                    $AC = $Project->actual_cost_by_work+$Project->actual_cost_by_overhead;
                    $AR = $Project->actual_revenue;
                    if($AC!=0 && $AR!=0){
                        $rrActual = $AC/$AR;
                    }
                ?>
                <td style="text-align: right">{!! number_format($rrBudget,2) !!}</td>
                <td style="text-align: right">{!! number_format($rrActual,2)  !!}</td>
            </tr>

        </tbody>
    </table>
</div>

{{--<tr>--}}
    {{--<td style="background-color:#00A6C7">{!! number_format($Project->actual_number_of_hrs,2)  !!}</td>--}}
    {{--<td style="background-color:#00A6C7">{!! number_format($Project->actual_cost_by_work,2)  !!}</td>--}}
    {{--<td style="background-color:#00A6C7">{!! number_format($Project->actual_cost_by_overhead,2)  !!}</td>--}}
    {{--<td style="background-color:#00A6C7">{!! number_format($Project->actual_cost_by_work+$Project->actual_cost_by_overhead,2)  !!}</td>--}}
    {{--<td style="background-color:#00A6C7">{!! number_format($Project->actual_revenue,2)  !!}</td>--}}
{{--</tr>--}}

{{--<td style="background-color:#00cc66">{!! number_format($Project->budget_number_of_hrs,2)  !!}</td>--}}
{{--<td style="background-color:#00cc66">{!! number_format($Project->budget_cost_by_work,2)  !!}</td>--}}
{{--<td style="background-color:#00cc66">{!! number_format($Project->budget_cost_by_overhead,2)  !!}</td>--}}
{{--<td style="background-color:#00cc66">{!! number_format($Project->budget_cost_by_work+$Project->budget_cost_by_overhead,2)  !!}</td>--}}
{{--<td style="background-color:#00cc66">{!! number_format($Project->budget_revenue,2)  !!}</td>--}}

{{--@if($Project->close)--}}
    {{--<td>{!! $Project->cost_variance  !!}</td>--}}
    {{--<td>{!! $Project->recovery_ratio  !!}</td>--}}
{{--@else--}}
    {{--@include('admin.project.table.td')--}}
{{--@endif--}}

{{--<td><b>@if($Project->close)Close @else Pending @endif</b></td>--}}