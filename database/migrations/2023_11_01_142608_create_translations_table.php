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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('translatable_type');
            $table->unsignedBigInteger('translatable_id');
            $table->string('column_name')->nullable();
            $table->string('locale', 10)->nullable();
            $table->text('value')->nullable();
            $table->json('media')->nullable();

            // You might want to index these columns for faster querying
            $table->index(['translatable_type', 'translatable_id', 'column_name', 'locale'], 'translations_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
