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
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255);
            $table->string('date_of_creation', 255)->nullable();
            $table->smallInteger('completed_objects')->nullable();
            $table->smallInteger('total_objects')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('min_price', 15, 2)->nullable();
            $table->string('image')->nullable();
            $table->json('common_video')->nullable();
            $table->json('media')->nullable();
            $table->text('rank')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};
