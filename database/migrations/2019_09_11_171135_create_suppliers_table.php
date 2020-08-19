<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('address')->nullable();
            $table->text('contact')->nullable();
            $table->text('email')->nullable();
            $table->boolean('active')->default(1);
            $table->string('web_url')->nullable();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('company_division_id');
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
        Schema::dropIfExists('suppliers');
    }
}