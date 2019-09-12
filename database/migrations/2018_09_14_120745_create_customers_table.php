<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('contact')->nullable();
            $table->string('contact_1')->nullable();
            $table->string('contact_2')->nullable();
            $table->string('contact_3')->nullable();
            $table->string('email')->nullable();
            $table->string('file_no')->unique();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->text('address_3')->nullable();
            $table->text('fax_number')->nullable();
            $table->unsignedInteger('secretary_id')->nullable();
            $table->text('date_of_incorporation')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('vat_no')->nullable();
            $table->string('ceo')->nullable();
            $table->string('ceo_contact')->nullable();
            $table->string('ceo_email')->nullable();
            $table->string('cfo')->nullable();
            $table->string('cfo_contact')->nullable();
            $table->string('cfo_email')->nullable();
            $table->string('website')->nullable();
            $table->unsignedInteger('service_id')->nullable();
            $table->unsignedInteger('sector_id')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();

            $table->foreign('secretary_id')->references('id')->on('customer_secretaries')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('customer_services')->onDelete('cascade');
            $table->foreign('sector_id')->references('id')->on('customer_sectors')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
