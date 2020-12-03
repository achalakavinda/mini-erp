<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePaymentViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW invoices_payment_view AS
            SELECT
            INV.id AS invoice_id,
            PI.id AS payment_id,
            INV.code AS invoice_code,
            PI.total_amount,
            COALESCE(SUM(PI.payed_amount),0) as payed_amount
            FROM
                invoices INV
            RIGHT JOIN payment_items PI ON
                INV.id = PI.invoice_id
            GROUP BY
                INV.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS invoices_payment_view');
    }
}