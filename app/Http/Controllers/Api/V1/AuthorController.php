<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreAuthorRequest;
use App\Http\Requests\V1\UpdateAuthorRequest;
use App\Http\Resources\Api\V1\AuthorCollection;
use App\Http\Resources\Api\V1\AuthorResource;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        return new AuthorCollection(Author::all());
    }

    public function show(Request $request, Author $author)
    {
        return new AuthorResource($author);
    }

    public function store(StoreAuthorRequest $storeAuthorRequest)
    {
        $validated = $storeAuthorRequest->validated();

        $author = Author::create($validated);

        return new JsonResponse(new AuthorResource($author), 201);
    }

    public function update(UpdateAuthorRequest $updateAuthorRequest, Author $author)
    {
        $valideatedUpdate = $updateAuthorRequest->validated();

        $response = $author->update($valideatedUpdate);

        return new JsonResponse($response, 200);
    }

    public function delete(Author $author)
    {
        $response = $author->delete();

        return new JsonResponse($response, 200);
    }
}
