<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\ClubRequest;
use App\Http\Resources\Settings\ClubResource;
use App\Models\Club;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Club::query();
        return ClubResource::collection(paginate_query($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClubRequest $request)
    {
        return new ClubResource(Club::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        return new ClubResource($club);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClubRequest $request, Club $club)
    {
        $club->update($request->validated());

        return new ClubResource($club);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        $club->delete();
        return response()->json();
    }
}
