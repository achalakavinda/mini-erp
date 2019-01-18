<div style="overflow: auto" class="box-body">
    <table id="table" class="table table-responsive table-bordered table-striped">
        <thead>
        <tr>
            <th>B.Hrs</th>
            <th>B.Cost</th>
            <th>B.Revenue</th>
            <th>A.Hrs</th>
            <th>A.D Staff Cost</th>
            <th>A. Indirect Cost</th>
            <th>Tol Actual Cost</th>
            <th>A.Revenue</th>
            <th>Cost Variance</th>
            <th>Recovery Ratio</th>
            <th>status</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>{!! number_format($Project->budget_number_of_hrs,2)  !!}</td>
            <td>{!! number_format($Project->budget_cost,2)  !!}</td>
            <td>{!! number_format($Project->budget_revenue,2)  !!}</td>
            <td>{!! number_format($Project->actual_number_of_hrs,2)  !!}</td>
            <td>{!! number_format($Project->actual_cost_by_work,2)  !!}</td>
            <td>{!! number_format($Project->actual_cost_by_overhead,2)  !!}</td>
            <td>{!! number_format($Project->actual_cost_by_work+$Project->actual_cost_by_overhead,2)  !!}</td>
            <td>{!! number_format($Project->actual_revenue,2)  !!}</td>
            @if($Project->close)
                <td>{!! $Project->cost_variance  !!}</td>
                <td>{!! $Project->recovery_ratio  !!}</td>
            @else
                @include('admin.project.table.td')
            @endif

            <td><b>@if($Project->close)Close @else Pending @endif</b></td>
        </tr>
        </tbody>
    </table>
</div>