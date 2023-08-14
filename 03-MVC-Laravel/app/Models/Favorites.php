<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $fillable = [
        'userId',
        'movieId'
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class,'movieId');
    }
}