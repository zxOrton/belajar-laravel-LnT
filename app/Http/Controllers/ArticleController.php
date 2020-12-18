<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::all();
        return view('articles', compact('articles'));
        // associated array
        // return view('articles', ['articles' => $articles]);
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
        ]);

        // DATABASE BUILDER
        // DB::table('articles')->insert([
        //     'title' => $request->title,
        //     'author' => $request->author,
        //     'content' => $request->content,
        // ]);
        return redirect('/articles');
    }

    public function show($id) {
        $article = Article::find($id);
        return view('show', compact('article'));
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
        // dd($article);
        // $article->save();
        return redirect('/articles');
    }

    public function delete($id) {
        $article = Article::find($id);
        $article->delete();
        return back();
    }
}
