<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidation;
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

    public function store(FormValidation $request)
    {
        $validated = $request->validated();

        $article = new Article();
        $article->fill($validated);
        $article->save();
        $request->session()->flash('success', 'Article was added!');

        return redirect()
            ->route('articles.index');
    }

    public function update(FormValidation $request, $id)
    {
        $article = Article::findOrFail($id);
        $validated = $request->validated();

        $article->fill($validated);
        $article->save();
        $request->session()->flash('success', 'Article was updated!');

        return redirect()
            ->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }
}
