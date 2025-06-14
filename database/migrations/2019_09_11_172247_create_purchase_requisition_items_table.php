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
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('purchase_requisition_id');
            $table->unsignedInteger('item_code_id');


            $table->string('item_code');//item name, history log
            $table->double('item_unit_cost_from_table')->default(0);//value on item code table
            $table->double('unit_price');
            $table->double('qty');
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('purchase_requisition_id')
                ->references('id')
                ->on('purchase_requisitions')
                ->onDelete('cascade');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies');
                
            $table->foreign('item_code_id')
                ->references('id')
                ->on('item_codes');

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
