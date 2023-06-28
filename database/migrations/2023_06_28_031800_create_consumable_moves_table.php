<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumableMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_moves', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('site_id')->nullable();
            $table->char('wo',35)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();


            $table->foreign('user_id')->references('id')->on('users')

                ->onDelete('SET NULL');

            $table->foreign('site_id')->references('id')->on('offices')

                ->onDelete('SET NULL');

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
        Schema::dropIfExists('consumable_moves');
    }
}
