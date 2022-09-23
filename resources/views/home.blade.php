@extends('welcome')

@section('title', 'Books')

@section('content')
<div class="home-btn container">
    <form method="POST" action="{{ route('home.store') }}">
        @csrf
        <div class="wrapper mt-3">
            <a href="{{ route('home.authors') }}" type="button" class="btn btn-primary">Вывести Авторов</a>
            <a href="{{ route('home.genres') }}" type="button" class="btn btn-primary">Вывести жанры</a>
            <a href="{{ route('authors.create') }}" type="button" class="btn btn-success">Создать автора</a>
            <a href="{{ route('genres.create') }}" type="button" class="btn btn-success">Создать жанр</a>
            <a href="{{ route('books.create') }}" type="button" class="btn btn-success">Создать книгу</a>
        </div>
        <div class="author-books input-group mb-3">
            <input type="text" name="author_name" class="form-control"  placeholder="Введите Автора" aria-label="Recipient's username" aria-describedby="button-addon3">
            <input type="text" name="book_genres" class="form-control" placeholder="Введите жанр: Мистика Детектив" aria-label="Recipient's username" aria-describedby="button-addon3">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon3">Найти книгу</button>
        </div>
        <div class="author-books input-group mb-3">
            <input type="text" name="author_name2" class="form-control" placeholder="Введите Автора" aria-label="Recipient's username" aria-describedby="button-addon3">
            <input type="number" name="count_books" class="form-control" placeholder="Введите кол-во книг" aria-label="Recipient's username" aria-describedby="button-addon3">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon3">Найти книги</button>
        </div>
    </form>
    <table class="home-table table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Жанр</th>
            <th scope="col">Автор</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($result))
            @foreach($result as $book)
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->title }}</td>
                    <td>
                        @foreach($book->genre as $genre)
                            {{ $genre->name }}
                        @endforeach
                    </td>
                    <td>{{ $book->author->name }}</td>
                    <td>
                        <form method="POST" action="{{ route('books.delete', $book) }}">
                            @csrf
                            @method('DELETE')
                            <a type="button" class="btn btn-warning" href="{{ route('books.edit', $book) }}">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
        @if(isset($books))
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->title }}</td>
                    <td>
                        @foreach($book->genre as $genre)
                            {{ $genre->name }}
                        @endforeach
                    </td>
                    <td>{{ $book->author->name }}</td>
                    <td>
                        <form method="POST" action="{{ route('books.delete', $book) }}">
                            @csrf
                            @method('DELETE')
                            <a type="button" class="btn btn-warning" href="{{ route('books.edit', $book) }}">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>
@endsection
