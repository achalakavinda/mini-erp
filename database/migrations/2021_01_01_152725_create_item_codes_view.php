<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemCodesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW item_codes_view AS
            SELECT
                IT.id as item_id,
                IT.name as item_name,
                IT.description as item_description,
                B.name as brand_name,
                CAT.name as category_name,
                C.code as color_name,
                S.code as size_name,
                IT.unit_cost,
                IT.selling_price,
                IT.market_price,
                IT.min_price,
                IT.max_price,
                IT.nbt_tax_percentage,
                IT.vat_tax_percentage,
                IT.unit_price_with_tax,
                (
                    SELECT sum(stock_items.tol_qty) FROM stock_items
                    WHERE stock_items.item_code_id = IT.id
                    GROUP BY stock_items.item_code_id
                ) as stock_qty
                FROM item_codes IT
                LEFT JOIN brands B on B.id = IT.brand_id
                LEFT JOIN categories CAT on CAT.id = IT.category_id
                LEFT JOIN sizes S on S.id = IT.size_id
                LEFT JOIN colors C on C.id = IT.color_id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS item_codes_view');
    }

}
