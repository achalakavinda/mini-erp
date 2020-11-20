<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW accounts_view AS
            SELECT
            MAT.code as main_account_type_code, MAT.name AS main_account_type_name, MAT.description AS main_account_type_description,
            AC.code as account_category_code, AC.name AS account_category_name, AC.description AS account_category_description,
            AT.code as account_type_code, AT.name AS account_type_name, AT.description AS account_type_description,
            A.code AS account_code, A.name AS account_name, A.description AS account_description

            FROM accounts A
               LEFT JOIN account_types AT ON AT.id = A.account_type_id
                  LEFT JOIN account_categories AC ON AC.id = AT.account_category_id
                    LEFT JOIN main_account_types MAT ON MAT.id = AC.main_account_type_id
            WHERE A.active = 1
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS accounts_view');
    }
}
