<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //chart of accounts
        Schema::create('account_types', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('account_category_id');
            $table->integer('level')->default(0);

            $table->string('code')->unique();
            $table->string('customize_code')->unique()->nullable();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('company_division_id');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('parent_id')
                ->references('id')
                ->on('account_types')
                ->onDelete('cascade');

            $table->foreign('account_category_id')
                ->references('id')
                ->on('account_categories');


            $table->foreign('company_id')
                ->references('id')
                ->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_types');
    }
}
