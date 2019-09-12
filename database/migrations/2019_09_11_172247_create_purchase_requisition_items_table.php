<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequisitionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requisition_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_requisition_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('item_code_id');
            $table->double('price');
            $table->double('qty');
            $table->double('value');
            $table->text('remarks');
            $table->double('stock_in_hand');
            $table->unsignedInteger('company_division_id');
            $table->timestamps();


            $table->foreign('purchase_requisition_id')->references('id')->on('purchase_requisitions')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_requisition_items');
    }
}
