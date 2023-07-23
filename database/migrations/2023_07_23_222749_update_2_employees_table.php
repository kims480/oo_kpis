<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update2EmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {

            // $table->char('first_name', 50)->change();
            // $table->char('mid_name', 50)->nullable()->change();
            // $table->char('last_name', 50)->nullable()->change();
            // $table->char('email', 100)->nullable()->change();
            // $table->char('phone', 25)->nullable()->change();
            // $table->char('password', 255)->nullable()->change();
            // $table->char('civil_id', 50)->index()->change();
            // $table->char('hr_code', 50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
