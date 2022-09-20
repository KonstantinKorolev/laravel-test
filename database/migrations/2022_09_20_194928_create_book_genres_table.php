<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('genre_id');

            $table->index('book_id', 'post_genre_book_idx');
            $table->index('genre_id', 'post_book_genre_idx');

            $table->foreign('book_id', 'post_genre_book_fk')->on('books')->references('id');
            $table->foreign('genre_id', 'post_book_genre_fk')->on('genres')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_genres');
    }
};
