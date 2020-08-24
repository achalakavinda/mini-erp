<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->timestamps();
        });

        Schema::create('company_detail_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->timestamps();
        });

        Schema::create('company_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->string('company_detail_code');
            $table->text('value')->nullable();
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies');

            $table->foreign('company_detail_code')
                ->references('code')
                ->on('company_detail_types');
        });

        DB::table('companies')->insert([
            [
                'id'=>1,
                'code' => 'Master-Company',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
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
        Schema::dropIfExists('company_details');
        Schema::dropIfExists('company_detail_types');
        Schema::dropIfExists('companies');
    }
}
