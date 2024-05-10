<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\BookCollection;
use App\Http\Resources\Api\V1\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return new BookCollection(Book::all());
    }

    public function show(Request $request, Book $book)
    {
        return new BookResource($book);
    }
}
