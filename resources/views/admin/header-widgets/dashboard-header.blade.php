<style>
    .box-body>a {
        margin-top: 10px;
    }
</style>
<!-- Default box -->
<div class="box-body">
        @can(config('constant.Permission_Dashboard'))<a href="{{ url('/dashboard') }}" class="btn btn-success">Dashboard <span class="fa fa-dashboard"></span></a>@endcan
        @can(config('constant.Permission_Project'))<a href="{{ url('/project') }}" class="btn btn-success">Project <span class="fa fa-print"></span></a>@endcan
        @can(config('constant.Permission_Work_Sheet'))<a href="{{ url('/work-sheet') }}" class="btn btn-success">Work Sheet <span class="fa fa-file"></span></a>@endcan
        @can(config('constant.Permission_Staff'))<a href="{{ url('/staff') }}" class="btn btn-success">Staff <span class="fa fa-user"></span></a>@endcan
        @can(config('constant.Permission_Designation'))<a href="{{ url('/designation') }}" class="btn btn-success">Designation <span class="fa fa-table"></span></a>@endcan
        @can(config('constant.Permission_Job_Type'))<a href="{{ url('/job-type') }}" class="btn btn-success">Job Type <span class="fa fa-table"></span></a>@endcan
        @can(config('constant.Permission_Customer'))<a href="{{ url('/customer') }}" class="btn btn-success">Customer <span class="fa fa-users"></span></a>@endcan
        @can(config('constant.Permission_Holidays'))<a href="{{ url('/holidays') }}" class="btn btn-success">Holidays <span class="fa fa-calendar"></span></a>@endcan
        @can(config('constant.Permission_Attendance'))<a href="{{ url('/attendance') }}" class="btn btn-success">Attendance <span class="fa fa-list"></span></a>@endcan
        @can(config('constant.Permission_Setting'))<a href="{{ url('/settings') }}" class="btn btn-success">Settings <span class="fa fa-cogs"></span></a>@endcan
</div>