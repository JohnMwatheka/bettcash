<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multibet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_odds', 'stake', 'potential_payout'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Bets (many-to-many)
    public function bets()
    {
        return $this->belongsToMany(Bet::class, 'multibet_bets', 'multibet_id', 'bet_id');
    }

    // Relationship with Betting Markets (many-to-many)
    public function markets()
    {
        return $this->belongsToMany(BettingMarket::class, 'multibet_markets', 'multibet_id', 'betting_market_id');
    }
}