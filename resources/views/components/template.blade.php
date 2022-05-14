<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @include("components.css_js")
    @yield("header")
</head>
<body>
    <main>
        <div class="container">
            @yield("content")
        </div>
    </main>
</body>

@yield("js")
</html>
