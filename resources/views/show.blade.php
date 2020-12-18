@extends('layout.app')

@section('title', $article->title.' - Show')

@section('content')
    <h1>{{ $article->title }}</h1>
    <small>{{ $article->author }}</small>
    <p>{{ $article->content }}</p>
    @if ($article->created_at)
        <p>{{ $article->created_at->diffForHumans() }}</p>
    @endif
@endsection
