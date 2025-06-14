<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemCodeBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_code_batches', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('parent_id')->nullable();
            $table->integer('level')->default(0);
            $table->string('code')->unique();
            $table->string('description')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('item_code_batches');
    }
}
