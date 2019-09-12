<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_purchase_order_items', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('company_purchase_order_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('item_code_id');
            $table->double('price');
            $table->double('qty');
            $table->double('value');
            $table->text('remarks');
            $table->unsignedInteger('company_division_id');
            $table->timestamps();

            $table->foreign('company_purchase_order_id')->references('id')->on('company_purchase_orders')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('company_division_id')->references('id')->on('company_divisions')->onDelete('cascade');
            $table->foreign('item_code_id')->references('id')->on('item_codes')->onDelete('cascade');

        });

        Schema::create('customer_purchase_order_items', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('customer_purchase_order_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('item_code_id');
            $table->double('price');
            $table->double('qty');
            $table->double('value');
            $table->text('remarks');
            $table->unsignedInteger('company_division_id');
            $table->timestamps();

            $table->foreign('customer_purchase_order_id')->references('id')->on('customer_purchase_orders')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('company_division_id')->references('id')->on('company_divisions')->onDelete('cascade');
            $table->foreign('item_code_id')->references('id')->on('item_codes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_purchase_order_items');
        Schema::dropIfExists('customer_purchase_order_items');
    }
}
