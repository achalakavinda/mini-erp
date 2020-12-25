@include('error.error')
<!-- form start -->
<div class="box-body">
    <!-- invoice date -->
    <div class="col-md-12">

        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <p>
                    <select id="CustomerId" name="customer_id" class="ui search dropdown">
                        <option value=""> Choose a customer </option>
                        @foreach(\App\Models\Customer::all() as $customer)
                        <option value="{{ $customer->id }}"> {{ $customer->name }} </option>
                        @endforeach
                    </select>
                    <i class="pull-right">Date: {{ \Carbon\Carbon::now() }}</i>
                </p>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="col-md-8"></div>
        <!-- Issued date -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="Grn Date">Issued Date</label>
                <input id="date" class="form-control" name="order_date" type="date" value="">
            </div>
        </div>

        <div class="col-md-8"></div>
        <!-- date -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="Requisition Date">Courier Service</label>
                <input style="width: 100%" id="courier_service" name="courier_service" type="text" value="">


            </div>
        </div>

        <!-- Table row -->
        <div style="margin-top: 20px" class="row">
            <div class="col-xs-12">
                <table id="invoiceItemTable" class="table table-bordered">
                    <thead>
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>Item</th>
                            <th>QTY</th>
                            <th>Unit Price (LKR)</th>
                            <th>Total (LKR)</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>
                                @include('layouts.selectors.ims.item-dropdown.index')
                            </th>
                            <th><button id="addNewItem" type="button" style="width: 100%" class="btn">Add</button></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <!-- /.col -->
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td><input style="width: 100%" id="subtotal" name="subtotal" type="text"></td>
                        </tr>
                        <tr>
                            <th>Discount:</th>
                            <td><input style="width: 80%" id="discountpercentage" name="discount_percentage"
                                    type="text">%</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td><input style="width: 100%" id="total" name="total" type="text"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>
<div class="box-footer">

    <button type="submit" class="btn btn-app pull-right"><i style="color: #00a157" class="fa fa-save"></i>
        Post</button>
</div>