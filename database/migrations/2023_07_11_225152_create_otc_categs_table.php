<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtcCategsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otc_categs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->bigInteger('add_by')->unsigned();
            $table->text('details');
            $table->text('notes');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('add_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('otc_categs');
    }
}
