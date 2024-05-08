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
        $articles = $articles->paginate();

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
}
