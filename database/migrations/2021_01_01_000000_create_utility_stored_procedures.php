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
            DROP PROCEDURE IF EXISTS `getStockItemQtyById`;

            CREATE PROCEDURE `getStockItemQtyById`(IN `ItemCodeId` INT) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER

                SELECT
                    IC.name, IC.description, IC.unit_cost, IC.selling_price, IC.unit_price_with_tax,
                    COALESCE(SUM(SI.tol_qty),0) AS stock_qty
                FROM stock_items SI
                LEFT JOIN item_codes IC ON IC.id = SI.item_code_id
                WHERE SI.item_code_id = ItemCodeId
                GROUP BY SI.item_code_id

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
