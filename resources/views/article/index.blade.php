@extends('layouts.app')

@section('content')
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    {{Form::open(['route' => 'articles.index', 'method' => 'GET'])}}
        {{Form::text('q', $q)}}
        {{Form::submit('Найти')}}
    {{Form::close()}}

    <div>
        <a href="{{ route('articles.create') }}">Create new article</a>
    </div>

    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <a href="{{ route('articles.show', $article->id) }}"><h3>{{$article->name}}</h3></a>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection
