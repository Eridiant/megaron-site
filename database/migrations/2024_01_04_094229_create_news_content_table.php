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
        Schema::create('news_content', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id');
            $table->string('lang', 20)->nullable();
            $table->text('content')->nullable();
            $table->string('text_type', 20)->nullable();
            $table->string('media_type', 20)->nullable();
            $table->json('image')->nullable();
            $table->json('gallery')->nullable();
            $table->json('video')->nullable();
            $table->enum('type', ['image', 'video', 'gallery'])->nullable();

            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');

            $table->index('news_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_content');
    }
};
