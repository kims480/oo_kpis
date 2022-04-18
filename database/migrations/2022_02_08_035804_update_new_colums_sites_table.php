<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNewColumsSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function (Blueprint $table) {
            //
            $table->unsignedInteger('govern_id')->nullable();
            $table->unsignedInteger('wilayat_id')->nullable();
            $table->unsignedInteger('office_id')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();

            $table->foreign('govern_id')->references('id')->on('governs')->onDelete('SET NULL')->onUpdate('SET NULL');
            $table->foreign('wilayat_id')->references('id')->on('wilayats')->onDelete('SET NULL')->onUpdate('SET NULL');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('SET NULL')->onUpdate('SET NULL');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('sites', 'govern_id'))
        {
            Schema::table('sites', function (Blueprint $table)
            {
                $table->dropForeign('sites_govern_id_foreign');
                $table->dropColumn('govern_id');
            });
        }
        if (Schema::hasColumn('sites', 'wilayat_id'))
        {
            Schema::table('sites', function (Blueprint $table)
            {
                $table->dropForeign('sites_wilayat_id_foreign');
                $table->dropColumn('wilayat_id');
            });
        }
        if (Schema::hasColumn('sites', 'added_by'))
        {
            Schema::table('sites', function (Blueprint $table)
            {
                $table->dropForeign('sites_added_by_foreign');
                $table->dropColumn('added_by');

            });
        }
        if (Schema::hasColumn('sites', 'offcie_id'))
        {
            Schema::table('sites', function (Blueprint $table)
            {
                $table->dropForeign('sites_office_id_foreign');
                $table->dropColumn('office_id');

            });
        }


    }
}
