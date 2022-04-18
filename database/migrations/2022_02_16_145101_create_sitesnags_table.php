<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSnagsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_snags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->unsigned();
            $table->integer('snag_id')->unsigned();
            $table->softDeletes();
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('CASCADE');
            $table->foreign('snag_id')->references('id')->on('snags')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('site_snags', 'site_id'))
        {
            Schema::table('site_snags', function (Blueprint $table)
            {
                $table->dropForeign('site_snags_site_id_foreign');
                $table->dropColumn('site_id');

            });
        }
        if (Schema::hasColumn('site_snags', 'snag_mangs'))
        {
            Schema::table('site_snags', function (Blueprint $table)
            {
                $table->dropForeign('site_snags_snag_mangs_foreign');
                $table->dropColumn('snag_mangs');

            });
        }

        Schema::dropIfExists('site_snags');
    }
}
// select `site_snags`.`id`,`site_snags`.`site_id`,`site_snags`.`snag_mangs`, `sites`.`site_name`,`governs`.`name` AS `govern_name` ,`wilayats`.`name` AS `wilayat_name`,`offices`.`name` AS `offcie_name`,`site_types`.`name` AS `site_type`,`site_categs`.`name` AS `site_categ`,
// `snag_reporters`.`name` AS `snag_reporter`,  `snagdomains`.`name` AS `snag_domain`,  `snag_remarks`.`remark` AS `snag_remark`,  `snagstatuss`.`name` AS `snag_status`,  `users`.`name` AS `Snag_closed_by`

// from `site_snags`
// LEFT JOIN `sites` ON `sites`.`id`=`site_snags`.`site_id`
// LEFT JOIN `snag_mangs` ON `snag_mangs`.`id`=`site_snags`.`snag_mangs`
// LEFT JOIN `governs` ON `governs`.`id`=`sites`.`govern_id`
// LEFT JOIN `wilayats` ON `wilayats`.`id`=`sites`.`wilayat_id`
// LEFT JOIN `offices` ON `offices`.`id`=`sites`.`office_id`
// LEFT JOIN `site_types` ON `site_types`.`id`=`sites`.`type`
// LEFT JOIN `site_categs` ON `site_categs`.`id`=`sites`.`categ`
// LEFT JOIN `snagstatuss` ON `snagstatuss`.`id`=`site_snags`.`snagstatus_id`
// LEFT JOIN `snagdomains` ON `snagdomains`.`id`=`site_snags`.`domain_id`
// LEFT JOIN `snag_remarks` ON `snag_remarks`.`id`=`site_snags`.`snag_remark_id`
// LEFT JOIN `snag_reporters` ON `snag_reporters`.`id`=`site_snags`.`snag_reported_id`
// LEFT JOIN `users` ON `users`.`id`=`site_snags`.`snag_closed_by`;
