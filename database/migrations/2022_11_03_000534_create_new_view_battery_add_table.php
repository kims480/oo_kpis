<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNewViewBatteryAddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("

        CREATE VIEW batteries_week_count_chart
        AS
        SELECT WEEK(`install_date`,2) AS week, COUNT(DISTINCT `site__deployed`) AS num_of_Site_per_week
        FROM `battery_add`
        where `deleted_at` = NULL
         GROUP BY Week(install_date,2);


        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::
        Schema::dropIfExists('batteries_week_count_chart');
        // Schema::dropView('batteries_progress_chart');
    }
}
