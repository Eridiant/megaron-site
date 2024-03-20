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
        Schema::create('complexes', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255);
            $table->timestamp('delivery_date')->nullable();
            $table->foreignId('city_id');
            $table->foreignId('developer_id');
            $table->foreignId('neighborhood_id')->nullable();
            $table->json('types');
            $table->json('number_of_rooms')->nullable();
            $table->string('image')->nullable();
            $table->json('common_video')->nullable();
            $table->json('media')->nullable();
            $table->decimal('min_price', 15, 2)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->decimal('rank', 2, 1)->nullable();

            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')->onDelete('cascade');
            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->index('neighborhood_id');
            $table->index('developer_id');
            $table->index('city_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complexes');
    }
};
