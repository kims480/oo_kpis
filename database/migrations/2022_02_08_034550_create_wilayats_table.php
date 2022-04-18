<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayats', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name');
            $table->integer('govern_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('govern_id')->references('id')->on('governs')->onDelete('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wilayats');
    }
}
