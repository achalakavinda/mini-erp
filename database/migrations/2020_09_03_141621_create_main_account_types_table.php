<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainAccountTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_account_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        DB::table('main_account_types')->insert([
            [
                'id'=>1,
                'name' => 'assets'
            ],
            [
                'id'=>2,
                'name' => 'capital'
            ],
            [
                'id'=>3,
                'name' => 'expenses'
            ],
            [
                'id'=>4,
                'name' => 'income'
            ],
            [
                'id'=>5,
                'name' => 'liability'
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_account_types');
    }
}