<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_division_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('created_by');

            $table->string('code');
            $table->date('date')->default(\Carbon\Carbon::now());
            $table->text('remarks')->nullable();
            $table->double('amount')->default(0);
            $table->double('discount')->default(0);
            $table->double('total')->default(0);
            $table->boolean('commit')->default(false);
            $table->boolean('posted_to_sales_order')->default(false);
            $table->boolean('posted_to_invoice')->default(false);

            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
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
        Schema::dropIfExists('quotations');
    }
}
