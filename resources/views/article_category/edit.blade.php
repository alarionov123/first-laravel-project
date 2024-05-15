@extends('layouts.app')

@section('content')
    {{ Form::model($article_category, ['route' => ['article_categories.update', $article_category], 'method' => 'PATCH']) }}
    @include('article_category.form')
    {{ Form::submit('Обновить') }}
    {{ Form::close() }}
@endsection
