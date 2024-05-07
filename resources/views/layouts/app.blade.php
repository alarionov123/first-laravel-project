<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="{{ route('articles.index') }}">Articles</a></li>
            <li><a href="{{ route('rating.index') }}">Rating</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
        </ul>
    </nav>
</header>
<div class="container mt-4">
    <h1>@yield('header')</h1>
    <div>
        @yield('content')
    </div>
</div>
</body>
</html>
