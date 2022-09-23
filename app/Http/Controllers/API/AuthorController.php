<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Book::all();
        return $this->sendResponse($books, 200);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $author
     * @return \Illuminate\Http\Response
     */
    public function show(User $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(User $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $author)
    {
        $input = $request->all();

        $authAuthorId = Auth::user()->id;
        $authorId = $author->id;

        if (intval($authAuthorId) == intval($authorId)) {
            $validator = Validator::make($input, [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error', $validator->errors());
            }
            $author->name = $input['name'];
            $author->email = $input['email'];
            $author->password = $input['password'];
            $author->save();

            return $this->sendResponse($author->toArray(), 'Author updated successfully');
        }

        return $this->sendError("Error", 'You cannot change the data of other authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $author)
    {
        //
    }
}
