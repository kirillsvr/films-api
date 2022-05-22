<?php

namespace App\Contracts\Actions;

use App\Http\Resources\FilmsResource;
use App\Models\Film;

interface FilmsUpdateActionContract
{
    public function __invoke(Film $film, array $data): FilmsResource;
}
