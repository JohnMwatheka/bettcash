<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multibet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_odds', 'stake', 'potential_payout'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bets()
    {
        return $this->belongsToMany(Bet::class, 'multibet_bets', 'multibet_id', 'bet_id');
    }
}
