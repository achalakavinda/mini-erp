<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_address', function (Blueprint $table) {
            $table->unsignedInteger('supplier_id');
            $table->text('value');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('company_division_id');
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('company_division_id')->references('id')->on('company_divisions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_address');
    }
}
