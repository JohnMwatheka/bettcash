<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get leagues for this sport.
     */
    public function leagues()
    {
        return $this->hasMany(League::class);
    }
}
