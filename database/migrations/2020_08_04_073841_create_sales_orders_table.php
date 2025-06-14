<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();

            $table->text('code'); //create unique code.example SO-2012-12-04-{so_id}
            $table->date('date')->default(\Carbon\Carbon::now());
            $table->text('remarks')->nullable();
            $table->double('amount')->default(0);
            $table->double('discount')->default(0);
            $table->double('total')->default(0);
            $table->boolean('posted_to_invoice')->default(false);

            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies');

            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_orders');
    }
}
