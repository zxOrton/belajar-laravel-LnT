@extends('layout.app')

@section('title', 'Articles')

@section('content')
    <a href="{{ route('article.create') }}">Create Article</a>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Content</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        @foreach ($articles as $article)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></td>
            <td>{{ $article->author }}</td>
            <td>
                <p>{{ $article->content }}</p>
            </td>
            <td>{{ $article->image }}</td>
            <td>
                <a href="{{ route('article.edit', $article->id) }}">Edit</a>
                <form action="{{ route('article.delete', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
