<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requisition_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('purchase_requisitions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->default(\Carbon\Carbon::now());
            $table->unsignedInteger('company_division_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('purchase_requisition_status_id')->nullable();
            $table->timestamps();

            $table->foreign('company_division_id')->references('id')->on('company_divisions')->onDelete('cascade');
            $table->foreign('purchase_requisition_status_id')->references('id')->on('purchase_requisition_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_requisitions');
        Schema::dropIfExists('purchase_requisition_status');
    }
}
