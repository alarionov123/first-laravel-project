<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use App\Http\Requests\FormValidationArticleCategory;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $articleCategories = ArticleCategory::all();
        return view('article_category.index', compact('articleCategories'));
    }

    public function show($id)
    {
        $category = ArticleCategory::findOrFail($id);

        return view('article_category.show', compact('category'));
    }

    public function create()
    {
        $category = new ArticleCategory();

        return view('article_category.create', compact('category'));
    }

    public function store(FormValidationArticleCategory $request)
    {
        $validated = $request->validated();

        $category = new ArticleCategory();
        $category->fill($validated);
        $category->save();

        return redirect()
            ->route('article_categories.index')
            ->with('success', 'Category was added successfully');
    }

    public function update(FormValidationArticleCategory $request, $id)
    {
        $article_category = ArticleCategory::findOrFail($id);

        $validated = $request->validated();

        $article_category->fill($validated);
        $article_category->save();

        return redirect()
            ->route('article_categories.index')
            ->with('success', 'Category was update successfully');
    }

    public function edit($id)
    {
        $article_category = ArticleCategory::findOrFail($id);

        return view('article_category.edit', compact('article_category'));
    }

    public function destroy($id)
    {
        $article_category = ArticleCategory::find($id);

        if ($article_category) {
            $article_category->delete();
        }
        return redirect()
            ->route('article_categories.index')
            ->with('success', 'Category was deleted successfully');
    }
}
