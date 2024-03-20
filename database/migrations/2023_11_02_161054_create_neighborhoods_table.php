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
        Schema::create('neighborhoods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id');
            $table->string('slug', 255);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->json('polygon')->nullable();
            $table->integer('offers')->nullable();
            $table->decimal('min_price', 15, 2)->nullable();
            $table->string('image')->nullable();
            $table->json('common_video')->nullable();
            $table->json('media')->nullable();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->index('city_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neighborhoods');
    }
};
