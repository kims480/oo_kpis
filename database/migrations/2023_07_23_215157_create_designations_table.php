<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name',100);
            $table->char('details',255)->nullable();
            $table->bigInteger('create_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('create_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('designations');
    }
}
