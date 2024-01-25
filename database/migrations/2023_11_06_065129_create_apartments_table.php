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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255);
            $table->foreignId('complex_id');
            $table->tinyInteger('number_of_rooms')->nullable();
            $table->tinyInteger('number_of_bedrooms')->nullable();
            $table->tinyInteger('number_of_bathrooms')->nullable();
            $table->decimal('cost', 15, 2)->nullable();
            $table->decimal('total_area', 10, 2)->nullable();
            $table->decimal('living_area', 10, 2)->nullable();
            $table->tinyInteger('property_type')->default(1);
            $table->string('type', 255);
            $table->json('image')->nullable();
            $table->json('common_video')->nullable();
            $table->json('media')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->decimal('rank', 2, 1)->nullable();

            $table->foreign('complex_id')->references('id')->on('complexes')->onDelete('cascade');

            $table->index('complex_id');
            $table->index('property_type');
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
