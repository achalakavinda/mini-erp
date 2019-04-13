<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left">
                <img style="width: 70%" src="{!! asset('img/logo.png') !!}">
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">System</li>

            <!-- Optionally, you can add icons to the links -->
            @can(config('constant.Permission_Dashboard'))
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            @endcan

            @can(config('constant.Permission_Project'))
                <li><a href="{{ url('/project') }}"><i class="fa fa-print"></i> <span>Project</span></a></li>
                @elsecan(config('constant.Permission_Project_assigned'))
                <li><a href="{{ url('/project') }}"><i class="fa fa-print"></i> <span>Assigned Project</span></a></li>
            @endcan

            @can(config('constant.Permission_Work_Sheet'))
                <li><a href="{{ url('work-sheet') }}"><i class="fa fa-file"></i> <span>Work Sheet</span></a></li>
            @endcan

            @can(config('constant.Permission_Work_Sheet'))
                <li><a href="{{ url('/work-sheet/create') }}"><i class="fa fa-book"></i> <span>Work Report</span></a></li>
                @elsecan(config('constant.Permission_Minor_Staff'))
                <li><a href="{{ url('staff/work-sheet') }}"><i class="fa fa-file"></i> <span>Time Sheet</span></a></li>
            @endcan

            @can(config('constant.Permission_Staff'))
                <li class="treeview">
                    <a href="{{ url('/staff') }}"><i class="fa fa-user"></i> <span>Staff</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('designation') }}"><i class="fa fa-table"></i> Designation</a></li>
                        <li><a href="{{ url('job-type') }}"><i class="fa fa-table"></i> Job Type</a></li>
                        <li><a href="{{ url('/staff') }}"><i class="fa fa-table"></i> Registry</a></li>
                        <li><a href="{{ url('/staff/create') }}"><i class="fa fa-plus-square"></i> New</a></li>
                    </ul>
                </li>
            @endcan

            @can(config('constant.Permission_Customer'))
                <li class="treeview">
                    <a href="{{ url('/customer') }}"><i class="fa fa-users"></i> <span>Customer</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/customer') }}"><i class="fa fa-table"></i> Registry</a></li>
                        <li><a href="{{ url('/customer/create') }}"><i class="fa fa-plus-square"></i>  New </a></li>
                    </ul>
                </li>
            @endcan

            @can(config('constant.Permission_Minor_Staff'))
                    <li><a href="{{ url('/staff/profile/') }}/{!! \Illuminate\Support\Facades\Auth::id() !!}"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            @endcan

            @can(config('constant.Permission_Holidays'))
                <li><a href="{{ url('holidays') }}"><i class="fa fa-calendar"></i> <span>Holidays</span></a></li>
            @endcan

            @can(config('constant.Permission_Attendance'))
                <li><a href="{{ url('attendance') }}"><i class="fa fa-list"></i> <span>Attendance</span></a></li>
            @endcan

            @can(config('constant.Permission_Setting'))
                <li><a href="{{ url('spread-sheet') }}"><i class="fa fa-table"></i> <span>Spread-Sheet/Import</span></a></li>
            @endcan

            @can(config('constant.Permission_Setting'))
                <li><a href="{{ url('reports') }}"><i class="fa fa-cubes"></i> <span>Reports</span></a></li>
            @endcan

            @can(config('constant.Permission_Setting'))
                <li style="padding-bottom: 50px;" class="treeview">
                    <a href="{{ url('/settings') }}"><i class="fa fa-cogs"></i> <span>Settings</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/settings') }}"><i class="fa fa-cogs"></i> Settings</a></li>


                        <li class="treeview">
                            <a href="#"><i class="fa fa-users"></i> <span>Access Control</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ url('/settings/access-control/permissions') }}"><i class="fa fa-universal-access"></i>Permission</a></li>
                                <li><a href="{{ url('/settings/access-control/roles') }}"><i class="fa fa-level-up"></i>Roles</a></li>
                                <li><a href="{{ url('/settings/access-control/user-management') }}"><i class="fa fa-users"></i>User Management</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
            @endcan





        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
