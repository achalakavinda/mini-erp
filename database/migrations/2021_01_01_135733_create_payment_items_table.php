<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_items', function (Blueprint $table) {

            $table->id();
            $table->foreignId('payment_id');

            $table->foreignId('invoice_id')->nullable();
            $table->double('total_amount')->default(0);
            $table->double('payment_amount')->default(0);
            $table->double('remain_amount')->default(0);

            $table->unsignedInteger('credit_account_id')->nullable();
            $table->unsignedInteger('debit_account_id')->nullable();
            $table->double('credit_amount')->default(0);
            $table->double('debit_amount')->default(0);
            $table->boolean('commit')->default(0);
            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->foreign('payment_id')
                ->references('id')
                ->on('payments');

            $table->foreign('credit_account_id')
                ->references('id')
                ->on('accounts');

            $table->foreign('debit_account_id')
                ->references('id')
                ->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_items');
    }
}
