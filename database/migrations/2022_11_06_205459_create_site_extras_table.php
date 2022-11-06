<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteExtrasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_extras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site__id')->unsigned();
            $table->bigInteger('added_by')->unsigned();
            $table->char('contract_prio');
            $table->char('prio_2022');
            $table->char('contract_severity');
            $table->char('severity_2022');
            $table->integer('connected_sites');
            $table->integer('connected_omc');
            $table->integer('connected_ip');
            $table->integer('connected_sdh');
            $table->char('landlord_owner');
            $table->softDeletes();
            $table->foreign('site__id')->references('id')->on('sites');
            $table->foreign('added_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('site_extras');
    }
}
