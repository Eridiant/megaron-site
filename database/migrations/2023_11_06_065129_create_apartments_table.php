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
            $table->unsignedBigInteger('complex_id');
            $table->integer('number_of_rooms');
            $table->decimal('cost', 15, 2);
            $table->decimal('area', 10, 2);
            $table->string('status', 50)->default('available');

            $table->foreign('complex_id')->references('id')->on('complexes')->onDelete('cascade');

            $table->index('complex_id');
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
