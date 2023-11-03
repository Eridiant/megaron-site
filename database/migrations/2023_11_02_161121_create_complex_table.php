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
        Schema::create('complex', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('neighborhood_id');
            $table->string('name', 150);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('neighborhood_id')->references('id')->on('neighborhood')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complex');
    }
};
