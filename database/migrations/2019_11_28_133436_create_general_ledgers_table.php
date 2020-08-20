<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->default(\Carbon\Carbon::now());
            $table->unsignedInteger('g_l_code_id');
            $table->text('description');
            $table->unsignedInteger('journal_code_id');
            $table->float('amount')->default(0);
            $table->unsignedInteger('user_id');

            $table->foreign('g_l_code_id')->references('id')->on('g_l_codes');
            $table->foreign('journal_code_id')->references('id')->on('journal_codes');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('general_ledgers');
    }
}
