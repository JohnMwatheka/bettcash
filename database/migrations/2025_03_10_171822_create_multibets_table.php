<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('multibets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->decimal('total_odds', 8, 2);
            $table->decimal('stake', 10, 2)->nullable();
            $table->decimal('potential_payout', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('multibet_bets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('multibet_id')->index();
            $table->unsignedBigInteger('bet_id')->index();
            $table->timestamps();

            $table->foreign('multibet_id')->references('id')->on('multibets')->onDelete('cascade');
            $table->foreign('bet_id')->references('id')->on('bets')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('multibet_bets');
        Schema::dropIfExists('multibets');
    }
};
