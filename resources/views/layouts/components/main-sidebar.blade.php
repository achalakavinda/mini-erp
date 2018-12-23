<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! url('admin/dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="{!! url('staff/profile') !!}/{!! Auth::id() !!}"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">System</li>

            @can('Default')
                <!-- Optionally, you can add icons to the links -->
                    <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li><a href="{{ url('/project') }}"><i class="fa fa-print"></i> <span>Project</span></a></li>
                    <li><a href="{{ url('work-sheet') }}"><i class="fa fa-file"></i> <span>Work Sheet</span></a></li>
                    <li><a href="{{ url('/work-sheet/create') }}"><i class="fa fa-book"></i> <span>Work Report</span></a></li>

                    <li class="treeview">
                        <a href="{{ url('/staff') }}"><i class="fa fa-user"></i> <span>Staff</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('designation') }}">Designation</a></li>
                            <li><a href="{{ url('job-type') }}">Job Type</a></li>
                            <li><a href="{{ url('/staff') }}">Registry</a></li>
                            <li><a href="{{ url('/staff/create') }}">New</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="{{ url('/customer') }}"><i class="fa fa-users"></i> <span>Customer</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/customer') }}">Registry</a></li>
                            <li><a href="{{ url('/customer/create') }}"> New </a></li>
                        </ul>
                    </li>

            @else
                    <li><a href="{{ url('staff/work-sheet') }}"><i class="fa fa-file"></i> <span>Work Sheet</span></a></li>
                    <li><a href="{{ url('/staff/profile/') }}/{!! \Illuminate\Support\Facades\Auth::id() !!}"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            @endcan

            @can('Settings')
                <li class="treeview">
                    <a href="{{ url('/settings') }}"><i class="fa fa-cogs"></i> <span>Settings</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/settings') }}"><i class="fa fa-cogs"></i> Settings</a></li>


                        <li class="treeview">
                            <a href="{{ url('/settings/access-control') }}"><i class="fa fa-users"></i> <span>Access Control</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ url('/settings/access-control') }}"><i class="fa fa-stop"></i>Access Control</a></li>
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
