<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumableSpareConsumableMoveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_spare_consumable_move', function (Blueprint $table) {


                $table->unsignedBigInteger('consumable_spare_id')->nullable();

                $table->unsignedBigInteger('consumable_move_id')->nullable();

                $table->unsignedInteger('quantity');

                $table->foreign('consumable_spare_id')->references('id')->on('consumable_spares')

                    ->onDelete('CASCADE');

                $table->foreign('consumable_move_id')->references('id')->on('consumable_moves')

                    ->onDelete('CASCADE');

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
        Schema::dropIfExists('consumable_spare_consumable_move');
    }
}
