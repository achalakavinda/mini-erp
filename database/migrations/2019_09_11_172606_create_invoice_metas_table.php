<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_payment_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->timestamps();
        });

        DB::table('invoice_payment_status')->insert([
            [
                'id'=>1,
                'code'=>'unpaid',
                'updated_at'=>\Carbon\Carbon::now(),
                'created_at'=>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'code'=>'paid',
                'updated_at'=>\Carbon\Carbon::now(),
                'created_at'=>\Carbon\Carbon::now()
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
        Schema::dropIfExists('invoice_payment_status');
    }
}
