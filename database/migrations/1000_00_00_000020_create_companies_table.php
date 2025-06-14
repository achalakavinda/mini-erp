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
            $table->unsignedInteger('tenant_id');
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants');
        });

        DB::table('companies')->insert([
            [
                'id'=>1,
                'code' => 'TEST_COMPANY_1_TENANT_1',
                'tenant_id'=>1,
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
             [
                'id'=>2,
                'code' => 'TEST_COMPANY_2_TENANT_1',
                'tenant_id'=>1,
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
             ],
             [
                'id'=>3,
                'code' => 'TEST_COMPANY_1_TENANT_2',
                'tenant_id'=>1,
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
             [
                'id'=>4,
                'code' => 'TEST_COMPANY_2_TENANT_2',
                'tenant_id'=>1,
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
        Schema::dropIfExists('companies');
    }
}
