<?php

use Doctrine\DBAL\Schema\Column;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegionForignkeyToOffices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('offices', function (Blueprint $table) {
            // $table->dropColumn('region_id');
            // $table->unsignedInteger('region_id')->default(1);
            // $table->foreign('region_id')->references('id')->on('regions')->onDelete('SET NULL')->onUpdate('SET NULL');
            // $table->foreignId('region_id')
            //     ->constrained('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // if (Schema::hasColumn('offices', 'region_id')) {
        //     Schema::table('offices', function (Blueprint $table) {
        //         $table->dropForeign('offices_region_id_foreign');

        //         // $table->dropColumn('region_id');
        //     });
        // }
    }
}
