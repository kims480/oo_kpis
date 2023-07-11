<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('storms', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('phone_number')->nullable();
            $table->boolean('active')->nullable();
            $table->string('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('storms');
    }
};