<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_purchase_orders', function (Blueprint $table) {
            $table->increments('id');

            $table->date('create_date')->default(\Carbon\Carbon::now());
            $table->unsignedInteger('po_id')->nullable();
            $table->text('location')->nullable();
            $table->text('delivery_address')->nullable();
            $table->date('delivery_date')->default(\Carbon\Carbon::now());

            $table->unsignedInteger('supplier_id')->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('supplier_quote_no')->nullable();
            $table->string('department')->nullable();
            $table->string('project_code')->nullable();
            $table->unsignedInteger('company_division_id')->nullable();

            $table->timestamps();
            $table->foreign('company_division_id')->references('id')->on('company_divisions')->onDelete('cascade');

        });

        Schema::create('customer_purchase_orders', function (Blueprint $table) {
            $table->increments('id');

            $table->date('create_date')->default(\Carbon\Carbon::now());
            $table->unsignedInteger('po_id')->nullable();
            $table->text('location')->nullable();
            $table->text('delivery_address')->nullable();
            $table->date('delivery_date')->default(\Carbon\Carbon::now());

            $table->unsignedInteger('supplier_id')->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('supplier_quote_no')->nullable();
            $table->string('department')->nullable();
            $table->string('project_code')->nullable();
            $table->unsignedInteger('company_division_id')->nullable();

            $table->timestamps();
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
        Schema::dropIfExists('company_purchase_orders');
        Schema::dropIfExists('customer_purchase_orders');
    }
}
