@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    <div>{{$article->body}}</div>

    @if(!empty($comments->total()))
        <h3>Comments section</h3>
    <div class="comments-list">
        <ul>
            @foreach($comments as $comment)
                <li>{{$comment['content']}}</li>
            @endforeach
        </ul>
    </div> @endif
    <a href="{{ route('articles.comments.create', ['article' => $article->id]) }}" class="comment">Leave a comment</a>
@endsection
