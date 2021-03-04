<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Like;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::where('user_id', auth()->user()->id)->get();
        return view('articles', compact('articles'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        // ELOQUENT
        Article::create([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
            'user_id' => auth()->user()->id
        ]);
        return redirect('/articles');
    }

    public function show($id) {
        $article = Article::find($id);
        $likes = count(Like::where('article_id', $article->id)->get());
        return view('show', compact('article', 'likes'));
    }

    public function edit($id) {
        $article = Article::find($id);
        return view('edit', compact('article'));
    }

    public function update(Request $request, $id) {
        $article = Article::find($id);
        $article->update([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
        ]);
        return redirect('/articles');
    }

    public function delete($id) {
        $article = Article::find($id);
        $article->delete();
        return back();
    }

    public function like($id) {
        Like::create([
            'user_id' => auth()->user()->id,
            'article_id' => $id,
        ]);
        return back();
    }
}
