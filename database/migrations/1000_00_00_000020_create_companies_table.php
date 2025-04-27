<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('key')->unique();
            $table->string('database')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });

        DB::table('companies')->insert([
            [
                'id'=>1,
                'code' => 'MC',
                'name' => 'Master Company',
                'key' => '100100',
                'database' => 'db100100',
                'email'=>'achalakavida25r@gmail.com',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
