@extends('welcome')

@section('content')
<div class="home-btn container">
    <a href="{{ url('/authors-login') }}" type="button" class="btn btn-primary">Войти как Автор</a>
    <a  type="button" class="btn btn-secondary">Войти как Администратор</a>
    <div class="author-books input-group mb-3">
        <input type="text" class="form-control" placeholder="Введите Автора" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Найти книги</button>
    </div>
    <div class="author-books input-group mb-3">
        <input type="text" class="form-control" placeholder="Введите id книги" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Найти книгу</button>
    </div>
    <div class="author-books input-group mb-3">
        <input type="text" class="form-control" placeholder="Введите Автора" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Найти книгу и данные автора</button>
    </div>
    <table class="home-table table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Жанр</th>
            <th scope="col">Автор</th>
        </tr>
        </thead>
        <tbody>
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
        </tr>
        @endforeach
    </table>
</div>
@endsection
