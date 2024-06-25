<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\MatchRequst;
use App\Http\Resources\Settings\MatchResource;
use App\Models\PlayedMatch;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PlayedMatch::query();
        return MatchResource::collection(paginate_query($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatchRequst $request)
    {
        return new MatchResource(PlayedMatch::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(PlayedMatch $match)
    {
        return new MatchResource($match);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatchRequst $request, PlayedMatch $match)
    {
        $match->update($request->validated());

        return new MatchResource($match);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlayedMatch $match)
    {
        $match->delete();
        return response()->json();
    }
}
