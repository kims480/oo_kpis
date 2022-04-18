<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnagmangsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snags', function (Blueprint $table) {
            $table->increments('id');


            $table->char('description')->nullable();
            // $table->integer('main_categ_id')->unsigned();
            $table->integer('sub_categ_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('main_categ_id')->references('id')->on('main_categs');
            $table->foreign('sub_categ_id')->references('id')->on('sub_categs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snags');
    }
}
