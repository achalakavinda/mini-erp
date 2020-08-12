@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')

        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>

            <a href="{{ url('/staff/create') }}" class="btn btn-menu">
                <i class="fa fa-plus"></i> Add User
            </a>

            <a href="{{ url('/ims/item') }}" class="btn btn-menu">
                <i class="fa fa-plus"></i> Add Item
            </a>

            <a href="{{ url('/ims/stock') }}" class="btn btn-menu">
                <i class="fa fa-plus"></i> Add Stock
            </a>

            <a href="{{ url('/ims/invoice') }}" class="btn btn-menu">
                <i class="fa fa-plus"></i> Add Invoice
            </a>


        </div>
        <!-- /.row -->
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection

@section('main-content')
    <!-- main section -->
    <div class="row">

        <div class="col-md-6">
            <div class="box box-success" style="min-height: 400px">
                <div class="box-header with-border">
                    <h3 class="box-title">Inventory</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>GRN</th>
                            <th>Invoice</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0;?>
                        @foreach(\App\Models\Ims\Stock::all() as $stock)
                            <tr>
                                <td>{!! $stock->code !!}</td>
                                <td>{!! $stock->is_open_stock !!}</td>
                                <td>{!! $stock->created_date !!}</td>
                                <td>
                                    @if($stock->grn_id)
                                        <a target="_blank" href="{{ url('ims/grn/'.$stock->grn_id) }}">View</a>
                                    @endif
                                </td>
                                <td>
                                    @if($stock->invoice_id)
                                        <a target="_blank" href="{{ url('ims/invoice/'.$stock->invoice_id) }}">View</a>
                                    @endif
                                </td>
                                <td style="text-align: right">{!! number_format($stock->total, 2) !!}/=</td>
                                <?php $total = $total + $stock->total;?>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="5" style="text-align: right">Total Inventory :</th>
                            <th style="text-align: right">{{ number_format($total, 2) }}/=</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


        <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="box box-success" style="min-height: 400px">
                <div class="box-header with-border">
                    <h3 class="box-title">Distribution</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="bar-chart" style="height: 300px;"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="box box-success" style="min-height: 400px">
                <div class="box-header with-border">
                    <h3 class="box-title">Industry Category</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->



    </div>
    <!-- /.row -->
    <!-- /main section -->
@endsection


@section('style')
    {!! Html::style('admin/bower_components/morris.js/morris.css') !!}

@endsection

@section('js')
    {!! Html::script('admin/bower_components/raphael/raphael.min.js') !!}
    {!! Html::script('admin/bower_components/morris.js/morris.min.js') !!}
    @include('layouts.components.dataTableJs.index')
    <script>
        $(document).ready(function () {

            showMegaMenu();

            //DONUT CHART
            var donut = new Morris.Donut({
                element: 'sales-chart',
                resize: true,
                data: [
                    {label: "Finance, Insurance & Real", value: 1},
                    {label: "Agriculture, Fishing & Forestry", value: 30},
                    {label: "Construction", value: 24},
                    {label: "Manufacturing", value: 16},
                    {label: "Transportation & Communication", value: 12},
                    {label: "Wholesale", value: 4},
                    {label: "Estate Retail", value: 13},
                ],
                hideHover: 'auto'
            });

            //BAR CHART
            var bar = new Morris.Bar({
                element: 'bar-chart',
                resize: true,
                data: [
                    {y: 'External Audit', a: 1172246, b: 1053782},
                    {y: 'Tax Compliance', a: 849425, b: 802471},
                    {y: 'BPO', a: 526788, b: 409788},
                    {y: 'Company Secretarial', a: 463052, b: 378198},
                    {y: 'Internal Audit', a: 17053, b: 1179436},
                    {y: 'Winidng Up', a: 142548, b: 168268},
                    {y: 'Advisory', a: 533568, b: 313203},
                    {y: 'Others', a: 42305, b: 33818},
                    {y: 'Feasibility', a: 23684, b: 184061},
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Actual', 'Budget'],
                hideHover: 'auto'
            });
        })
    </script>
@endsection
