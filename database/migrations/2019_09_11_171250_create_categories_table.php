<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('parent_id')->nullable();
            $table->integer('level')->default(0);
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('img_url')->nullable();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('company_division_id');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('parent_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies');

            $table->foreign('company_division_id')
                ->references('id')
                ->on('company_divisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
