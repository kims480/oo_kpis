<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->char('site_id')->index();
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
            $table->char('nis')->nullable();
            $table->tinyInteger('prio')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->tinyInteger('categ')->nullable();

            $table->text('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::drop('sites');
    }
}
