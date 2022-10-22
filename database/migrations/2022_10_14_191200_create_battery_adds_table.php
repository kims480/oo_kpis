<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatteryAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battery_adds', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('deployed_at_site')->nullable();
            $table->unsignedBigInteger('battery_id')->nullable();
            $table->unsignedBigInteger('deployed_by')->nullable();

            $table->foreign('deployed_at_site')->references('id')->on('sites')->onDelete('SET NULL')->onUpdate('SET NULL');
            $table->foreign('battery_id')->references('id')->on('batteries')->onDelete('SET NULL')->onUpdate('SET NULL');
            $table->foreign('deployed_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('SET NULL');
            $table->tinyInteger("num_of_rectifiers")->default(1);
            $table->tinyInteger("rectifier_num")->default(1);
            $table->tinyInteger("bb_num")->default(1);
            $table->tinyInteger("battery_seq")->default(1);
            $table->dateTime("installation_date")->nullable();
            $table->tinyInteger("aircon_status")->default(1);
            $table->tinyInteger("rectifier_charge_status")->default(1);
            $table->tinyInteger("old_battery_aging")->default(4);
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
        if (Schema::hasColumn('battery_adds', 'deployed_at_site'))
        {
            Schema::table('battery_adds', function (Blueprint $table)
            {
                $table->dropForeign('battery_adds_deployed_at_site_foreign');
                $table->dropColumn('deployed_at_site');

            });
        }
        if (Schema::hasColumn('battery_adds', 'battery_id'))
        {
            Schema::table('battery_adds', function (Blueprint $table)
            {
                $table->dropForeign('battery_adds_battery_id_foreign');
                $table->dropColumn('battery_id');

            });
        }
        if (Schema::hasColumn('battery_adds', 'deployed_by'))
        {
            Schema::table('battery_adds', function (Blueprint $table)
            {
                $table->dropForeign('battery_adds_deployed_by_foreign');
                $table->dropColumn('deployed_by');

            });
        }
        Schema::dropIfExists('battery_adds');
    }
}
