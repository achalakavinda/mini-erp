<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
