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
            $table->string('contact_0');
            $table->string('contact_1')->nullable();
            $table->string('contact_2')->nullable();
            $table->string('email_0')->nullable();
            $table->string('email_1')->nullable();
            $table->string('address_0')->nullable();
            $table->string('address_1')->nullable();
            $table->string('web_url')->nullable();

            $table->unsignedInteger('company_division_id');
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
        Schema::dropIfExists('suppliers');
    }
}
