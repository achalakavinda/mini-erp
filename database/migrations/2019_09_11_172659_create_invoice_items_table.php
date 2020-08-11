<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         *  For one invoice there can be multiple invoice items
        */

        Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('item_code_id');//use to map invoice to specific stock item
            $table->unsignedInteger('stock_item_id');

            $table->double('item_unit_cost_from_table');
            $table->double('unit_price');
            $table->double('unit_discount')->default(0);
            $table->double('qty');
            $table->double('total');

            $table->text('remarks')->nullable();
            $table->unsignedInteger('company_division_id');
            $table->timestamps();

            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');

            $table->foreign('company_division_id')
                ->references('id')
                ->on('company_divisions')
                ->onDelete('cascade');

            $table->foreign('item_code_id')
                ->references('id')
                ->on('item_codes')
                ->onDelete('cascade');

            $table->foreign('stock_item_id')
                ->references('id')
                ->on('stock_items')
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
        Schema::dropIfExists('invoice_items');
    }
}
