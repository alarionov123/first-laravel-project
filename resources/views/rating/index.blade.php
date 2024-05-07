@extends('layouts.app')

@section('content')
<table>
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Likes</th>
    </tr>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr>
            <th scope="row">{{$article['id']}}</th>
            <td>{{$article['name']}}</td>
            <td>{{$article['likes_count']}}</td>
        </tr>
    @endforeach
</table>
@endsection

