@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    <p>{{$article->category_id}}</p>
    <div>{{$article->body}}</div>
@endsection
