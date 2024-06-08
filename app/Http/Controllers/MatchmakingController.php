<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class MatchmakingController extends Controller
{

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'skill_level' => 'nullable|in:Beginner,Intermediate,Advanced,Professional',
            'gender' => 'nullable',
            'location' => 'nullable',
        ]);

        $matchesQuery = User::query()
            ->where('users.id', '<>', auth()->user()->id)
            ->where('availability', true)
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_id', '<>', 1);

        if (!$request->has('skill_level') && !$request->has('gender') && !$request->has('location')) {
            $matchesQuery
                ->where('skill_level', auth()->user()->skill_level)
                ->where('gender', auth()->user()->gender)
                ->where('city', auth()->user()->city);
        } else {
            if ($request->has('skill_level')) {
                $matchesQuery->where('skill_level', $request->input('skill_level'));
            }
            if ($request->has('gender')) {
                $matchesQuery->where('gender', $request->input('gender'));
            }
            if ($request->has('location')) {
                $matchesQuery->where('city', $request->input('location'));
            }
        }

        $matches = $matchesQuery->paginate(15);

        return response()->json($matches);
    }
}
