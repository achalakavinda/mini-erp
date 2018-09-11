@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Staff Board</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/staff') }}" class="btn btn-success">Staff</a>
            <a href="{{ url('/staff/create') }}" class="btn btn-success">New</a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Employee</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Employee Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Employee Address">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employeeNo">Employee No</label>
                                <input type="text" class="form-control" id="employeeNo" placeholder="Employee No">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cost">Cost</label>
                                <input type="text" class="form-control" id="cost" placeholder="Cost">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hourlyRate">Hourly Rate</label>
                                <input type="text" class="form-control" id="hourlyRate" placeholder="Hourly Rate">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>Designation</label>
                                <select class="form-control">
                                    <option>External Audit</option>
                                    <option>Internal Audit</option>
                                    <option>Feasibility</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nic">ID Number</label>
                                <input type="text" class="form-control" id="employeeNic" placeholder="ID Number">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Picture</label>
                                <input type="file" id="exampleInputFile">

                                <p class="help-block">Upload If necessary.</p>
                            </div>
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->