<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->string('code');
            $table->double('number_of_hrs')->default(0);
            $table->double('budget_cost')->default('0');
            $table->double('quoted_price')->default('0');
            $table->double('actual_cost')->default('0');
            $table->double('revenue')->default('0');
            $table->double('recovery_ratio')->default('0');
            $table->boolean('close')->default(0);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelte('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
