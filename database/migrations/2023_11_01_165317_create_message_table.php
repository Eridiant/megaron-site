<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->string('form', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('phone', 20);
            $table->string('communicate');
            $table->string('email')->nullable();
            $table->string('message')->nullable();
            $table->binary('ip');
            $table->tinyInteger('spam')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
