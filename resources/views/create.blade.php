@extends('layout.app')

@section('title', 'Articles - Create')

@section('content')
    {{-- create -> nampilin page create
    store -> simpan data --}}
    <form action="{{ route('article.store') }}" method="POST" >
        @csrf
        <div>
            <label for="title">Article Title</label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="author">Article Author</label>
            <input type="text" name="author">
        </div>
        <div>
            <label for="content">Article Content</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
