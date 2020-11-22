<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilityStoredProcedures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            DROP PROCEDURE IF EXISTS `getItemStockQtyByItemId`;

            CREATE PROCEDURE `getItemStockQtyByItemId`
            (IN `ItemCodeId` INT)
            NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER

            SELECT IC.name, IC.description, IC.unit_cost, IC.selling_price, IC.unit_price_with_tax,
            COALESCE(
            (SELECT sum(SI.tol_qty) FROM stock_items SI where SI.item_code_id = ItemCodeId GROUP BY SI.item_code_id)
            ,0) AS stock_qty
            FROM item_codes IC WHERE IC.id = ItemCodeId
         ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
