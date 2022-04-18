<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSnagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('snags', function (Blueprint $table) {
        //     $table->id();
        //     //
        //     //sn REPORT DATE	SITEID		SNAGS	MAIN_CATEGORY	SUB CATEGORY	STATUS	Closure Date	Snag Reported By	Domain	Remarks
        //     $table->integer('sn')->index()->unique();
        //     $table->date('reporting_date')->useCurrent();//Carbon::now()->format('d-m-Y'));
        //     $table->unsignedBigInteger('site_id')->index();
        //     $table->char('snag')->nullable();
        //     $table->integer('main_categ_id')->unsigned()->nullable();
        //     $table->integer('sub_categ_id')->unsigned()->nullable();
        //     $table->tinyInteger('status')->default(0);
        //     $table->unsignedBigInteger('snag_reported_by');
        //     $table->integer('snag_domain_id')->unsigned()->nullable();
        //     $table->char('remarks')->nullable();

        //     $table->timestamp('closure_date')->nullable();
        //     $table->timestamps();
        //     $table->softDeletes();
        //     // $table->foreign('user_id')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('snags');
    }
}
