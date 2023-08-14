<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    use HasFactory;

    public function mainActor()
    {
        return $this->belongsTo(Actor::class,'mainActorId');
    }
    public function favorite()
    {
        return $this->hasMany(Favorites::class);
    }
}
