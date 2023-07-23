<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {



            $table->integer('project_id')->unsigned()->nullable()->change();
            $table->integer('designation_id')->unsigned()->nullable()->change();
            $table->integer('office_id')->unsigned()->nullable()->change();
            $table->integer('title_id')->unsigned()->nullable()->change();
            $table->boolean('gender')->default(1)->change();
            $table->integer('dept_id')->unsigned()->nullable()->change();
            $table->date('hiring_date')->nullable()->change();
            $table->integer('salary')->default(30000)->change();

            $table->foreign('project_id')->references('id')->on('alkan_projects');
            $table->foreign('designation_id')->references('id')->on('designations');
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('title_id')->references('id')->on('titles');
            $table->foreign('dept_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
}
