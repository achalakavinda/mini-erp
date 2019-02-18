<!-- Default box -->
<div class="box-body">
        @can(config('constant.Permission_Dashboard'))<a href="{{ url('/dashboard') }}" class="btn btn-success">Dashboard</a>@endcan
        @can(config('constant.Permission_Project'))<a href="{{ url('/project') }}" class="btn btn-success">Project</a>@endcan
        @can(config('constant.Permission_Work_Sheet'))<a href="{{ url('/work-sheet') }}" class="btn btn-success">Work Sheet</a>@endcan
        @can(config('constant.Permission_Staff'))<a href="{{ url('/staff') }}" class="btn btn-success">Staff</a>@endcan
        @can(config('constant.Permission_Designation'))<a href="{{ url('/designation') }}" class="btn btn-success">Designation</a>@endcan
        @can(config('constant.Permission_Job_Type'))<a href="{{ url('/job-type') }}" class="btn btn-success">Job Type</a>@endcan
        @can(config('constant.Permission_Customer'))<a href="{{ url('/customer') }}" class="btn btn-success">Customer</a>@endcan
        @can(config('constant.Permission_Setting'))<a href="{{ url('/settings') }}" class="btn btn-success">Settings</a>@endcan
</div>