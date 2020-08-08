<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {

            $table->increments('id');
            $table->string('invoice_no');
            $table->date('order_date')->default(\Carbon\Carbon::now());
            $table->date('dispatched_date')->default(\Carbon\Carbon::now());
            $table->string('purchase_order')->nullable();
            $table->unsignedInteger('delivery_method_id');
            $table->text('delivery_address')->nullable();
            $table->unsignedInteger('customer_id');
            $table->text('customer_detail')->nullable();
            $table->text('special_remarks')->nullable();
            $table->unsignedInteger('company_division_id')->nullable();
            $table->double('amount')->default(0);
            $table->double('discount')->default(0);
            $table->double('total')->default(0);

            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');

            $table->foreign('company_division_id')
                ->references('id')
                ->on('company_divisions')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
