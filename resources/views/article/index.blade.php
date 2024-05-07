@extends('layouts.app')

@section('content')
    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <a href="{{ route('articles.show', $article->id) }}"><h3>{{$article->name}}</h3></a>

        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection
