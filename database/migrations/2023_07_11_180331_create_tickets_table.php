<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->unsigned();
            $table->longText('description')->nullable();
            $table->integer('categ');
            $table->integer('contractor');
            $table->longText('scope')->nullable();
            $table->text('tt_number');
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('site_id')->references('id')->on('sites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
