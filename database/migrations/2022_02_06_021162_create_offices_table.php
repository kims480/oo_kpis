<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 25);
            $table->char('New Office', 25)->nullable();
            // $table->unsignedInteger('region_id')->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('SET NULL')->onUpdate('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('offices', 'region_id'))
        {
            Schema::table('offices', function (Blueprint $table)
            {

                $table->dropForeign('offices_region_id_foreign');
                // $table->dropForeign('posts_user_id_foreign');
                // $table->dropColumn('region_id');
            });
        }
        if (Schema::hasColumn('sites', 'office_id'))
        {
            Schema::table('sites', function (Blueprint $table)
            {

                $table->dropForeign('sites_office_id_foreign');
                // $table->dropForeign('posts_user_id_foreign');
                // $table->dropColumn('region_id');
            });
        }
        Schema::dropIfExists('offices');
    }
}
