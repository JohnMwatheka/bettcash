<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Table for multibets
        Schema::create('multibets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->decimal('total_odds', 8, 2);
            $table->decimal('stake', 10, 2)->nullable();
            $table->decimal('potential_payout', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Pivot table for multibets and bets
        Schema::create('multibet_bets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('multibet_id')->index();
            $table->unsignedBigInteger('bet_id')->index();
            $table->timestamps();

            $table->foreign('multibet_id')->references('id')->on('multibets')->onDelete('cascade');
            $table->foreign('bet_id')->references('id')->on('bets')->onDelete('cascade');
        });

        // Pivot table for multibets and betting markets
        Schema::create('multibet_markets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('multibet_id')->index();
            $table->unsignedBigInteger('betting_market_id')->index();
            $table->timestamps();

            $table->foreign('multibet_id')->references('id')->on('multibets')->onDelete('cascade');
            $table->foreign('betting_market_id')->references('id')->on('betting_markets')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Drop tables in reverse order
        Schema::dropIfExists('multibet_markets');
        Schema::dropIfExists('multibet_bets');
        Schema::dropIfExists('multibets');
    }
};