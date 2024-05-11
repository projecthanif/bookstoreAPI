<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Requests\V1\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new UserCollection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $storeUserRequest)
    {
        $validated = $storeUserRequest->validated();

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return new JsonResponse(new UserResource($user), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $updateUserRequest, User $user)
    {
        $validatedUpdate = $updateUserRequest->validated();

        $response = $user->update($validatedUpdate);

        if ($response) {
            return json_encode(response('upated successfully'));
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = $user->delete();

        return new JsonResponse($user, 200);
    }
}
