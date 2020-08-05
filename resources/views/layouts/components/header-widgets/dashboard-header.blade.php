<style>
    .box-body>a {
        margin-top: 10px;
    }

    .mega-menu-ul{
        list-style: none;
        text-align: left;
    }

    .mega-menu-ul>li>ul{
        list-style: none;
    }

    .mega-menu-ul>li{
        border-left: 1px solid rgba(0,0,0,0.2);
    }

</style>
<!-- Default box -->

<div  id="megaMenuID" class="box-body">
    <ul   class="row mega-menu-ul">

        <li class="col-md-2">
            <ul>
                <li  class="list-header">Main Categories</li>
                @can(config('constant.Permission_Dashboard'))<li><a href="{{ url('/dashboard') }}">Dashboard</a></li>@endcan
                @can(config('constant.Permission_Setting'))<li><a href="{{ url('/settings') }}">Settings</a></li>@endcan
            </ul>
        </li>

        <li class="col-md-2">
            <ul>
                <li class="list-header">Project Management</li>
                @can(config('constant.Permission_Project'))<li><a href="{{ url('/project') }}">Project</a></li>@endcan
            </ul>
        </li>

        <li class="col-md-2">
            <ul>
                <li class="list-header">Human Resource</li>
                @can(config('constant.Permission_Staff'))<li><a href="{{ url('/staff') }}">Staff</a></li>@endcan
                @can(config('constant.Permission_Work_Sheet'))<li><a href="{{ url('/work-sheet') }}">Work Sheet</a></li>@endcan
                @can(config('constant.Permission_Designation'))<li><a href="{{ url('/designation') }}">Designation</a></li>@endcan
                @can(config('constant.Permission_Job_Type'))<li><a href="{{ url('/job-type') }}">Job Type</a></li>@endcan
                @can(config('constant.Permission_Attendance'))<li><a href="{{ url('/attendance') }}">Attendance </a></li>@endcan
            </ul>
        </li>

        <li class="col-md-2">
            <ul>
                <li class="list-header">Inventory</li>
                <li><a href="{{ url('ims/brand') }}">Brand</a></li>
                <li><a href="{{ url('ims/item') }}">Item</a></li>
                <li><a href="{{ url('ims/stock') }}">Stock</a></li>
                <li><a href="{{ url('ims/invoice') }}">Invoice</a></li>
                <li><a href="{{ url('ims/quotation') }}">Quotation</a></li>
                <li><a href="{{ url('ims/requisition') }}">Requisition</a></li>
            </ul>
        </li>



    </ul>

</div>

<script>
    var megaMenu = document.getElementById("megaMenuID");
    megaMenu.classList.add("hidden");
    function showMegaMenu(){
        megaMenu.classList.toggle("hidden");
    }
</script>
