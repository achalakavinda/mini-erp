<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('country_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->foreignId('country_id')->nullable();
            $table->timestamps();
        });

        DB::table('countries')->insert([
            [
                'id'=>1,
                'code' => 'Sl',
                'name' => 'Sri Lanka',
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
        Schema::dropIfExists('country_locations');
        Schema::dropIfExists('countries');
    }
}
