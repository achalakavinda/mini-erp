<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('workable')->default(0);
            $table->text('description')->nullable();
            
        });

        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_name')->nullable();
            $table->integer('type_id')->nullable();
            $table->text('description')->nullable();
            $table->date('date');
            $table->boolean('workable')->default(0);
            $table->boolean('workable_extra_hr')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
        Schema::dropIfExists('day_types');
    }
}
