@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ Form::model($article_category, ['route' => ['article_categories.update', $article_category], 'method' => 'PATCH']) }}
    @include('article_category.form')
    {{ Form::submit('Обновить') }}
    {{ Form::close() }}
@endsection
