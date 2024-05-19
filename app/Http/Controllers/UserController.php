<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::query();
        return UserResource::collection(paginate_query($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json();
    }

    public function updateRoles(Request $request, User $user)
    {
        // validate the request first
        $this->validate($request, [
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        // then use sync() method to update the roles
        $user->roles()->sync($request->roles);

        return response()->json(['message' => 'User roles updated']);
    }
}
