<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function genre()
    {
        return $this->belongsToMany(Genre::class, 'book_genres', 'book_id', 'genre_id');
    }
}
