@extends('welcome')

@section('title', isset($genre) ? 'Update ' . $genre->name : 'Create genre')


@section('content')
    <div class="wrapper mt-3">
        <a href="{{ route('home.genres') }}" type="button" class="btn btn-secondary">Вернуться назад</a>
    </div>
    <form method="POST"
          @if(isset($genre))
          action="{{ route('genres.update', $genre) }}">
        @else
            action="{{ route('genres.store') }}">
        @endif
        @csrf
        <div class="row">
            <div class="col mt-3">
                <input name="name" value="{{ isset($genre) ? $genre->name : null }}" type="text" class="form-control" placeholder="Name" aria-label="name">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-success">{{ isset($genre) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
@endsection
