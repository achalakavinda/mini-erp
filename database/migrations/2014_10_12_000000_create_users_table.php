<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('company_id')->default(1);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();

            $table->string('name');
            $table->string('img_url',500)->default("https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png");
            $table->string('email')->unique();
            $table->string('google_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies');

            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->foreign('updated_by')
                ->references('id')
                ->on('users');
                

        });

        Schema::table('users', function ($table) {
            $table->string('api_token', 80)->after('password')
                ->unique()
                ->nullable()
                ->default(null);
        });

        DB::table('users')->insert([
            [
                'id'=>1,
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('admin123'),
                'company_id'=>1,
                'api_token' => Str::random(60),
            ],

             [
                'id'=>2,
                'name' => 'Achala Tenant01',
                'email' => 'achalakavinda25r@gmail.com',
                'password' => bcrypt('Admin321!'),
                'company_id'=>1,
                'api_token' => Str::random(60),
            ],
            [
                'id'=>3,
                'name' => 'Achala Tenant02',
                'email' => 'achalakavinda95@gmail.com',
                'password' => bcrypt('Admin321!'),
                'company_id'=>2,
                'api_token' => Str::random(60),
            ],

        ]);

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    
        Schema::dropIfExists('users');        
        Schema::dropIfExists('sessions');
    
    }
}
