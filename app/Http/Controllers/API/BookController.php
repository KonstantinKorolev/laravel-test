<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api', ['only' => ['edit', 'update', 'delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index()
    {
        $books = Book::all();

        return $this->sendResponse($books, 'Books retrieved successfully');
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
            if (isset($property['countBooks'])) {
                $count = 0;
                if ($count != intval($property['countBooks'])) {
                    foreach ($books as $book) {
                        if ($property['author'] == $book->author->name) {
                            array_push($result, $book);
                            $count += 1;
                        }
                    }
                }
            } elseif (!isset($property['countBooks'])) {
                foreach ($books as $book) {
                    if ($property['author'] == $book->author->name) {
                        array_push($result, $book);
                    }
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Book $book)
    {
        $input = $request->all();

        $authorId = Auth::user()->id;
        $bookAuthorId = $book->author_id;

        if (intval($authorId) == intval($bookAuthorId)) {
            $validator = Validator::make($input, [
                'title' => 'required'
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error', $validator->errors());
            }
            $book->title = $input['title'];
            $book->save();

            return $this->sendResponse($book->toArray(), 'Book updated successfully');
        }

        return $this->sendError($book->toArray(), 'You are not the author of this book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return $this->sendResponse($book->toArray(), 'Product deleted successfullt');
    }
}
