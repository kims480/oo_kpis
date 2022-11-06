<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSnagsPassiveSparesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_snag_passive_spare', function (Blueprint $table) {

            $table->integer('site_snag_id')->unsigned();
            $table->integer('passive_spare_id')->unsigned();
            $table->foreign('site_snag_id')->references('id')->on('site_snags')
                ->onDelete('cascade');

            $table->foreign('passive_spare_id')->references('id')->on('passive_spares')
                ->onDelete('cascade');
            $table->timestamps();
            $table->integer('qty')->default(1);
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
                Schema::dropIfExists('site_snag_passive_spare');
        Schema::enableForeignKeyConstraints();
    }
}
