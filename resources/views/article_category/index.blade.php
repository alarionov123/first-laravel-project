@extends('layouts.app')

@section('content')
    <div>
        <a href="{{ route('article_categories.create') }}">Create new category</a>
    </div>

    <h1>Список категорий статей</h1>
    @foreach($articleCategories as $category)
        <div class="article_category_list">
            <h2><a href="{{ route('article_categories.show', $category) }}">{{$category->name}}</a></h2>
            <a href="{{ route('article_categories.edit', $category->id) }}">Edit</a>
            <a href="{{ route('article_categories.destroy', $category->id) }}" data-method="delete" rel="nofollow">Delete</a>
        </div>

        <div>{{$category->description}}</div>
    @endforeach
@endsection
