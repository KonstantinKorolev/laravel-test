@extends('welcome')

@section('title', isset($user) ? 'Update ' . $user->name : 'Create user')


@section('content')
    <div class="wrapper mt-3">
        <a href="{{ route('home.authors') }}" type="button" class="btn btn-secondary">Вернуться назад</a>
    </div>
    <form method="POST"
          @if(isset($user))
            action="{{ route('authors.update', $user) }}">
          @else
            action="{{ route('authors.store') }}">
          @endif
        @csrf
        <div class="row">
            <div class="col mt-3">
                <input name="name" value="{{ isset($user) ? $user->name : null }}" type="text" class="form-control" placeholder="Name" aria-label="name">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input name="email" value="{{ isset($user) ? $user->email : null }}" type="text" class="form-control" placeholder="Email" aria-label="email">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-success">{{ isset($user) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
@endsection
