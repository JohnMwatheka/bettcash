<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'user_phone',
        'home_team',
        'away_team',
        'match_date',
        'match_time',
        'odds',
    ];
}
