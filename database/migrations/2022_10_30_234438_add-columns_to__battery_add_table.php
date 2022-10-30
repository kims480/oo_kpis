<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBatteryAddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('battery_add', function (Blueprint $table) {
            $table->float('Amp_before')->nullable();
            $table->float('volt_before')->nullable();
            $table->float('Volt_after')->nullable();
            $table->float('Amp_After')->nullable();
            $table->integer('capacity_rating')->nullable();
            $table->char('battery_brand',30)->nullable();
            $table->char('Battery_model',30)->nullable();
            $table->text('reamrks')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('battery_add', function (Blueprint $table) {
            //
        });
    }
}
