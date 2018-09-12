@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Work Sheet</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/work-sheet') }}" class="btn btn-success">Work Sheet</a>
            <a href="{{ url('/work-sheet/create') }}" class="btn btn-success">New</a>
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
                    <h3 class="box-title">Work Sheet |  {{ new \Carbon\Carbon() }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">

                        <div class="form-group">
                            <label>Employee</label>
                            <select class="form-control">
                                <option>Samith</option>
                            </select>
                        </div>

                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th>Work</th>
                                <th>Customer</th>
                                <th>Job Type</th>
                                <th>Remark</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>8.30 am - 9.00 am</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                       <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                       </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>9.00 am - 9.30 am</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>9.30 am - 10.00 am</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>10.00 am - 10.30 am</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>10.30 am - 11.00 am</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>11.00 am - 11.30 am</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>11.30 am - 12.00 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>12.00 pm - 12.30 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>12.30 pm - 1.00 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>1.00 pm - 1.30 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>1.30 pm - 2.00 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>2.00 pm - 2.30 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>2.30 am - 3.00 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>3.00 pm - 3.30 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>3.30 pm - 4.00 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>4.00 pm - 4.30 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>4.30 pm - 5.00 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>

                                <tr>
                                    <td>5.00 pm - 5.30 pm</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>External Audit</option>
                                            <option>Internal Audit</option>
                                            <option>Feasibility</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="remark" placeholder="remark">
                                    </td>

                                </tr>




                            </tbody>
                        </table>

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