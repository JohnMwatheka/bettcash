<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('betting_markets', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // e.g., Match Result, Goals, Cards
            $table->string('market_name')->unique(); // Ensure unique market names
            $table->string('short_name')->unique(); // Standardized short name
            $table->text('description')->nullable(); // Optional description
            $table->decimal('odds', 6, 2); // Increased precision for odds
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('betting_markets');
    }
};
