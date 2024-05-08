<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $articles = Article::query();

        if (!empty($q)) {
            $articles->where('name', 'like', "%{$q}%");

        }
        $articles = $articles->paginate(100);

        return view('article.index', [
            'articles' => $articles,
            'q' => $q
        ]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:1'
        ]);

        $article = new Article();
        $article->fill($data);
        $article->save();
        $request->session()->flash('Success', 'Task was successful!');
        return redirect()
            ->route('articles.index');
    }
}
