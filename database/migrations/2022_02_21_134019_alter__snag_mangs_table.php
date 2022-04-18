<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSnagMangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('snags', function (Blueprint $table) {
            // $table->integer('snagstatus_id')->unsigned()->nullable();
            // $table->foreign('snagstatus_id')->references('id')->on('snagstatuss');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('snag_mangs', function (Blueprint $table) {
            // if (Schema::hasColumn('snag_mangs', 'snagstatus_id'))
            // {
            //     Schema::table('snag_mangs', function (Blueprint $table)
            //     {
            //         $table->dropForeign('snag_mangs_snagstatus_id_foreign');
            //         $table->dropColumn('snagstatus_id');
            //     });
            // }
        //  });
    }
}
