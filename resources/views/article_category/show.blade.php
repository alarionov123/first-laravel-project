@extends('layouts.app')

@section('content')
    <h2>{{ $category->name }}</h2>
    <div>{{ $category->description }}</div>
    @if (!$category->articles->isEmpty())
        <ol>
            @foreach($category->articles as $article)
                <li><a href="{{ route('articles.show', ['id' => $article->id]) }}">{{$article->name}}</li>
            @endforeach
        </ol>
    @endif
@endsection
