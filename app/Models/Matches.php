<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    protected $table = 'matches'; // Explicitly define table name

    protected $fillable = [
        'match_id',
        'league_id',
        'date',
        'is_finished',
        'home_team_id',
        'home_team_name',
        'home_team_image',
        'away_team_id',
        'away_team_name',
        'away_team_image',
        'stadium',
        'odds_home_win',   // ✅ Add odds fields
        'odds_draw',
        'odds_away_win',
    ];
}
