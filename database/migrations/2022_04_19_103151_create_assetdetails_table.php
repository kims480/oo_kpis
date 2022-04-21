<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assetdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name');
            $table->char('sn');
            $table->char('expiry_date');
            $table->char('calibration_date');
            $table->char('comment');
            $table->integer('asset_id')->unsigned()->nullable();

            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('SET NULL');

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
        Schema::dropIfExists('assetdetails');
    }
}
