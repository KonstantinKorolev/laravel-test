@extends('welcome')

@section('title', isset($book) ? 'Update ' . $book->title : 'Create book')


@section('content')
    <div class="wrapper mt-3">
        <a href="{{ route('home.main') }}" type="button" class="btn btn-secondary">Вернуться назад</a>
    </div>
    <form method="POST"
          @if(isset($book))
          action="{{ route('books.update', $book) }}">
        @else
            action="{{ route('books.store') }}">
        @endif
        @csrf
        <div class="row">
            <div class="col mt-3">
                <input name="title" value="{{ isset($book) ? $book->title : null }}" type="text" class="form-control" placeholder="Title" aria-label="Title">
            </div>
            <div class="col mt-3">
                <input name="author_id" value="{{ isset($book) ? $book->author_id : null }}" type="number" class="form-control" placeholder="author_id" aria-label="Title">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-success">{{ isset($book) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
@endsection
