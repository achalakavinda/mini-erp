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
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Customer</h3>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="example1" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Job Type</th>
                            <th>Staff</th>
                            <th>Budget Cost</th>
                            <th>Quoted Price</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>1</td>
                            <td>x</td>
                            <td>077 3584572</td>
                            <td>info@9xlabs.com</td>
                            <td>
                                <ul>
                                    <li> External Audit </li>
                                    <li> Feasibility </li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li> Kasun  | 5hr </li>
                                    <li> Lakshan | 6hr  </li>
                                </ul>
                            </td>
                            <td>170,000</td>
                            <td>250,000</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger">view</a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>x</td>
                            <td>077 3584572</td>
                            <td>info@9xlabs.com</td>
                            <td>
                                <ul>
                                    <li> External Audit </li>
                                    <li> Feasibility </li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li> Kasun  | 5hr </li>
                                    <li> Lakshan | 6hr  </li>
                                </ul>
                            </td>
                            <td>170,000</td>
                            <td>250,000</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger">view</a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>x</td>
                            <td>077 3584572</td>
                            <td>info@9xlabs.com</td>
                            <td>
                                <ul>
                                    <li> External Audit </li>
                                    <li> Feasibility </li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li> Kasun  | 5hr </li>
                                    <li> Lakshan | 6hr  </li>
                                </ul>
                            </td>
                            <td>170,000</td>
                            <td>250,000</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger">view</a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>x</td>
                            <td>077 3584572</td>
                            <td>info@9xlabs.com</td>
                            <td>
                                <ul>
                                    <li> External Audit </li>
                                    <li> Feasibility </li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li> Kasun  | 5hr </li>
                                    <li> Lakshan | 6hr  </li>
                                </ul>
                            </td>
                            <td>170,000</td>
                            <td>250,000</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger">view</a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>x</td>
                            <td>077 3584572</td>
                            <td>info@9xlabs.com</td>
                            <td>
                                <ul>
                                    <li> External Audit </li>
                                    <li> Feasibility </li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li> Kasun  | 5hr </li>
                                    <li> Lakshan | 6hr  </li>
                                </ul>
                            </td>
                            <td>170,000</td>
                            <td>250,000</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger">view</a>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->