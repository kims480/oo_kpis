<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlkanProjectsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alkan_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->char('project_name',100);
            $table->char('alkan_project_code',100)->nullable();
            $table->char('customer_project_code',100)->nullable();
            $table->string('project_detail')->nullable();
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
        Schema::drop('alkan_projects');
    }
}
