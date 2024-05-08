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
        {{ Form::label('name', 'Имя') }}
        {{ Form::text('name') }}<br>
        {{ Form::label('description', 'Описание') }}
        {{ Form::textarea('description') }}<br>
        {{ Form::label('state', 'Состояние') }}
        {{ Form::select('state', ['D' => 'Draft', 'P' => 'Published']) }}<br>
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
