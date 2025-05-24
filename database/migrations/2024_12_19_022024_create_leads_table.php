<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        function tableStructure(Blueprint $table) {
            $table->id();
            $table->string('post_url');
            $table->string('company_name');
            $table->foreignId('lead_type_id');
            $table->string('message');
            $table->timestamps();

            $table->foreign('lead_type_id')
            ->references('id')
            ->on('lead_types')
            ->onDelete('cascade');
        } 

        Schema::create('leads', function(Blueprint $table) {
            return tableStructure($table);
        } );

    //     if (!Schema::connection('webcore')->hasTable('leads')) {
    //             Schema::connection('webcore')
    //             ->create('leads', function(Blueprint $table) {
    //         return tableStructure($table);
    //     } );
    // }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
