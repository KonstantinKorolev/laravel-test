@extends('welcome')

@section('title', 'Genres')

@section('content')
        <div class="wrapper mt-3">
            <a href="{{ url('/') }}" type="button" class="btn btn-primary">Вернуться назад</a>
        </div>
        <table class="home-table table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($genres))
                @foreach($genres as $genre)
                    <tr>
                        <th scope="row">{{ $genre->id }}</th>
                        <td>{{ $genre->name }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection
