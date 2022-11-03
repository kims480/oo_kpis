<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewBatteryWeekCountChartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW batteries_progress_chart
        AS
        SELECT `week`, SUM(`num_of_Site_per_week`) Over (order by week) AS battery_total_progress
        FROM `batteries_week_count_chart`
        where `deleted_at` = NULL;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batteries_progress_chart');
    }
}
