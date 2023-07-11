<?php

namespace App\Http\Controllers;

use App\Http\Requests\StormRequest;
use App\Http\Resources\StormResource;
use App\Models\Storm;

class StormController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Storm::class);

        return StormResource::collection(Storm::all());
    }

    public function store(StormRequest $request)
    {
        $this->authorize('create', Storm::class);

        return new StormResource(Storm::create($request->validated()));
    }public function create()
    {
        $this->authorize('create', Storm::class);

        return view('storms.create');
    }

    public function show(Storm $storm)
    {
        $this->authorize('view', $storm);

        return new StormResource($storm);
    }

    public function update(StormRequest $request, Storm $storm)
    {
        $this->authorize('update', $storm);

        $storm->update($request->validated());

        return new StormResource($storm);
    }

    public function destroy(Storm $storm)
    {
        $this->authorize('delete', $storm);

        $storm->delete();

        return response()->json();
    }
}
