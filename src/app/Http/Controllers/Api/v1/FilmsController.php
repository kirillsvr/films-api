<?php

namespace App\Http\Controllers\Api\v1;

use App\Contracts\Actions\FilmsIndexActionContract;
use App\Contracts\Actions\FilmsStoreActionContract;
use App\Contracts\Actions\FilmsUpdateActionContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilmsFilterRequest;
use App\Http\Requests\FilmsStoreRequest;
use App\Http\Requests\FilmsUpdateRequest;
use App\Http\Resources\FilmsResource;
use App\Models\Film;
use Illuminate\Http\Response;

class FilmsController extends Controller
{
    public function index(FilmsFilterRequest $request, FilmsIndexActionContract $action)
    {
        return $action($request->validated());
    }

    public function store(FilmsStoreRequest $request, FilmsStoreActionContract $action)
    {
        return $action($request->validated());
    }

    public function show(int $id)
    {
        return response()->json(['success' => true, 'results' => new FilmsResource(Film::with('actors', 'genre')->findOrFail($id))]);
    }

    public function update(FilmsUpdateRequest $request, Film $film, FilmsUpdateActionContract $action)
    {
        return $action($film, $request->validated());
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
