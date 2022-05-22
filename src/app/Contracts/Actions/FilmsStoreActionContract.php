<?php

namespace App\Contracts\Actions;

use App\Http\Resources\FilmsResource;

interface FilmsStoreActionContract
{
    public function __invoke(array $data): FilmsResource;
}
