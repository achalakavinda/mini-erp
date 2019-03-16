@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Import Staff Spread Sheet</h3>
        </div>
    @include('admin.header-widgets.dashboard-header')
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Emp No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Cost</th>
                            <th>Hour Rate</th>
                            <th>NIC</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\User::all() as $user)
                            <tr>
                                <td>{!! $user->id !!}</td>
                                <td>{!! $user->emp_no !!}</td>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->address !!}</td>
                                <td>{!! $user->cost !!}</td>
                                <td>{!! $user->hr_rates !!}</td>
                                <td>{!! $user->nic !!}</td>
                                <td>{!! $user->email !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                {!! Form::close() !!}

            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('style')
    {!! Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') !!}
    {!! Html::style('https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css') !!}
@endsection
@section('js')
    {!! Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') !!}

    {!! Html::script('https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js') !!}

    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') !!}
    {!! Html::script('https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js') !!}



    <script type="text/javascript">

        $(function () {
            var name = "{!! \Carbon\Carbon::now() !!} | Staff Sheet Report"
            $('#table').DataTable({
                responsive: true,
                "dom": 'Blfrtip',
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],     // page length options
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: name
                    },
                    {
                        extend: 'pdfHtml5',
                        title: name
                    }
                ]
            })
        })
    </script>

@endsection


