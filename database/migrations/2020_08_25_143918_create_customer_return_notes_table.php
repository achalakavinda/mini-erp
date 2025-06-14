<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerReturnNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_return_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('invoice_id')->nullable();

            $table->string('code');
            $table->date('date')->default(\Carbon\Carbon::now());
            $table->date('order_date')->nullable()->default(\Carbon\Carbon::now());
            $table->date('dispatched_date')->nullable()->default(\Carbon\Carbon::now());
            $table->string('purchase_order')->nullable();

            $table->text('delivery_address')->nullable();
            $table->text('remarks')->nullable();

            $table->double('amount')->default(0);//store total amount without discount
            $table->double('discount')->default(0);
            $table->double('total')->default(0);//total with discount

            $table->boolean('payment_received')->default(false);//this value set to true if any payment is received
            $table->unsignedInteger('invoice_payment_status_id')->default(1);
            $table->timestamps();

            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices');

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_return_notes');
    }
}