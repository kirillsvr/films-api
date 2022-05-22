<?php

namespace App\Actions\Films;

use App\Contracts\Actions\FilmsStoreActionContract;
use App\Http\Resources\FilmsResource;
use App\Models\Film;

class FilmsStoreAction implements FilmsStoreActionContract
{
    /**
     * @param array $data
     * @return FilmsResource
     */
    public function __invoke(array $data): FilmsResource
    {
        $film = $this->createFilm($data);
        $this->createActorsRelations($data['actors'], $film);

        return new FilmsResource($film);
    }

    /**
     * @param array $data
     * @return Film
     */
    private function createFilm(array $data): Film
    {
        return Film::create($data);
    }

    /**
     * @param array $actors
     * @param Film $film
     * @return void
     */
    private function createActorsRelations(array $actors, Film $film): void
    {
        $film->actors()->sync($actors);
    }
}
