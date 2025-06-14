<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLeadTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        function leadtableStructure(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        } 

        Schema::create('lead_types', function(Blueprint $table) {
            return leadtableStructure($table);
        } );

        DB::table('lead_types')->insert([
            ['name' => 'Website Inquiry', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Phone Call', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Email', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Referral', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Other', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // if (!Schema::connection('webcore')->hasTable('leads')) {
        //         Schema::connection('webcore')
        //         ->create('leads', function(Blueprint $table) {
        //     return tableStructure($table);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_types');
    }
}
