<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::connection('mysqlMetaDB')->create('client_ips', function (Blueprint $table) {
//            $table->id();
//            $table->string('ip',48)->index();
//            $table->string('table')->nullable();
//            $table->string('table_id')->nullable();
//            $table->timestamps();
//        });
//
//        Schema::connection('mysqlMetaDB')->create('client_ip_histories', function (Blueprint $table) {
//            $table->id();
//            $table->string('ip',48)->index();
//            $table->string('table')->nullable();
//            $table->string('table_id')->nullable();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::connection('mysqlMetaDB')->dropIfExists('client_ips');
//        Schema::connection('mysqlMetaDB')->dropIfExists('client_ip_histories');
    }
}
