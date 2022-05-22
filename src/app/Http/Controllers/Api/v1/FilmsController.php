<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Filters\FilmsFilter;
use App\Http\Requests\FilmsFilterRequest;
use App\Http\Requests\FilmsStoreRequest;
use App\Http\Requests\FilmsUpdateRequest;
use App\Http\Resources\FilmsCollection;
use App\Http\Resources\FilmsResource;
use App\Models\Film;
use Illuminate\Http\Response;

class FilmsController extends Controller
{
    public function index(FilmsFilterRequest $request)
    {
        $filter = app()->make(FilmsFilter::class, ['queryParams' => array_filter($request->validated())]);
        return new FilmsCollection(Film::filter($filter)->with('actors', 'genre')->get());
    }

    public function store(FilmsStoreRequest $request)
    {
        $film = Film::create($request->validated());
        $film->actors()->sync($request->actors);

        return new FilmsResource($film);
    }

    public function show(int $id)
    {
        return response()->json(['success' => true, 'results' => new FilmsResource(Film::with('actors', 'genre')->findOrFail($id))]);
    }

    public function update(FilmsUpdateRequest $request, Film $film)
    {
        $film->update($request->validated());
        $film->actors()->sync($request->actors ?? []);

        return new FilmsResource($film);
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
