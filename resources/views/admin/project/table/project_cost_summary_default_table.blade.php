<div style="overflow: auto" class="box-body">
    <table id="table" class="table table-responsive table-bordered table-striped">
        <thead>
        <tr>
            <th style="background-color:#00cc66">B.Hrs</th>
            <th style="background-color:#00cc66">B.Hr Cost</th>
            <th style="background-color:#00cc66">B. Cost by OH</th>
            <th style="background-color:#00cc66">Tol Budget Cost</th>
            <th style="background-color:#00cc66">B.Revenue</th>

            <th style="background-color: #00ad9c">Cost Variance</th>
            <th style="background-color: #00ad9c">Recovery Ratio</th>
            <th style="background-color: #00ad9c">status</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td style="background-color:#00cc66">{!! number_format($Project->budget_number_of_hrs,2)  !!}</td>
            <td style="background-color:#00cc66">{!! number_format($Project->budget_cost_by_work,2)  !!}</td>
            <td style="background-color:#00cc66">{!! number_format($Project->budget_cost_by_overhead,2)  !!}</td>
            <td style="background-color:#00cc66">{!! number_format($Project->budget_cost_by_work+$Project->budget_cost_by_overhead,2)  !!}</td>
            <td style="background-color:#00cc66">{!! number_format($Project->budget_revenue,2)  !!}</td>

            @if($Project->close)
                <td>{!! $Project->cost_variance  !!}</td>
                <td>{!! $Project->recovery_ratio  !!}</td>
            @else
                @include('admin.project.table.td')
            @endif

            <td><b>@if($Project->close)Close @else Pending @endif</b></td>
        </tr>
        <tr>
            <th style="background-color:#00A6C7">A.Hrs</th>
            <th style="background-color:#00A6C7">A.D Staff Cost</th>
            <th style="background-color:#00A6C7">A. Indirect Cost</th>
            <th style="background-color:#00A6C7">Tol Actual Cost</th>
            <th style="background-color:#00A6C7">A.Revenue</th>
        </tr>
        <tr>
            <td style="background-color:#00A6C7">{!! number_format($Project->actual_number_of_hrs,2)  !!}</td>
            <td style="background-color:#00A6C7">{!! number_format($Project->actual_cost_by_work,2)  !!}</td>
            <td style="background-color:#00A6C7">{!! number_format($Project->actual_cost_by_overhead,2)  !!}</td>
            <td style="background-color:#00A6C7">{!! number_format($Project->actual_cost_by_work+$Project->actual_cost_by_overhead,2)  !!}</td>
            <td style="background-color:#00A6C7">{!! number_format($Project->actual_revenue,2)  !!}</td>
        </tr>
        </tbody>
    </table>
</div>