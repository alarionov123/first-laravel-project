@extends('layouts.app')
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
    {{ Form::model($comment, ['route' => ['articles.comments.store', $id]]) }}
    {{ Form::label('content', 'Содержание') }}
    {{ Form::textarea('content') }}<br>
    {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
