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
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('company_division_id');
            $table->unsignedInteger('company_purchase_order_id');
            $table->unsignedInteger('purchase_requisition_item_id')->nullable();
            $table->unsignedInteger('item_code_id');

            $table->string('item_code');//item name, history log
            $table->double('item_unit_cost_from_table')->default(0);//value on item code table
            $table->double('unit_price');
            $table->double('qty');
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->string('userdef1')->nullable();
            $table->string('userdef2')->nullable();
            $table->string('userdef3')->nullable();
            $table->string('userdef4')->nullable();
            $table->string('userdef5')->nullable();
            $table->string('userdef6')->nullable();
            $table->string('userdef7')->nullable();
            $table->string('userdef8')->nullable();
            $table->string('userdef9')->nullable();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies');

            $table->foreign('company_division_id')
                ->references('id')
                ->on('company_divisions');

            $table->foreign('company_purchase_order_id')
                ->references('id')
                ->on('company_purchase_orders')
                ->onDelete('cascade');



            $table->foreign('item_code_id')
                ->references('id')
                ->on('item_codes');

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

            $table->foreign('customer_purchase_order_id')->references('id')->on('customer_purchase_orders');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('company_division_id')->references('id')->on('company_divisions');
            $table->foreign('item_code_id')->references('id')->on('item_codes');

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
