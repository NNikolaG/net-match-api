<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestForMatchRequest;
use App\Http\Resources\MatchRequestResource;
use App\Models\RequestForMatch;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class MatchRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = RequestForMatch::query();
        return MatchRequestResource::collection(paginate_query($query));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestForMatchRequest $requestForMatchRequest)
    {
        $requestForMatchRequest->validated();
        $request = RequestForMatch::create($requestForMatchRequest->validated());

//        SEND NOTIFICATION TO CHALLENGED USER
//        $challenged = $request->challenged_id;

        if (!$request) {
            return response()->json(['error' => 'Failed to create new request for match'], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        } else {
            return response()->json($request, ResponseAlias::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
