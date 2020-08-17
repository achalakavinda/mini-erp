<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requisition_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('purchase_requisition_status')->insert([
            [
                'id'=>1,
                'name'=>'Pending'
            ],
            [
                'id'=>2,
                'name'=>'Approved'
            ],
            [
                'id'=>3,
                'name'=>'Posted to Purchase Order'
            ]
        ]);

        Schema::create('purchase_requisitions', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('company_division_id')->nullable();
            $table->unsignedInteger('purchase_requisition_status_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('created_by');


            $table->text('code')->nullable();
            $table->date('date')->default(\Carbon\Carbon::now());
            $table->boolean('posted_to_po')->default(false);
            $table->double('total')->default(0);
            $table->boolean('commit')->default(false);
            $table->longText('remarks')->nullable();

            $table->timestamps();



            $table->foreign('company_division_id')
                ->references('id')
                ->on('company_divisions')
                ->onDelete('cascade');

            $table->foreign('purchase_requisition_status_id')
                ->references('id')
                ->on('purchase_requisition_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_requisitions');
        Schema::dropIfExists('purchase_requisition_status');
    }
}
