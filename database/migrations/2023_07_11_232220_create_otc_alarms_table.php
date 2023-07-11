<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtcAlarmsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otc_alarms', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->bigInteger('add_by')->unsigned();
            $table->text('details')->nullable();
            $table->integer('categ_id')->unsigned();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('add_by')->references('id')->on('users');
            $table->foreign('categ_id')->references('id')->on('otc_categs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('otc_alarms');
    }
}
