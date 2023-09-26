<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    protected $fillable= 
    [
        "movieID",
        "actorID"
    ];

    public function movies()
    {
        return $this->belongsTo(Movie::class, 'movieId');
    }

    public function actors()
    {
        return $this->belongsTo(Actor::class,'actorId');
    }

}
