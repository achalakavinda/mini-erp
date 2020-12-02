@extends('layouts.print')

@section('main-content')


    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">

            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> 9x Labs, Inc.
                        <small class="pull-right">Date: 2/10/2014</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Order Date : {!! $Invoice->order_date !!}</b><br/>
                    <b>PO.No : </b> {!! $Invoice->purchase_order !!}<br>
                    <b>Invoice No:</b> {!! $Invoice->invoice_no !!}<br>
                    <b>Our Vat No:</b> 23123123213<br>
                    <b>Dispatch Date:</b> {!! $Invoice->dispatched_date !!}<br>
                    <b>Dispatch Method:</b> By Customer<br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->



            <!-- info row -->
            <div style="padding-top: 20px;" class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Deliver Address
                    <address>
                        <strong>Admin, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: info@almasaeedstudio.com
                    </address>
                </div>

                <!-- /.col -->
                <div class="col-sm-4 invoice-col"></div>
                <!-- /.col -->

                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Customer Details
                    <address>
                        <strong>John Doe</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                    </address>
                </div>

            </div>
            <!-- /.row -->



            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>

                        <tr>
                            <th>Item</th>
                            <th>Model</th>
                            <th>Brand</th>
                            <th>Qty</th>
                            <th>Unit Price (LKR)</th>
                            <th>Total (LKR)</th>
                        </tr>

                        </thead>
                        <tbody>

                        @foreach(\App\Models\FinancialNotes\InvoiceItem::where('invoice_id',$Invoice->id)->get() as $item)
                            <tr>
                                <td>{!! $item->id !!}</td>
                                <td><?php $Model = \App\Models\ItemCode::find($item->item_code_id); if($Model!=null){echo $Model->name;}?></td>
                                <td><?php $Brand = \App\Models\Brand::find($item->brand_id); if($Brand!=null){echo $Brand->name;}?></td>
                                <td>{!! $item->qty !!}</td>
                                <td>{!! $item->price !!}</td>
                                <td>{!! $item->value !!}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-8">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>{!! $Invoice->amount !!}</td>
                            </tr>
                            <tr>
                                <th>Discount:</th>
                                <td>{!! $Invoice->discount !!}%</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>{!! $Invoice->total !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div style="padding-top: 20px;" class="row invoice-info">

                <div class="col-sm-12 invoice-col">
                    <p class=" well-sm no-shadow" style="margin-top: 10px;">
                        {!! $Invoice->special_remarks !!}
                    </p>
                </div>
                <br/>
                <br/>
                <br/>

                <div class="col-sm-3 invoice-col">
                    .............................<br/>
                    Prepared By
                </div>

                <div  class="col-sm-3 invoice-col">
                    .............................<br/>
                    Prepared By
                </div>

                <div class="col-sm-3 invoice-col">
                    .............................<br/>
                    Prepared By
                </div>

            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

@endsection
