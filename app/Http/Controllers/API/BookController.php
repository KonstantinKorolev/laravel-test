<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Symfony\Component\HttpKernel\HttpCache\save;

class BookController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Book::all();

        foreach ($books as $book) {
            $book->author_name = $book->author->name;
        }

        return $this->sendResponse($books->toArray(), 'Books retrieved successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $books = Book::all();
        $property = $request->all();
        $result = array();
        // если есть данные об авторе
        if (isset($property['author'])) {
            foreach ($books as $book) {
                if ($property['author'] == $book->author->name) {
                    array_push($result, $book);
                }
            }
        }
        return $this->sendResponse($result, 'Books retrieved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $book = Book::find($id);

        if (is_null($book)) {
            return $this->sendError('Book not fount');
        }

        return $this->sendResponse($book->toArray(), 'Book retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
