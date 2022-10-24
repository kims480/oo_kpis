<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatteryAddTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battery_add', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('site__deployed');
            $table->unsignedBigInteger('added_by');
            $table->integer('shelter_num')->default(1);
            $table->char('ref_wo',30)->nullable();
            $table->char('ref_cr',30)->nullable();
            $table->char('batter_1_sn',40);
            $table->integer('num_of_rect')->default(1);
            $table->integer('rect_num')->default(1);
            $table->integer('bank_num')->default(1);
            $table->date('install_date')->default(Carbon::now());
            $table->smallInteger('aircon_status')->default(1);
            $table->smallInteger('rect_charge_status')->default(1);
            $table->integer('old_batteries_aging')->default(5);
            $table->float('llvd')->default(46.4);
            $table->float('blvd')->default(43.2);
            $table->softDeletes();
            $table->foreign('site__deployed')->references('id')->on('sites');
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
        Schema::drop('battery_add');
    }
}
