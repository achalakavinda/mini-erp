<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_slots', function (Blueprint $table) {
            $table->increments('id');
            $table->time('from');
            $table->time('to');
            $table->string('slot_type');
            $table->timestamps();
        });

        DB::table('time_slots')->insert([
            [
                'from' => '08:00:00',
                'to'=>'08:30:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '08:30:00',
                'to'=>'09:00:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '09:00:00',
                'to'=>'09:30:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '09:30:00',
                'to'=>'10:00:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '10:00:00',
                'to'=>'10:30:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '10:30:00',
                'to'=>'11:00:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '11:00:00',
                'to'=>'11:30:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '11:30:00',
                'to'=>'12:00:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '12:00:00',
                'to'=>'12:30:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '12:30:00',
                'to'=>'13:00:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '13:00:00',
                'to'=>'13:30:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '13:30:00',
                'to'=>'14:00:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '14:00:00',
                'to'=>'14:30:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '14:30:00',
                'to'=>'15:00:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '15:00:00',
                'to'=>'15:30:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '15:30:00',
                'to'=>'16:00:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '16:00:00',
                'to'=>'16:30:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '16:30:00',
                'to'=>'17:00:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
            ],
            [
                'from' => '17:00:00',
                'to'=>'17:30:00',
                'created_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'slot_type'=>'default'
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
        Schema::dropIfExists('time_slots');
    }
}
