<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForiegnKeyToSnagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('snags', function (Blueprint $table) {
        //     //
        //     // $table->foreign('main_categ_id')->references('id')->on('main_categs');
        //     // $table->foreign('sub_categ_id')->references('id')->on('sub_categs');
        //     // $table->foreign('snag_reported_by')->references('id')->on('users');

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('snags', function (Blueprint $table) {
        //     //
        //     // $table->dropForeign('snags_main_categ_id_foreign');
        //     // $table->dropForeign('snags_sub_categ_id_foreign');
        //     // $table->dropForeign('snags_snag_reported_by_foreign');

        // });
    }
}
