<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultibetBet extends Model
{
    use HasFactory;

    protected $table = 'multibet_bets';

    protected $fillable = ['multibet_id', 'bet_id'];

    public function multibet()
    {
        return $this->belongsTo(Multibet::class);
    }

    public function bet()
    {
        return $this->belongsTo(Bet::class);
    }
}

