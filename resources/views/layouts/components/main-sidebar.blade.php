<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">System</li>
            <!-- Optionally, you can add icons to the links -->
            @can(config('constant.Permission_Dashboard'))
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            @endcan

            @can(config('constant.Permission_Customer'))
                <li class="treeview">
                    <a href="{{ url('/lead') }}"><i class="fa fa-magnet"></i> <span>Lead</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/lead') }}"><i class="fa fa-table"></i> Registry</a></li>
                        <li><a href="{{ url('/lead/create') }}"><i class="fa fa-plus-square"></i> New </a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="{{ url('/customer') }}"><i class="fa fa-users"></i> <span>Customer</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/customer') }}"><i class="fa fa-table"></i> Registry</a></li>
                        <li><a href="{{ url('/customer/create') }}"><i class="fa fa-plus-square"></i> New </a></li>
                    </ul>
                </li>
            @endcan

            @can(config('constant.Permission_Customer'))
                <li class="treeview">
                    <a href="{{ url('/location') }}"><i class="fa fa-users"></i> <span>Location</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/location') }}"><i class="fa fa-table"></i> Registry</a></li>
                        <li><a href="{{ url('/location/create') }}"><i class="fa fa-plus-square"></i> New </a></li>
                    </ul>
                </li>
            @endcan

             @can(config('constant.Permission_Customer'))
                <li class="treeview">
                    <a href="{{ url('/inspection') }}"><i class="fa fa-list"></i> <span>Inspection</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/inspection') }}"><i class="fa fa-table"></i> Registry</a></li>
                        <li><a href="{{ url('/inspection/create') }}"><i class="fa fa-plus-square"></i> New </a></li>
                    </ul>
                </li>
            @endcan

            {{-- Inventory items start here  --}}
            @can(config('constant.Permission_Supplier'))
                <li class="treeview">
                    <a href="{{ url('/supplier') }}"><i class="fa fa-cubes"></i> <span>Supplier</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/supplier') }}"><i class="fa fa-table"></i> Supplier</a></li>
                        <li><a href="{{ url('/supplier/create') }}"><i class="fa fa-plus"></i> New</a></li>
                    </ul>
                </li>
            @endcan

            @can(config('constant.Permission_Brand'))
                <!-- brand  -->
                <li class="treeview">
                    <a href="{!! url('ims/brand') !!}"><i class="fa fa-tags"></i> <span>Brand</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can(config('constant.Permission_Brand_Registry'))
                            <li><a href="{!! url('ims/brand') !!}"><i class="fa fa-table"></i> brands</a></li>
                        @endcan
                        @can(config('constant.Permission_Brand_Creation'))
                            <li><a href="{!! url('ims/brand/create') !!}"><i class="fa fa-plus"></i> new</a></li>
                        @endcan
                    </ul>
                </li><!-- /brand  -->
            @endcan

            @can(config('constant.Permission_Item'))
                <li class="treeview">
                    <a href="{!! url('ims/item') !!}"><i class="fa fa-cube"></i> <span>Item</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can(config('constant.Permission_Item_Registry'))
                            <li><a href="{!! url('ims/item') !!}"><i class="fa fa-table"></i> Item</a></li>
                        @endcan
                        @can(config('constant.Permission_Item_Creation'))
                            <li><a href="{!! url('ims/item/create') !!}"><i class="fa fa-plus"></i> new</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can(config('constant.Permission_Company_Purchase_Requisition'))
                <li class="treeview">
                    <a href="{{ url('ims/purchase-requisition') }}"><i class="fa fa-edit"></i>
                        <span>Request Stocks</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can(config('constant.Permission_Company_Purchase_Requisition_Registry'))
                            <li><a href="{{ url('ims/purchase-requisition') }}"><i class="fa fa-table"></i>
                                    Requisition</a></li>
                        @endcan
                        @can(config('constant.Permission_Company_Purchase_Requisition_Creation'))
                            <li><a href="{{ url('ims/purchase-requisition/create') }}"><i class="fa fa-plus"></i>
                                    New</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can(config('constant.Permission_Quotation'))
                <li class="treeview">
                    <a href="{{ url('ims/quotation') }}"><i class="fa fa-edit"></i> <span>Customer Quotation</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        @can(config('constant.Permission_Quotation_Registry'))
                            <li><a href="{{ url('ims/quotation') }}"><i class="fa fa-table"></i> Quotation</a></li>
                        @endcan
                        @can(config('constant.Permission_Quotation_Creation'))
                            <li><a href="{{ url('ims/quotation/create') }}"><i class="fa fa-plus"></i> New</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan



            @can(config('constant.Permission_Sales_Order'))
                <li class="treeview">
                    <a href="{{ url('ims/sales-orders') }}"><i class="fa fa-shopping-cart"></i> <span>Sales Orders</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        @can(config('constant.Permission_Sales_Order_Registry'))
                            <li><a href="{{ url('ims/sales-order') }}"><i class="fa fa-table"></i> Sales Orders</a></li>
                        @endcan
                        @can(config('constant.Permission_Sales_Order_Creation'))
                            <li><a href="{{ url('ims/sales-order/create') }}"><i class="fa fa-plus"></i> New</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can(config('constant.Permission_Company_Purchase_Order'))
                <li class="treeview">
                    <a href="{{ url('ims/company-purchase-order') }}"><i class="fa fa-shopping-cart"></i>
                        <span>Customer Orders</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can(config('constant.Permission_Company_Purchase_Order_Registry'))
                            <li><a href="{{ url('ims/company-purchase-order') }}"><i class="fa fa-table"></i>
                                    Company Order</a></li>
                        @endcan
                        @can(config('constant.Permission_Company_Purchase_Order_Creation'))
                            <li><a href="{{ url('ims/company-purchase-order/create') }}"><i class="fa fa-plus"></i>
                                    New</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan


            @can(config('constant.Permission_Invoice'))
                <li class="treeview">
                    <a href="{{ url('ims/invoice') }}"><i class="fa fa-dollar"></i> <span>Invoice</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can(config('constant.Permission_Invoice_Registry'))
                            <li><a href="{{ url('ims/invoice') }}"><i class="fa fa-table"></i> Invoice</a></li>
                        @endcan
                        @can(config('constant.Permission_Invoice_Creation'))
                            <li><a href="{{ url('ims/invoice/create') }}"><i class="fa fa-plus"></i> New</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can(config('constant.Permission_Grn'))
                <li class="treeview">
                    <a href="{{ url('ims/grn') }}"><i class="fa fa-inbox"></i> <span>GRN</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        @can(config('constant.Permission_Grn_Registry'))
                            <li><a href="{{ url('ims/grn') }}"><i class="fa fa-table"></i> GRN</a></li>
                        @endcan
                        @can(config('constant.Permission_Grn_Creation'))
                            <li><a href="{{ url('ims/grn/create') }}"><i class="fa fa-plus"></i> New</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can(config('constant.Permission_Stock'))
                <!-- stock -->
                <li class="treeview">
                    <a href="{!! url('') !!}"><i class="fa fa-truck"></i> <span>Stock</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can(config('constant.Permission_Stock_Registry'))
                            <li><a href="{!! url('ims/stock') !!}"><i class="fa fa-table"></i> Stock</a></li>
                        @endcan
                        @can(config('constant.Permission_Stock_Creation'))
                            <li><a href="{!! url('ims/stock/create') !!}"><i class="fa fa-plus"></i> new</a></li>
                        @endcan
                    </ul>
                </li><!-- /stock -->
            @endcan


            {{-- Inventory items end here --}}

            <!-- human resource -->
            @can(config('constant.Permission_Staff'))
                <li class="treeview">
                    <a href="{{ url('/staff') }}"><i class="fa fa-user"></i> <span>HR Management</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can(config('constant.Permission_Work_Sheet'))
                            <li><a href="{{ url('work-sheet') }}"><i class="fa fa-file"></i> <span>Work Sheet</span></a></li>
                            <li><a href="{{ url('/work-sheet/create') }}"><i class="fa fa-book"></i> <span>Work
                                        Report</span></a></li>
                            <li><a href="{{ url('staff/work-sheet') }}"><i class="fa fa-file"></i> <span>Time
                                        Sheet</span></a></li>
                        @endcan

                        @can(config('constant.Permission_Attendance'))
                            <li><a href="{{ url('attendance') }}"><i class="fa fa-list"></i> <span>Attendance</span></a></li>
                        @endcan
                        @can(config('constant.Permission_Holidays'))
                            <li><a href="{{ url('holidays') }}"><i class="fa fa-calendar"></i> <span>Holidays</span></a></li>
                        @endcan
                        <li><a href="{{ url('designation') }}"><i class="fa fa-table"></i> Designation</a></li>
                        <li><a href="{{ url('job-type') }}"><i class="fa fa-table"></i> Job Type</a></li>

                        <li class="treeview">
                            <a href="{{ url('/staff') }}"><i class="fa fa-user"></i> <span>Staff</span>
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">

                                <li><a href="{{ url('/staff') }}"><i class="fa fa-table"></i> Registry</a></li>
                                <li><a href="{{ url('/staff/create') }}"><i class="fa fa-plus-square"></i> New</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endcan
            <!-- /human resource -->



            <!-- GL MENU BLOCK -->
            @can(config('constant.Permission_General_Ledger'))
                <li class="treeview">
                    <a href="#"><i class="fa fa-train"></i> <span>Cash Flow Notes</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/general-ledger') }}"><i class="fa fa-print"></i> <span>Quick Cash
                                    Flow</span></a></li>
                    </ul>
                </li>
            @endcan
            <!-- /GL MENU BLOCK -->

            @can(config('constant.Permission_Reports'))
                <li><a href="{{ url('reports') }}"><i class="fa fa-cubes"></i> <span>Reports</span></a></li>
            @endcan

            @can(config('constant.Permission_Reports'))
                <li><a href="{{ url('spread-sheet') }}"><i class="fa fa-table"></i> <span>Data Import/Export</span></a>
                </li>
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
                        <li><a href="{{ url('/admin/invoice-settings') }}"><i class="fa fa-cogs"></i> Invoice
                                Settings</a></li>



                        <li class="treeview">
                            <a href="#"><i class="fa fa-users"></i> <span>Access Control</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ url('/settings/access-control/permissions') }}"><i
                                            class="fa fa-universal-access"></i>Permission</a></li>
                                <li><a href="{{ url('/settings/access-control/roles') }}"><i
                                            class="fa fa-level-up"></i>Roles</a></li>
                                <li><a href="{{ url('/settings/access-control/user-management') }}"><i
                                            class="fa fa-users"></i>User Management</a></li>
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
