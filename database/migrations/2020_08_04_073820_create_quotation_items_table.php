<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id');
            $table->unsignedInteger('item_code_id');
            $table->unsignedInteger('company_division_id');

            $table->text('item_code');
            $table->double('item_unit_cost_from_table')->default(0);//value on item code table
            $table->double('quoted_price');
            $table->double('quoted_discount')->nullable();
            $table->double('quoted_qty');
            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations')
                ->onDelete('cascade');

            $table->foreign('item_code_id')
                ->references('id')
                ->on('item_codes')
                ->onDelete('cascade');

            $table->foreign('company_division_id')
                ->references('id')
                ->on('company_divisions')
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
        Schema::dropIfExists('quotation_items');
    }
}
