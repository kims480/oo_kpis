<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditeConsumbaleSparesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consumable_spares', function (Blueprint $table) {
            $table->float('muscat_stk')->default(0)->nullable()->after('high_consumption');
            $table->float('sll_stk')->default(0)->nullable();
            $table->float('shr_stk')->default(0)->nullable();
            $table->float('nzw_stk')->default(0)->nullable();
            $table->float('adm_stk')->default(0)->nullable();
            $table->float('ibri_stk')->default(0)->nullable();
            $table->float('haima_stk')->default(0)->nullable();
            $table->float('dqm_stk')->default(0)->nullable();
            $table->float('sur_stk')->default(0)->nullable();
            $table->float('ibra_stk')->default(0)->nullable();
            $table->float('swq_stk')->default(0)->nullable();
            $table->float('khasab_stk')->default(0)->nullable();
            $table->float('total_stk')->default(0)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consumable_spares', function (Blueprint $table) {
            //
        });
    }
}
