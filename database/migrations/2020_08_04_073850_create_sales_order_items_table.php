<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('item_code_id');
            $table->foreignId('sales_order_id');
            $table->unsignedInteger('company_id')->nullable();

            $table->text('item_code');
            $table->double('unit_price');
            $table->double('discount')->nullable();
            $table->double('qty');
            $table->double('total');
            $table->text('remarks')->nullable();

            $table->timestamps();


            $table->foreign('sales_order_id')
                ->references('id')
                ->on('sales_orders')
                ->onDelete('cascade');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands');

            $table->foreign('item_code_id')
                ->references('id')
                ->on('item_codes');

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
        Schema::dropIfExists('sales_order_items');
    }
}
