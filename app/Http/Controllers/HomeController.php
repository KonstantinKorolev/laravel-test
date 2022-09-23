<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends BaseController
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        $books = Book::get();
        $property = $request->all();
        $result = array();
        if (isset($property['count_books'])) {
            if (isset($property['author_name'])) {
                $count = 0;
                foreach ($books as $book) {
                    if ($count != intval($property['count_books'])) {
                        if ($property['author_name'] == $book->author->name) {
                            array_push($result, $book);
                            $count += 1;
                        }
                    }
                }
            }
        }
        if (isset($property['book_genres'])) {
            if (isset($property['author_name'])) {
                $genres = explode(" ", $property['book_genres']);
                foreach ($books as $book) {
                    if ($property['author_name'] == $book->author->name) {
                        foreach ($book->genre as $item) {
                            if (in_array($item->name, $genres)) {
                                array_push($result, $book);
                                break;
                            }
                        }
                    }
                }
            }
        }
        return view('home', compact('result'));
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
