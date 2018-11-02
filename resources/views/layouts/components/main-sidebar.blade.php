<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! url('dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">System</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="{{ url('/project') }}"><i class="fa fa-print"></i> <span>Project</span></a></li>
            <li><a href="{{ url('/work-sheet/create') }}"><i class="fa fa-book"></i> <span>Work Report</span></a></li>
            <li><a href="{{ url('/staff') }}"><i class="fa fa-user"></i> <span>Staff Reg</span></a></li>
            <li><a href="{{ url('work-sheet') }}"><i class="fa fa-file"></i> <span>Work Sheet</span></a></li>
            <li><a href="{{ url('designation') }}"><i class="fa fa-pencil"></i> <span>Designation</span></a></li>
            <li><a href="{{ url('job-type') }}"><i class="fa fa-link"></i> <span>Job Type</span></a></li>
            <li class="treeview">
                <a href="{{ url('/staff') }}"><i class="fa fa-link"></i> <span>Staff</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/staff') }}">Registry</a></li>
                    <li><a href="{{ url('/staff/create') }}">New</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="{{ url('/customer') }}"><i class="fa fa-link"></i> <span>Customer</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/customer') }}">Registry</a></li>
                    <li><a href="{{ url('/customer/create') }}"> New </a></li>
                </ul>
            </li>

            <li><a href="{{ url('settings') }}"><i class="fa fa-cogs"></i> <span>Settings</span></a></li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
