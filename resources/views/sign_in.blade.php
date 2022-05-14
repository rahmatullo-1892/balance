<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Балансы пользователей</title>
        <link href="{{ asset("/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ asset("/css/signin.css?v=" . $version) }}" rel="stylesheet">
    </head>
    <body class="text-center">
        <main class="form-signin">
            <form action="{{ url("/authorization") }}" method="post" autocomplete="off">
                @csrf
                <h3 class="mb-3 fw-normal">Введите логин и пароль</h3>
                <div class="form-floating">
                    <input type="text" class="form-control" id="login" name="login" placeholder="demo" required>
                    <label for="login">Логин</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="******" required>
                    <label for="password">Пароль</label>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button class="w-100 btn btn-lg btn-primary" type="submit">Авторизация</button>
            </form>
        </main>
    </body>
</html>
