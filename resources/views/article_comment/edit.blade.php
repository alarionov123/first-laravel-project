@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ Form::model($comment, ['route' => ['article.comment.update', $comment], 'method' => 'PATCH']) }}
    {{ Form::label('content', 'Content') }}
    {{ Form::text('content') }}
    {{ Form::submit('Обновить') }}
    {{ Form::close() }}
@endsection

