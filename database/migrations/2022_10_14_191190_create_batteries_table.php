<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batteries', function (Blueprint $table) {
            $table->id();
            $table->string('battery_sn')->unique();
            $table->char('battery_manufacturer',50)->default("SHOTO");
            $table->char('battery_model',50)->nullable();
            $table->integer('battery_voltage')->default(48);
            $table->integer('battery_rating')->default(190);
            $table->integer('battery_weight')->default(57);
            $table->integer('battery_price')->default(225);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batteries');
    }
}
