<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_storages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->longText('file_path');
            $table->longText('drive');
            $table->unsignedInteger('blog_id')->nullable();
            $table->unsignedBigInteger('place_id')->nullable();
            $table->timestamps();

            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs');

            $table->foreign('place_id')
                ->references('id')
                ->on('places');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_storages');
    }
}
