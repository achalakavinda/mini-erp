<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_measurements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });


        Schema::create('item_codes', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('brand_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->unsignedInteger('item_code_batch_id')->nullable();
            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('size_id')->nullable();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('company_division_id');
            $table->unsignedInteger('type_measurement_id')->nullable();

            $table->enum('type',['product','service'])->default('product');


            $table->string('name');
            $table->string('description')->nullable();
            $table->text('thumbnail_url')->nullable();

            $table->float('unit_cost');
            $table->float('selling_price');

            $table->float('nbt_tax_percentage')->default(0);
            $table->float('vat_tax_percentage')->default(0);
            $table->float('unit_price_with_tax');

            $table->float('market_price')->nullable();
            $table->float('min_price')->nullable();
            $table->float('max_price')->nullable();

            $table->boolean('active')->default(1);

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

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands');

            $table->foreign('item_code_batch_id')
                ->references('id')
                ->on('item_code_batches');

            $table->foreign('color_id')
                ->references('id')
                ->on('colors');

            $table->foreign('size_id')
                ->references('id')
                ->on('sizes');

            $table->foreign('type_measurement_id')
                ->references('id')
                ->on('type_measurements');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies');

            $table->foreign('company_division_id')
                ->references('id')
                ->on('company_divisions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_codes');
        Schema::dropIfExists('type_measurements');
    }
}
