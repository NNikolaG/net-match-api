<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestForMatchRequest;
use App\Http\Requests\Settings\MatchRequst;
use App\Http\Resources\Settings\MatchResource;
use App\Models\TennisMatch;
use App\Models\RequestForMatch;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TennisMatch::query();
        return MatchResource::collection(paginate_query($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatchRequst $request)
    {
        return new MatchResource(TennisMatch::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(TennisMatch $matches)
    {
        return new MatchResource($matches);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatchRequst $request, TennisMatch $matches)
    {
        $matches->update($request->validated());

        return new MatchResource($matches);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TennisMatch $match)
    {
        $match->delete();
        return response()->json();
    }

    public function matchRequest(RequestForMatchRequest $requestForMatchRequest): JsonResponse
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

    public function acceptMatch($requestID): JsonResponse
    {
        RequestForMatch::findOrFail($requestID)->update([
            RequestForMatch::STATUS => 'accepted'
        ]);

        $match = TennisMatch::create([
            TennisMatch::MATCH_REQUEST_ID => $requestID,
        ]);

//        SEND NOTIFICATION TO CHALLENGED USER
//        $challenged = $request->challenged_id;

        if (!$match) {
            return response()->json(['message' => 'Failed to accept match.', "status" => 500], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        } else {
            return response()->json(['message' => 'Match accepted, go to negotiations to schedule it.', "status" => 201], ResponseAlias::HTTP_CREATED);
        }
    }

    public function declineMatch($requestID): JsonResponse
    {
        $result = RequestForMatch::findOrFail($requestID)->update([
            RequestForMatch::STATUS => 'declined'
        ]);

//        SEND NOTIFICATION TO CHALLENGED USER
//        $challenged = $request->challenged_id;

        if (!$result) {
            return response()->json(['message' => 'Failed to decline match.', "status" => 500], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        } else {
            return response()->json(['message' => 'Match declined.', "status" => 201], ResponseAlias::HTTP_CREATED);
        }
    }
}
