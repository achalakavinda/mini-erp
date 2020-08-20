<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->timestamps();
        });

        DB::table('payment_types')->insert([
            [
                'id'=>1,
                'code' => 'collection',
            ],
            [
                'id'=>2,
                'code' => 'payment',
            ]
        ]);

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_type_id');
            $table->double('total');
            $table->unsignedInteger('created_by')->nullable();
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
        Schema::dropIfExists('payments');
        Schema::dropIfExists('payment_types');
    }
}
