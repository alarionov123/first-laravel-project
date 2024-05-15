<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestComments;
use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ArticleCommentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create($id)
    {
        $comment = new ArticleComment();

        return view('article_comment.create', compact('comment', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequestComments $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequestComments $request, Article $article)
    {
        $validated = $request->validated();
        $comment = $article->comments()->make();

        $comment->fill($validated);
        $comment->save();

        return redirect()
            ->route('articles.show', [$article->id])
            ->with('success', 'Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @param ArticleComment $comment
     * @return Application|Factory|View
     */
//    public function show(Article $article, ArticleComment $comment)
//    {
//        return view('article.index', compact('article', 'comment'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @param ArticleComment $comment
     * @return Application|Factory|View
     */
    public function edit(Article $article, ArticleComment $comment)
    {
        return view('article_comment.edit', compact('article', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormRequestComments $request
     * @param Article $article
     * @param ArticleComment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FormRequestComments $request, Article $article, ArticleComment $comment)
    {
        $validated = $request->validated();

        $comment->fill($validated);
        $comment->save();

        return redirect()
            ->route('articles.index', [$article, $comment])
            ->with('success', 'Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @param  \App\Models\ArticleComment  $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article, ArticleComment $comment)
    {
        $comment->delete();

        return redirect()
            ->route('articles.index', [$article, $comment])
            ->with('success', 'Success!');
    }
}
