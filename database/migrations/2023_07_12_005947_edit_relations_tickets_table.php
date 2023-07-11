<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditRelationsTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {

            $table->integer('categ')->unsigned()->change();
            $table->integer('contractor')->unsigned()->change();
            $table->integer('scope')->unsigned()->change();
            $table->integer('alarm_name')->unsigned()->change();
            $table->foreign('categ')->references('id')->on('otc_categs');
            $table->foreign('contractor')->references('id')->on('contractors');
            $table->foreign('scope')->references('id')->on('otc_scopes');
            $table->foreign('alarm_name')->references('id')->on('otc_alarms');


        });
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
