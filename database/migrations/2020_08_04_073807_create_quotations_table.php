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
            $table->unsignedInteger('company_id')->nullable();
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

            $table->string('userdef1')->nullable();
            $table->string('userdef2')->nullable();
            $table->string('userdef3')->nullable();
            $table->string('userdef4')->nullable();
            $table->string('userdef5')->nullable();
            $table->string('userdef6')->nullable();
            $table->string('userdef7')->nullable();
            $table->string('userdef8')->nullable();
            $table->string('userdef9')->nullable();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');

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
        Schema::dropIfExists('quotations');
    }
}
