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
            $table->unsignedInteger('item_code_id');
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('company_division_id');
            $table->unsignedInteger('company_purchase_order_item_id')->nullable();

            $table->string('item_code');//store stock item name, history log
            $table->double('item_unit_cost_from_table')->default(0);//store the value on item code table
            $table->double('unit_price')->default(0);//stock added unit price
            $table->double('qty')->default(0);//item created quantity
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

            $table->foreign('item_code_id')
                ->references('id')
                ->on('item_codes');

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
