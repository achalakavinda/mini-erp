<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //chart of accounts
        Schema::create('account_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('main_account_type_id');
            $table->integer('level')->default(0);

            $table->string('code')->unique();
            $table->string('customize_code')->unique()->nullable();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('company_id');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('parent_id')
                ->references('id')
                ->on('account_categories')
                ->onDelete('cascade');

            $table->foreign('main_account_type_id')
                ->references('id')
                ->on('main_account_types');

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
        Schema::dropIfExists('account_categories');
    }
}
