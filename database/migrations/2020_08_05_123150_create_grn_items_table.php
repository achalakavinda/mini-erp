<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrnItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grn_items', function (Blueprint $table) {

            $table->id();
            $table->foreignId('grn_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('item_code_id');
            $table->unsignedInteger('company_division_id');

            $table->string('item_code');//store stock item name, history log
            $table->double('item_unit_cost_from_table')->default(0);//store the value on item code table
            $table->double('unit_price')->default(0);//stock added unit price
            $table->double('created_qty')->default(0);//item created quantity
            $table->double('total')->default(0);

            $table->timestamps();

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

            $table->foreign('grn_id')
                ->references('id')
                ->on('grns')
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
        Schema::dropIfExists('grn_items');
    }
}
