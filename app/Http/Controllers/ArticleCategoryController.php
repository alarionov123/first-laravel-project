<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidationArticleCategory;
use App\Models\ArticleCategory;
use Illuminate\Http\Response;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $article_category = ArticleCategory::paginate();

        return view('article_category.index', compact('article_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $article_category = new ArticleCategory();

        return view('article_category.create', compact($article_category));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormValidationArticleCategory $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormValidationArticleCategory $request)
    {
        $validated = $request->validated();

        $article_category = new ArticleCategory();

        $article_category->fill($validated);
        $article_category->save();

        return redirect()
            ->route('article_category.index')
            ->with('success', 'Category was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $article_category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(ArticleCategory $article_category)
    {
        return view('article_category.show', compact('article_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $article_category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ArticleCategory $article_category)
    {
        return view('article_category.edit', compact('article_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormValidationArticleCategory $request
     * @param ArticleCategory $article_category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FormValidationArticleCategory $request, ArticleCategory $article_category)
    {
        $validated = $request->validated();

        $article_category->fill($validated);
        $article_category->save();

        return redirect()
            ->route('article_categories.index')
            ->with('success', 'Category was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleCategory  $article_category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ArticleCategory $article_category)
    {
        $article_category->delete();

        return redirect()
            ->route('article_categories.index')
            ->with('success', 'Category was deleted successfully');
    }
}
