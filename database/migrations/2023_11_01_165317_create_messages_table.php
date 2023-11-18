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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('form', 255)->nullable();
            $table->string('lang', 20)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('phone', 20);
            $table->string('communicate');
            $table->string('email')->nullable();
            $table->string('message')->nullable();
            $table->binary('ip')->nullable();
            $table->tinyInteger('spam')->nullable();
            $table->json('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
