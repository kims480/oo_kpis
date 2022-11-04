<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('site__id');
            $table->foreign('site__id')->references('id')->on('sites');
            $table->char('contract_prio',50);
            $table->char('2020_prio',50);
            $table->char('contract_severity',50);
            $table->char('2022_severity',50);
            $table->integer('connected_sites');
            $table->integer('connected_omc');
            $table->integer('connected_ip');
            $table->integer('connected_sdh');
            $table->char('landlord_owner',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites_details');
    }
}
