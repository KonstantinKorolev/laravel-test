@extends('welcome')

@section('content')
<form class="author-login mt-3">
    <div class="container col-sm-3">
        <div class="login-wrapper">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-form-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </div>
    </div>
</form>
@endsection
