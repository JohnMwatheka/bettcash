<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BettingMarket extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', 'market_name', 'description', 'odds'
    ];
    // Define relationships if needed (e.g., betting events, bets)
}

