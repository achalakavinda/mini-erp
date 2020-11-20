<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerReturnNoteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_return_note_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_return_note_id');
            $table->unsignedInteger('invoice_item_id');
            $table->unsignedInteger('item_code_id');
            $table->unsignedInteger('stock_item_id');//use to map invoice to specific stock item
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('company_division_id')->nullable();

            $table->double('item_unit_cost_from_table');
            $table->double('unit_price');
            $table->double('unit_discount')->default(0);
            $table->double('qty');
            $table->double('return_qty')->default(0);
            $table->double('total');

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

            $table->foreign('customer_return_note_id')
                ->references('id')
                ->on('customer_return_notes');

            $table->foreign('invoice_item_id')
                ->references('id')
                ->on('invoice_items');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies');

            $table->foreign('company_division_id')
                ->references('id')
                ->on('company_divisions');

            $table->foreign('item_code_id')
                ->references('id')
                ->on('item_codes');

            $table->foreign('stock_item_id')
                ->references('id')
                ->on('stock_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_return_note_items');
    }
}