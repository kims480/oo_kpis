<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBatterySitePriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW battery_site_prios
        AS
            SELECT site_prios.name as site_prio,COUNT(DISTINCT battery_add.site__deployed) as num_sites
            FROM `battery_add`
            JOIN `sites` on (sites.id=battery_add.site__deployed)
            LEFT JOIN `site_prios` on (site_prios.id=sites.office_id)
            group by site_prios.name;

        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battery_site_prios');
    }
}
