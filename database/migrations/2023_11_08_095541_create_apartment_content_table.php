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
        Schema::create('apartment_content', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id');
            $table->string('lang', 20)->nullable();
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
            $table->json('video')->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keywords')->nullable();

            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');

            $table->index('apartment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartment_content');
    }
};
