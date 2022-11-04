<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBatteriesOfficesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW batteries_office_progress
        AS
            SELECT offices.new_office as office_name,COUNT(DISTINCT battery_add.site__deployed) as num_office_name
            FROM `battery_add`
            JOIN `sites` on (sites.id=battery_add.site__deployed)
            RIGHT JOIN `offices` on (offices.id=sites.office_id)
            group by offices.new_office;

        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batteries_offices_progress');
    }
}
