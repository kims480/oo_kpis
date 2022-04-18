<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categs', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name')->index();
            $table->integer('main_categ_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('main_categ_id')->references('id')->on('main_categs')->onDelete('SET NULL')->onUpdate('SET NULL');

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
        // if (Schema::hasColumn('sub_categs', 'main_categ_id')) {
        //         Schema::table('sub_categs', function (Blueprint $table) {
        //             $table->dropForeign('sub_categs_main_categ_id_foreign');

        //             // $table->dropColumn('region_id');
        //         });
        //     }
        Schema::dropIfExists('sub_categs');
        // Schema::enableForeignKeyConstraints();

    }
}
