<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\CourtRequest;
use App\Http\Resources\Settings\CourtResource;
use App\Models\Court;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Court::query();
        return CourtResource::collection(paginate_query($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourtRequest $request)
    {
        return new CourtResource(Court::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Court $court)
    {
        return new CourtResource($court);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourtRequest $request, Court $court)
    {
        $court->update($request->validated());

        return new CourtResource($court);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Court $court)
    {
        $court->delete();
        return response()->json();
    }
}
