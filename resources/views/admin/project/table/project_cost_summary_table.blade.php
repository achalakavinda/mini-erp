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
                <td style="text-align: right">{!! number_format($Project->budget_cost_by_work-$Project->actual_cost_by_work,2)  !!}</td>
            </tr>

            <tr>
                <th>Admin OHs</th>

                <td style="text-align: right">{!! number_format($Project->budget_cost_by_work,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->actual_cost_by_work,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->budget_cost_by_work-$Project->actual_cost_by_work,2)  !!}</td>

            </tr>

            <tr>
                <th>Other Cost</th>
                <td style="text-align: right">{!! number_format($Project->budget_cost_by_overhead,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->actual_cost_by_overhead,2)  !!}</td>
                <td style="text-align: right">{!! number_format(($Project->budget_cost_by_overhead)-($Project->actual_cost_by_overhead),2)  !!}</td>
            </tr>

            <tr>
                <th>Total Cost</th>
                <td style="text-align: right">{!! number_format($Project->budget_cost_by_work+$Project->budget_cost_by_work+$Project->budget_cost_by_overhead,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->actual_cost_by_work+$Project->actual_cost_by_work+$Project->actual_cost_by_overhead,2)  !!}</td>
                <td style="text-align: right">{!! number_format(($Project->budget_cost_by_work+$Project->budget_cost_by_work+$Project->budget_cost_by_overhead)-($Project->actual_cost_by_work+$Project->actual_cost_by_work+$Project->actual_cost_by_overhead),2)  !!}</td>
            </tr>

            <tr>
                <th>Total Revenue</th>
                <td style="text-align: right">{!! number_format($Project->budget_revenue,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->actual_revenue,2)  !!}</td>
                <td style="text-align: right">{!! number_format($Project->budget_revenue-$Project->actual_revenue,2)  !!}</td>
            </tr>

            <tr>
                <th>Recovery Ratio</th>
                <?php
                    $rrBudget = 0;
                    $rrActual = 0;

                    $BC = $Project->budget_cost_by_work+$Project->budget_cost_by_work+$Project->budget_cost_by_overhead;
                    $BR = $Project->budget_revenue;
                    if($BC!=0 && $BR!=0){
                        $rrBudget = $BR/$BC;
                    }

                    $AC = $Project->actual_cost_by_work+$Project->actual_cost_by_work+$Project->actual_cost_by_overhead;
                    $AR = $Project->actual_revenue;
                    if($AC!=0 && $AR!=0){
                        $rrActual = $AR/$AC;
                    }
                ?>
                <td style="text-align: right">{!! number_format($rrBudget,2) !!}</td>
                <td style="text-align: right">{!! number_format($rrActual,2)  !!}</td>
                <td style="text-align: right">{!! number_format($rrBudget-$rrActual,2) !!}</td>
            </tr>
        </tbody>
    </table>
</div>