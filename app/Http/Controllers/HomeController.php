<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $books = Book::get();
        return view('home', compact('books'));
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
        /*
        $books = Book::get();
        $property = $request->all();
        $result = array();
        if (isset($property['author'])) {
            foreach ($books as $book) {
                if ($property['author'] == $book->author->name) {
                    $genre = $book->genre;
                    array_push($result, $book);
                }
            }
        }
        if (isset($property['bookId'])) {
            foreach ($books as $book) {
                if ($property['bookId'] == $book->id) {
                    $author = $book->author->name;
                    array_push($result, $book);
                }
            }
        }
        if (isset($property['countBooks'])) {
            if (isset($property['authorName'])) {
                $count = 0;
                foreach ($books as $book) {
                    if ($count != intval($property['countBooks'])) {
                        if ($property['authorName'] == $book->author->name) {
                            $genre = $book->genre;
                            array_push($result, $book);
                            $count += 1;
                        }
                    }
                }
            }
        }
        return response()->json($result);
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
