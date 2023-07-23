<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCol2ToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            //  $table->char('first_name',50)->change();
            // $table->char('mid_name',50)->nullable()->change();
            // $table->char('last_name',50)->nullable()->change();
            // $table->char('email',100)->nullable()->change();
            // $table->char('phone',25)->nullable()->change();
            // $table->char('password',255)->nullable()->change();
            // $table->char('civil_id',50)->index()->change();
            // $table->char('hr_code',50)->nullable()->change();
            $table->text('first_name')->change();
            $table->text('mid_name')->nullable()->change();
            $table->text('last_name')->nullable()->change();
            $table->text('email')->nullable()->change();
            $table->text('phone')->nullable()->change();
            $table->text('password')->nullable()->change();
            $table->text('civil_id')->index()->change();
            $table->text('hr_code')->nullable()->change();

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
