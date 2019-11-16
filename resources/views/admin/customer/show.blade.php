@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Customers</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/customer') }}" class="btn btn-success">Customer</a>
            <a href="{{ url('/customer/create') }}" class="btn btn-success">New</a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{!! $Customer->name !!} | {!! $Customer->code !!}</h3>

                    @include('error.error')
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::model($Customer, ['method' => 'PATCH', 'action' => ['CustomerController@update', $Customer->id],'class'=>'form-horizontal']) !!}
                @include('admin.customer._partial.show')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Projects | {!! $Customer->name !!}</h3>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Code</th>
                            <th>Customer</th>
                            <th>Number OF Hrs</th>
                            <th>Budget</th>
                            <th>Quoted</th>
                            <th>Cost</th>
                            <th>Revenue</th>
                            <th>Recovery Ratio</th>
                            <th>status</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $Rows = \App\Models\Project::where('customer_id',$Customer->id)->paginate(10);?>

                        @foreach($Rows as $row)
                            <?php
                            $Customer="";
                            $CM = \App\Models\Customer::find($row->customer_id );
                            if(!empty($CM)){
                                $Customer = $CM->name;
                            }
                            ?>
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->code }}</td>
                                <td>{{ $Customer }}</td>
                                <td>{{ $row->number_of_hrs }}</td>
                                <td>{{ $row->budget_cost }}</td>
                                <td>{{ $row->quoted_price }}</td>
                                <td>{{ $row->actual_cost }}</td>
                                <td>{{ $row->revenue }}</td>
                                <td>{{ $row->recovery_ratio }}</td>
                                <td>{{ $row->close }}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{ url('/project') }}/{{ $row->id }}">view</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {!! $Rows->links() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->
@section('js')
    @include('error.swal')
@endsection