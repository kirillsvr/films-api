<?php

namespace App\Contracts\Actions;

use App\Http\Resources\FilmsCollection;

interface FilmsIndexActionContract
{
    public function __invoke(array $data): FilmsCollection;
}
