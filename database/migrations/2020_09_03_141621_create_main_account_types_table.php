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
            $table->string('code')->unique();
            $table->string('customize_code')->unique()->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        DB::table('main_account_types')->insert([
            [
                'id'=>1,
                'code'=>'A001',
                'name' => strtoupper('assets')
            ],
            [
                'id'=>2,
                'code'=>'C001',
                'name' => strtoupper('capital')
            ],
            [
                'id'=>3,
                'code'=>'E001',
                'name' => strtoupper('expenses')
            ],
            [
                'id'=>4,
                'code'=>'I001',
                'name' => strtoupper('income')
            ],
            [
                'id'=>5,
                'code'=>'L001',
                'name' => strtoupper('liability')
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
