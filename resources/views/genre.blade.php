@extends('welcome')

@section('title', 'Genres')

@section('content')
        <div class="wrapper mt-3">
            <a href="{{ route('home.main') }}" type="button" class="btn btn-secondary">Вернуться назад</a>
        </div>
        <table class="home-table table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($genres))
                @foreach($genres as $genre)
                    <tr>
                        <th scope="row">{{ $genre->id }}</th>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('genres.delete', $genre) }}">
                                @csrf
                                @method('DELETE')
                                <a type="button" class="btn btn-warning" href="{{ route('genres.edit', $genre) }}">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection
