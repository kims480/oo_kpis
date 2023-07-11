<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtcScopesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otc_scopes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('details');
            $table->bigInteger('add_by')->unsigned();
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
        Schema::drop('otc_scopes');
    }
}
