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
            $table->string('customer_name');
            $table->string('code');

            $table->double('quoted_price')->default(0);// quoted price
            $table->double('budget_number_of_hrs')->default(0);// number of hrs
            $table->double('budget_cost_by_work')->default(0);//budget cost by work
            $table->double('budget_cost_by_overhead')->default(0);//budget cost by cost overhead
            $table->double('budget_cost')->default(0);// budget cost
            $table->double('budget_revenue')->default(0);// revenue

            $table->double('actual_number_of_hrs')->default(0);//actual number of hrs
            $table->double('actual_cost_by_work')->default(0);//actual cost by work
            $table->double('actual_cost_by_overhead')->default(0);//actual cost by cost overhead
            $table->double('actual_cost')->default(0);//actual cost
            $table->double('actual_revenue')->default(0);//actual revenue

            $table->double('cost_variance')->default(0);// cost variance
            $table->double('recovery_ratio')->default('0');// recovery ratio
            $table->double('profit_ratio')->default('0');// profit ratio

            $table->boolean('close')->default(0);

            $table->timestamps();
            $table->unsignedInteger('created_by_id');
            $table->unsignedInteger('updated_by_id')->nullable();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelte('cascade');
            $table->foreign('created_by_id')->references('id')->on('users');
            $table->foreign('updated_by_id')->references('id')->on('users');
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
