<?php
namespace App\Actions\Films;

use App\Contracts\Actions\FilmsIndexActionContract;
use App\Http\Filters\FilmsFilter;
use App\Http\Resources\FilmsCollection;
use App\Models\Film;
use Illuminate\Database\Eloquent\Collection;

class FilmsIndexAction implements FilmsIndexActionContract
{
    /**
     * @param array $data
     * @return FilmsCollection
     */
    public function __invoke(array $data): FilmsCollection
    {
        return new FilmsCollection($this->getFilteredFilms($data));
    }

    /**
     * @param array $data
     * @return Collection
     */
    private function getFilteredFilms(array $data): Collection
    {
        return Film::filter($this->makeFilter($data))->with('actors', 'genre')->get();
    }

    /**
     * @param array $data
     * @return FilmsFilter
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function makeFilter(array $data): FilmsFilter
    {
        return app()->make(FilmsFilter::class, ['queryParams' => array_filter($data)]);
    }
}
