<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalNumberEmployeesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("

            CREATE VIEW total_number_employees(total_num_of_employees,contract_signed,contract_not_signed)
            AS
            SELECT
            COUNT(DISTINCT `civil_id`) AS `total_num_of_employees`,
            COUNT( IF( contract_confirmed = 1, 1, NULL ) ) As `contract_signed`,
            COUNT( IF( contract_confirmed = 0, 1, NULL ) ) As `contract_not_signed`
            FROM
                `employees`
            WHERE
                `deleted_at` IS NULL;



        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('total_number_employees_view');
    }
}
