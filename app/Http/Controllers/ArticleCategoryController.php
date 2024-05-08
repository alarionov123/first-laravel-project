<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:article_categories|max:100',
            'description' => 'required|min:200',
            'state' => 'required|in:D,P'
        ]);

        $category = new ArticleCategory();
        $category->fill($data);
        $category->save();

        $request->session()->flash('success', 'Category was added successfully');

        return redirect()
            ->route('article_categories.index');
    }
}
