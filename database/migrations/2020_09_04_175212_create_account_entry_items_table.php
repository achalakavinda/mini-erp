<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountEntryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_entry_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_entry_id');
            $table->text('description')->nullable();
            $table->date('opening_date')->default(\Carbon\Carbon::now());
            $table->enum('type',['debt ','credit']);
            $table->float('value')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        DB::table('account_entry_items')->insert([
            [
                'account_entry_id'=>1,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>2,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>2,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>2,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>4,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>4,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>4,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>5,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>5,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>5,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>5,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>9,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>9,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
            [
                'account_entry_id'=>9,
                'description'=>'seed data',
                'opening_date'=>\Carbon\Carbon::now(),
                'type'=>'debt',
                'value'=>1000,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_entry_items');
    }
}
