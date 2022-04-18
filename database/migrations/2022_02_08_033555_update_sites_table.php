<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // if (Schema::hasColumn('sites', 'govern'))
        // {
        //     Schema::table('sites', function (Blueprint $table)
        //     {
        //         $table->dropColumn('govern');
        //     });
        // }
        // if (Schema::hasColumn('sites', 'wilayat'))
        // {
        //     Schema::table('sites', function (Blueprint $table)
        //     {
        //         $table->dropColumn('wilayat');
        //     });
        // }
        // if (Schema::hasColumn('sites', 'office'))
        // {
        //     Schema::table('sites', function (Blueprint $table)
        //     {
        //         $table->dropColumn('office');
        //     });
        // }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
