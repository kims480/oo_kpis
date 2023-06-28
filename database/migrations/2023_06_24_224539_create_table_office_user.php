<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOfficeUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_user', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id')->nullable();

            $table->unsignedInteger('office_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')

                ->onDelete('CASCADE');

            $table->foreign('office_id')->references('id')->on('offices')

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
        Schema::dropIfExists('office_user');
    }
}
