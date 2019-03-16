<!-- Default box -->
<style>
    .box-body>a {
        margin-top: 10px;
    }
</style>
<div class="box-body">
        <a href="{{ url('/reports/view-work-sheet-report') }}" class="btn btn-success">Worksheet Report <span class="fa fa-cube"></span></a>
        <a href="{{ url('/reports/view-employee-wise-work-sheet-report') }}" class="btn btn-success">Worksheet Report - Employee <span class="fa fa-cube"></span></a>
        <a href="{{ url('/reports/view-customer-wise-work-sheet-report') }}" class="btn btn-success">Worksheet Report - Customer <span class="fa fa-cube"></span></a>
        <a href="{{ url('/reports/view-job-type-wise-work-sheet-report') }}" class="btn btn-success">Worksheet Report - Job Type <span class="fa fa-cube"></span></a>
</div>