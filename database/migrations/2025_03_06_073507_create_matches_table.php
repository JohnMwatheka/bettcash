<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->string('match_id')->primary(); // Match ID as string
            $table->unsignedBigInteger('league_id')->default(1);
            $table->timestamp('date')->nullable();
            $table->boolean('is_finished')->default(0);
            $table->string('home_team_id');
            $table->string('home_team_name');
            $table->string('home_team_image')->nullable();
            $table->string('away_team_id');
            $table->string('away_team_name');
            $table->string('away_team_image')->nullable();
            $table->string('stadium')->nullable();

            // Odds fields (for manual entry)
            $table->decimal('odds_home_win', 5, 2)->nullable()->default(null);
            $table->decimal('odds_draw', 5, 2)->nullable()->default(null);
            $table->decimal('odds_away_win', 5, 2)->nullable()->default(null);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matches');
    }
};

