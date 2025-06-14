<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //chart of accounts
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_type_id');

            $table->string('code')->unique();
            $table->string('customize_code')->unique()->nullable();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('company_id');
            $table->boolean('active')->default(true);
            $table->timestamps();


            $table->foreign('account_type_id')
                ->references('id')
                ->on('account_types');

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
        Schema::dropIfExists('accounts');
    }
}
