<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->time('from');
            $table->time('to');
            $table->integer('hrs');
            $table->boolean('worked');
            $table->boolean('read_hrs_first')->default(false);
            $table->timestamps();
        });

        DB::table('work_codes')->insert([
                [
                    'id'=>1,
                    'name'=>'Work',
                    'from'=>'08:30:00',
                    'to'=>'17:30:00',
                    'hrs'=>'7.5',
                    'worked'=>true,
                    'read_hrs_first'=>true,
                    "created_at"=>\Carbon\Carbon::now(),
                    "updated_at"=>\Carbon\Carbon::now()
                ],
                [
                    'id'=>2,
                    'name'=>'Half Day - Morning',
                    'from'=>'08:30:00',
                    'to'=>'12:30:00',
                    'hrs'=>'4',
                    'worked'=>false,
                    'read_hrs_first'=>true,
                    "created_at"=>\Carbon\Carbon::now(),
                    "updated_at"=>\Carbon\Carbon::now()
                ],
                [
                    'id'=>3,
                    'name'=>'Half Day - Evening',
                    'from'=>'12:30:00',
                    'to'=>'17:30:00',
                    'hrs'=>'4',
                    'worked'=>false,
                    'read_hrs_first'=>true,
                    "created_at"=>\Carbon\Carbon::now(),
                    "updated_at"=>\Carbon\Carbon::now()
                ],
                [
                    'id'=>4,
                    'name'=>'Full day leave',
                    'from'=>'08:30:00',
                    'to'=>'17:30:00',
                    'hrs'=>'7.5',
                    'worked'=>false,
                    'read_hrs_first'=>true,
                    "created_at"=>\Carbon\Carbon::now(),
                    "updated_at"=>\Carbon\Carbon::now()
                ],
                [
                    'id'=>5,
                    'name'=>'Short Leave',
                    'from'=>'08:30:00',
                    'to'=>'17:30:00',
                    'hrs'=>'1',
                    'worked'=>false,
                    'read_hrs_first'=>true,
                    "created_at"=>\Carbon\Carbon::now(),
                    "updated_at"=>\Carbon\Carbon::now()
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
        Schema::dropIfExists('work_codes');
    }
}
