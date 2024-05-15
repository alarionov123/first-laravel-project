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
    {{ Form::model($category, ['route' => 'article_categories.store']) }}
        @include('article_category.form')
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection