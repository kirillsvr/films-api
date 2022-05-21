<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre_id',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actors_films', 'film_id', 'actor_id');
    }
}
