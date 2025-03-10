<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'localized_name', 'logo', 'sport_id'];

    /**
     * Get the sport that owns this league.
     * (Only keep this method if you still plan to use the sports table)
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
