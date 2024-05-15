<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidation;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $article = new Article();

        return view('article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormValidation $request)
    {
        $validated = $request->validated();

        $article = new Article();
        $article->fill($validated);
        $article->save();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormValidation $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FormValidation $request, Article $article)
    {
        $validated = $request->validated();

        $article->fill($validated);
        $article->save();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article was edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()
            ->route('articles.index')
            ->with('success', 'Article was removed successfully');
    }
}
