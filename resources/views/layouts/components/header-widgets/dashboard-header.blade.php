<style>
    .box-body>a {
        margin-top: 10px;
    }

    .mega-menu-ul {
        list-style: none;
        text-align: left;
    }

    .mega-menu-ul>li>ul {
        list-style: none;
    }

    .mega-menu-ul>li {
        border-left: 1px solid rgba(0, 0, 0, 0.2);
    }
</style>
<!-- Default box -->

<div id="megaMenuID" class="box-body">
    <ul class="row mega-menu-ul">
        @can(config('constant.Permission_Dashboard') or config('constant.Permission_Setting'))
            <li class="col-md-2">
                <ul>
                    <li class="list-header">Main Categories</li>
                    @can(config('constant.Permission_Dashboard'))
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    @endcan
                    @can(config('constant.Permission_Setting'))
                        <li><a href="{{ url('/settings') }}">Settings</a></li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can(config('constant.Permission_Inventory_Module'))
                <li class="col-md-2">
                    <ul>
                        <li class="list-header">Inventory</li>
                        @can(config('constant.Permission_Brand_Registry'))
                            <li><a href="{{ url('ims/brand') }}">Brand</a></li>
                        @endcan
                        @can(config('constant.Permission_Category_Registry'))
                            <li><a href="{{ url('ims/category') }}">Category</a></li>
                        @endcan
                        @can(config('constant.Permission_Color_Registry'))
                            <li><a href="{{ url('ims/color') }}">Color</a></li>
                        @endcan
                        @can(config('constant.Permission_Color_Registry'))
                            <li><a href="{{ url('ims/size') }}">Size</a></li>
                        @endcan
                        @can(config('constant.Permission_Item_Registry'))
                            <li><a href="{{ url('ims/item') }}">Item</a></li>
                        @endcan
                        @can(config('constant.Permission_Stock_Registry'))
                            <li><a href="{{ url('ims/stock') }}">Stock</a></li>
                        @endcan
                    </ul>
                </li>

                <li class="col-md-2">
                    <ul>
                        <li class="list-header">Inventory Reports</li>
                        @can(config('constant.Permission_Quotation_Registry'))
                            <li><a href="{{ url('ims/quotation') }}">Quotations</a></li>
                        @endcan
                        @can(config('constant.Permission_Sales_Order_Registry'))
                            <li><a href="{{ url('ims/sales-order') }}">Sales Orders</a></li>
                        @endcan
                        @can(config('constant.Permission_Invoice_Registry'))
                            <li><a href="{{ url('ims/invoice') }}">Invoices</a></li>
                        @endcan
                        @can(config('constant.Permission_Company_Purchase_Requisition_Registry'))
                            <li><a href="{{ url('ims/purchase-requisition') }}">Purchase Requisitions</a></li>
                        @endcan
                        @can(config('constant.Permission_Company_Purchase_Order_Registry'))
                            <li><a href="{{ url('ims/company-purchase-order') }}">Purchase Orders</a></li>
                        @endcan
                        @can(config('constant.Permission_Grn_Registry'))
                            <li><a href="{{ url('ims/grn') }}">Goods Received Note</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan


            @can(config('constant.Permission_Accounting'))
                <li class="col-md-2">
                    <ul>
                        <li class="list-header">Accounting</li>
                        <li><a href="{{ url('accounting') }}">Account</a></li>
                        @can(config('constant.Permission_Payment_Registry'))
                            <li><a href="{{ url('accounting/payment') }}">Payments</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan


            @can(config('constant.Permission_Project'))
                <li class="col-md-2">
                    <ul>
                        <li class="list-header">Project Management</li>
                        @can(config('constant.Permission_Project_Registry'))
                            <li><a href="{{ url('/project') }}">Project</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can(config('constant.Permission_Staff'))
                <li class="col-md-2">
                    <ul>
                        <li class="list-header">Human Resource</li>
                        @can(config('constant.Permission_Staff'))<li><a href="{{ url('/staff') }}">Staff</a></li>@endcan
                        @can(config('constant.Permission_Work_Sheet'))<li><a href="{{ url('/work-sheet') }}">Work Sheet</a></li>
                        @endcan
                        @can(config('constant.Permission_Designation'))<li><a href="{{ url('/designation') }}">Designation</a></li>
                        @endcan
                        @can(config('constant.Permission_Job_Type'))<li><a href="{{ url('/job-type') }}">Job Type</a></li>@endcan
                        @can(config('constant.Permission_Attendance'))<li><a href="{{ url('/attendance') }}">Attendance </a></li>
                        @endcan
                    </ul>
                </li>
            @endcan



    </ul>

</div>

<script>
    var megaMenu = document.getElementById("megaMenuID");
    megaMenu.classList.add("hidden");
    function showMegaMenu(){
        megaMenu.classList.toggle("hidden");
    }
</script>
