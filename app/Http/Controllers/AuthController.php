<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($request->password);

        $user = User::create($validated);

        $success['token'] = $user->createToken('authToken')->accessToken;
        $success['name'] = $user->name;
        return response()->json(['success' => $success]);
    }

    public function login(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($validator)) {
            return response()->json(['error' => 'Unauthorised'], 401);
        } else {
            $success['token'] = auth()->user()->createToken('authToken')->plainTextToken;
            $success['user'] = auth()->user();
            $success['expiration_token'] = Carbon::now()->addMinutes(60)->toDateTimeString();
            $success['expiration'] = config('sanctum.expiration');

            return response()->json(['success' => $success])->setStatusCode(200);
        }
    }
}
