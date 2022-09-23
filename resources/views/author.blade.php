@extends('welcome')

@section('title', 'Authors')

@section('content')
    <div class="wrapper mt-3">
        <a href="{{ route('home.main') }}" type="button" class="btn btn-secondary">Вернуться назад</a>
    </div>
    <table class="home-table table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($users))
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('authors.delete', $user) }}">
                            @csrf
                            @method('DELETE')
                            <a type="button" class="btn btn-warning" href="{{ route('authors.edit', $user) }}">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
        @endif
    </table>
@endsection
