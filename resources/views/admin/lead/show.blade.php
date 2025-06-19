@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Customer : {!! $Customer->name !!} | {!! $Customer->code !!}</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('customer') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-arrow-left"></i> Go Back
            </a>
            <a href="{!! url('customer') !!}/{!! $Customer->id !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="#" id="ShowAdvance" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Show all Fields
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection

@section('main-content')
    <!-- main section -->
    <div class="row">
        @include('error.error')
        {!! Form::model($Customer, ['method' => 'PATCH', 'action' => ['CustomerController@update', $Customer->id],'class'=>'form-horizontal']) !!}

        @include('admin.customer._partial.showBasic')

        {!! Form::close() !!}
    </div>
    <!-- /.row -->
    {{--    <div class="row">--}}
    {{--        <div class="col-xs-12">--}}
    {{--            <div class="box">--}}
    {{--                <div class="box-header with-border">--}}
    {{--                    <h3 class="box-title">Projects | {!! $Customer->name !!}</h3>--}}
    {{--                </div>--}}
    {{--                <!-- /.box-header -->--}}
    {{--                <div style="overflow: auto" class="box-body">--}}
    {{--                    <table id="table" class="table table-responsive table-bordered table-striped">--}}
    {{--                        <thead>--}}
    {{--                        <tr>--}}
    {{--                            <th>#ID</th>--}}
    {{--                            <th>Code</th>--}}
    {{--                            <th>Customer</th>--}}
    {{--                            <th>Number OF Hrs</th>--}}
    {{--                            <th>Budget</th>--}}
    {{--                            <th>Quoted</th>--}}
    {{--                            <th>Cost</th>--}}
    {{--                            <th>Revenue</th>--}}
    {{--                            <th>Recovery Ratio</th>--}}
    {{--                            <th>status</th>--}}
    {{--                        </tr>--}}
    {{--                        </thead>--}}
    {{--                        <tbody>--}}

    {{--                        <?php $Rows = \App\Models\Ims\SalesOrder::where('customer_id',$Customer->id)->paginate(10);?>--}}

    {{--                        @foreach($Rows as $row)--}}
    {{--                            <?php--}}
    {{--                            $Customer="";--}}
    {{--                            $CM = \App\Models\Customer::find($row->customer_id );--}}
    {{--                            if(!empty($CM)){--}}
    {{--                                $Customer = $CM->name;--}}
    {{--                            }--}}
    {{--                            ?>--}}
    {{--                            <tr>--}}
    {{--                                <td>{{ $row->id }}</td>--}}
    {{--                                <td>{{ $row->code }}</td>--}}
    {{--                                <td>{{ $Customer }}</td>--}}
    {{--                                <td>{{ $row->number_of_hrs }}</td>--}}
    {{--                                <td>{{ $row->budget_cost }}</td>--}}
    {{--                                <td>{{ $row->quoted_price }}</td>--}}
    {{--                                <td>{{ $row->actual_cost }}</td>--}}
    {{--                                <td>{{ $row->revenue }}</td>--}}
    {{--                                <td>{{ $row->recovery_ratio }}</td>--}}
    {{--                                <td>{{ $row->close }}</td>--}}
    {{--                                <td>--}}
    {{--                                    <a class="btn btn-danger btn-sm" href="{{ url('/project') }}/{{ $row->id }}">view</a>--}}
    {{--                                </td>--}}
    {{--                            </tr>--}}
    {{--                        @endforeach--}}

    {{--                        </tbody>--}}
    {{--                    </table>--}}
    {{--                    {!! $Rows->links() !!}--}}
    {{--                </div>--}}
    {{--                <!-- /.box-body -->--}}
    {{--            </div>--}}
    {{--            <!-- /.box -->--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- /main section -->
@endsection

@section('js')
    @include('error.swal')
    <script>
        $('#ShowAdvance').on('click',function () {
            $('#AdvanceForm').fadeIn('slow');
            $('#ShowAdvance').hide();
        })
    </script>
@endsection
