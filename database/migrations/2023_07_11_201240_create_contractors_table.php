<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('info')->nullable();
            $table->text('address')->nullable();
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
            $table->bigInteger('added_by')->unsigned();
            $table->char('register_number')->nullable();
            $table->text('website')->nullable();
            $table->text('phone')->nullable();
            $table->text('fax')->nullable();
            $table->char('info_mail')->nullable();
            $table->char('it_mail')->nullable();
            $table->char('proc_email')->nullable();
            $table->char('operation_mail')->nullable();
            $table->char('admin_mail')->nullable();
            $table->char('ceo_mail')->nullable();
            $table->char('project_manager_mail')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('added_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Contractors');
    }
}
