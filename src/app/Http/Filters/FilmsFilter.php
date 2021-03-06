<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class FilmsFilter extends AbstractFilter
{
    public const GENRE = 'genre';
    public const ACTORS = 'actors';
    public const SORT = 'sort';

    protected function getCallbacks(): array
    {
        return [
            self::GENRE => [$this, 'genre'],
            self::ACTORS => [$this, 'actors'],
            self::SORT => [$this, 'sort'],
        ];
    }

    public function genre(Builder $builder, $value)
    {
        $builder->whereIn('genre_id', $value);
    }

    public function actors(Builder $builder, $value)
    {
        $builder->select('films.*')->rightJoin('actors_films', 'films.id', '=', 'actors_films.film_id')->whereIn('actor_id', $value);
    }

    public function sort(Builder $builder, $value)
    {
        $builder->orderBy('name', $value);
    }
}
