<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcelImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_excel_import_code_details', function (Blueprint $table) {

            $table->increments('id');
            $table->string('batch')->default('import code');
            $table->boolean('imported')->default(false);
            $table->unsignedInteger('company_division_id')->nullable();
            $table->foreign('company_division_id')
                ->references('id')->on('company_divisions')
                ->onDelete('cascade');
            $table->timestamps();

        });

        Schema::create('temp_excel_import_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('temp_excel_import_code_detail_id');
            $table->string('brand');
            $table->string('model');
            $table->string('description')->nullable();
            $table->double('unit_cost')->default(0);
            $table->integer('open_stock')->default(0);
            $table->boolean('imported')->default(false);
            $table->timestamps();

            $table->foreign('temp_excel_import_code_detail_id')
                ->references('id')->on('temp_excel_import_code_details')
                ->onDelete('cascade');

            //company division logic
            $table->unsignedInteger('company_division_id')->nullable();
            $table->foreign('company_division_id')->references('id')->on('company_divisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_excel_import_codes');
        Schema::dropIfExists('temp_excel_import_code_details');
    }
}
