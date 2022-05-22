<?php

namespace App\Actions\Films;

use App\Contracts\Actions\FilmsUpdateActionContract;
use App\Http\Resources\FilmsResource;
use App\Models\Film;

class FilmsUpdateAction implements FilmsUpdateActionContract
{
    /**
     * @param Film $film
     * @param array $data
     * @return FilmsResource
     */
    public function __invoke(Film $film, array $data): FilmsResource
    {
        $this->updateGame($film, $data);
        $this->createGenreRelations($film, $data['actors'] ?? []);

        return new FilmsResource($film);
    }

    /**
     * @param Film $film
     * @param array $data
     * @return void
     */
    private function updateGame(Film $film, array $data): void
    {
        $film->update($data);
    }

    /**
     * @param Film $film
     * @param array $actors
     * @return void
     */
    private function createGenreRelations(Film $film, array $actors): void
    {
        $film->actors()->sync($actors);
    }
}
