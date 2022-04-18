<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSiteSnagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_snags', function (Blueprint $table) {
            $table->date('report_date')->nullable();
            $table->integer('domain_id')->unsigned()->nullable();
            $table->integer('snag_remark_id')->unsigned()->nullable();
            $table->integer('snag_reported_id')->unsigned()->nullable();
            $table->timestamp('closure_date')->nullable();
            $table->integer('snagstatus_id')->unsigned()->nullable();
            $table->unsignedBigInteger('snag_closed_by')->nullable();
            $table->char('remarks')->nullable();
            $table->foreign('domain_id')->references('id')->on('snagdomains')->onDelete('SET NULL');
            $table->foreign('snag_closed_by')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('snag_reported_id')->references('id')->on('snag_reporters')->onDelete('SET NULL');
            $table->foreign('snagstatus_id')->references('id')->on('snagstatuss')->onDelete('SET NULL');
            $table->foreign('snag_remark_id')->references('id')->on('snag_remarks')->onDelete('SET NULL');
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
        if (Schema::hasColumn('site_snags', 'domain_id'))
        {
            Schema::table('site_snags', function (Blueprint $table)
            {
                $table->dropForeign('site_snags_domain_id_foreign');
                $table->dropColumn('domain_id');

            });
        }
        if (Schema::hasColumn('site_snags', 'snag_closed_by'))
        {
            Schema::table('site_snags', function (Blueprint $table)
            {
                $table->dropForeign('site_snags_snag_closed_by_foreign');
                $table->dropColumn('snag_closed_by');

            });
        }
        if (Schema::hasColumn('site_snags', 'snag_reported_id'))
        {
            Schema::table('site_snags', function (Blueprint $table)
            {
                $table->dropForeign('site_snags_snag_reported_id_foreign');
                $table->dropColumn('snag_reported_id');

            });
        }
        if (Schema::hasColumn('site_snags', 'snagstatus_id'))
        {
            Schema::table('site_snags', function (Blueprint $table)
            {
                $table->dropForeign('site_snags_snagstatus_id_foreign');
                $table->dropColumn('snagstatus_id');

            });
        }
        if (Schema::hasColumn('site_snags', 'snag_remark_id'))
        {
            Schema::table('site_snags', function (Blueprint $table)
            {
                $table->dropForeign('site_snags_snag_remark_id_foreign');
                $table->dropColumn('snag_remark_id');

            });
        }
        Schema::drop('site_snags');
    }
}
