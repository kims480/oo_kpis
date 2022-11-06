<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassiveSparesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passive_spares', function (Blueprint $table) {
            $table->increments('id');
            $table->char('old_bom')->nullable();
            $table->char('new_bom')->nullable();
            $table->string('description')->nullable();
            $table->text('uom')->default('PCs');
            $table->smallInteger('Important')->default(0);
            $table->smallInteger('high_consumption')->default(0);
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
        Schema::disableForeignKeyConstraints();
        // Schema::drop('oauth_access_tokens');
        Schema::drop('passive_spares');
        //...
        Schema::enableForeignKeyConstraints();
    }
}
