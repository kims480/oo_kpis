<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->char('first_name');
            $table->char('mid_name');
            $table->char('last_name');
            $table->char('email');
            $table->char('phone');
            $table->char('password');
            $table->char('civil_id');
            $table->char('hr_code');
            $table->char('project_id');
            $table->char('designation_id');
            $table->char('office_id');
            $table->char('title_id');
            $table->char('gender');
            $table->char('dept_id');
            $table->char('hiring_date');
            $table->char('salary');
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
        Schema::dropIfExists('employees');
    }
}
