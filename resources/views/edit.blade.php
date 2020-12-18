@extends('layout.app')

@section('title', 'Articles - Edit')

@section('content')
    <form action="{{ route('article.update', $article->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Article Title</label>
            <input type="text" name="title" value="{{ $article->title }}">
        </div>
        <div>
            <label for="author">Article Author</label>
            <input type="text" name="author" value="{{ $article->author }}">
        </div>
        <div>
            <label for="content">Article Content</label>
            <textarea name="content" id="content" cols="30" rows="10">{{ $article->content }}</textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
